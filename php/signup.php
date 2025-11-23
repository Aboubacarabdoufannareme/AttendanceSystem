<?php
header("Content-Type: application/json");

// Include DB connection
require_once __DIR__ . "/connect.php";

// Response structure
$response = [
    "success" => false,
    "message" => ""
];

// Receive JSON body
$data = json_decode(file_get_contents("php://input"), true);

// Check if empty
if (!$data) {
    $response["message"] = "No data received.";
    echo json_encode($response);
    exit;
}

$firstName = trim($data["firstname"] ?? "");
$lastName  = trim($data["lastname"] ?? "");
$username  = trim($data["username"] ?? "");
$email     = trim($data["email"] ?? "");
$password  = trim($data["password"] ?? "");

// -------------------- SERVER-SIDE VALIDATION ----------------------
if (empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($password)) {
    $response["message"] = "All fields are required.";
    echo json_encode($response);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response["message"] = "Invalid email format.";
    echo json_encode($response);
    exit;
}

if (strlen($password) < 6) {
    $response["message"] = "Password must be at least 6 characters.";
    echo json_encode($response);
    exit;
}

// Check if username already exists
$checkUser = $conn->prepare("SELECT id FROM users WHERE username = ?");
$checkUser->bind_param("s", $username);
$checkUser->execute();
$checkUser->store_result();

if ($checkUser->num_rows > 0) {
    $response["message"] = "Username already taken.";
    echo json_encode($response);
    exit;
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into DB
$stmt = $conn->prepare("
    INSERT INTO users (firstname, lastname, username, email, password, role)
    VALUES (?, ?, ?, ?, ?, 'student')
");

$stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashedPassword);

if ($stmt->execute()) {
    $response["success"] = true;
    $response["message"] = "Registration successful!";
} else {
    $response["message"] = "Database insert failed.";
}

echo json_encode($response);
exit;
?>
