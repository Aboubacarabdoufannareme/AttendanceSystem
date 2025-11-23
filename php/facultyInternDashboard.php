
<?php
require_once "auth.php";

// Allow only faculty interns
if ($_SESSION['role'] !== 'faculty_intern') {
    header("Location: login.html");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Intern Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/fi-dashboard.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#courses">Course List</a></li>
            <li><a href="#sessions">Sessions</a></li>
            <li><a href="#reports">Reports</a></li>
            <li><a href="#auditors">Auditors / Observers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <h2>Welcome, [Faculty Intern Name]</h2>

        <section id="courses">
            <h3>Course List</h3>
            <ul>
                <li>Math 101 <button>View</button></li>
                <li>Physics 102 <button>View</button></li>
            </ul>
        </section>

        <section id="sessions">
            <h3>Sessions</h3>
            <ul>
                <li>Math 101 – 25 Nov 2025 – <button>Mark Attendance</button></li>
            </ul>
        </section>

        <section id="reports">
            <h3>Reports</h3>
            <table>
                <tr><th>Student</th><th>Course</th><th>Attendance</th><th>Notes</th></tr>
                <tr><td>Ali Aboubacar</td><td>Math 101</td><td>90%</td><td>Active Participant</td></tr>
            </table>
        </section>

        <section id="auditors">
            <h3>Auditors / Observers</h3>
            <table>
                <tr><th>Student</th><th>Course</th><th>Action</th></tr>
                <tr><td>Fatima Mariam</td><td>Math 101</td><td><button>Approve</button> <button>Reject</button></td></tr>
            </table>
        </section>
    </main>
</body>
</html>
