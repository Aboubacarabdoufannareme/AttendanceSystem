<?php
require_once "auth.php";

// Allow only faculty interns
if ($_SESSION['role'] !== 'Faculty') {
    header("Location: login.html");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/faculty-dashboard.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#courses">Course Management</a></li>
            <li><a href="#sessions">Session Overview</a></li>
            <li><a href="#reports">Attendance Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <h2>Welcome, [Faculty Name]</h2>

        <section id="courses">
            <h3>Course Management</h3>
            <button>Create New Course</button>
            <ul>
                <li>Math 101 <button>Edit</button> <button>Delete</button></li>
                <li>Physics 102 <button>Edit</button> <button>Delete</button></li>
            </ul>
        </section>

        <section id="sessions">
            <h3>Session Overview</h3>
            <ul>
                <li>Math 101 – 25 Nov 2025 – 20 Students Attended</li>
                <li>Physics 102 – 26 Nov 2025 – 18 Students Attended</li>
            </ul>
        </section>

        <section id="reports">
            <h3>Attendance Reports</h3>
            <table>
                <tr><th>Student</th><th>Course</th><th>Attendance</th><th>Participation</th></tr>
                <tr><td>Ali Aboubacar</td><td>Math 101</td><td>80%</td><td>Good</td></tr>
            </table>
        </section>
    </main>
</body>
</html>
