<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Not logged in
    header("Location: login.html");
    exit();
}

// Redirect based on role
switch ($_SESSION['role']) {
    case 'student':
        header("Location: student_dashboard.php");
        break;
    case 'faculty':
        header("Location: faculty_dashboard.php");
        break;
    case 'faculty_intern':
        header("Location: fi_dashboard.php");
        break;
    default:
        header("Location: login.html");
        break;
}
exit();
