<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

$chart_query = "SELECT events.title, COUNT(registrations.registration_id) AS total FROM events LEFT JOIN registrations ON events.event_id = registrations.event_id GROUP BY events.event_id";

$chart_result = $conn->query($chart_query);

$event_names = [];
$event_counts = [];

while($row = $chart_result->fetch_assoc()){
    $event_names[] = $row['title'];
    $event_counts[] = $row['total'];
}



/* TOTAL EVENTS */
$events = $conn->query("SELECT COUNT(*) as total FROM events");
$total_events = $events->fetch_assoc()['total'];

/* TOTAL STUDENTS */
$students = $conn->query("SELECT COUNT(*) as total FROM students");
$total_students = $students->fetch_assoc()['total'];

/* TOTAL REGISTRATIONS */
$registrations = $conn->query("SELECT COUNT(*) as total FROM registrations");
$total_registrations = $registrations->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">
<script src="https://cdn.tailwindcss.com"></script>
<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    <h1 class="text-xl font-semibold text-teal-700">
        Admin Panel
    </h1>

    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg">
        Logout
    </a>
</nav>

<div class="px-10 py-10">

<!-- HEADER -->
<h1 class="text-3xl font-semibold mb-8">
    Dashboard Overview
</h1>

<!-- STATS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h2 class="text-3xl font-bold text-teal-700"><?php echo $total_events; ?></h2>
        <p class="text-gray-500 mt-2">Total Events</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h2 class="text-3xl font-bold text-teal-700"><?php echo $total_students; ?></h2>
        <p class="text-gray-500 mt-2">Students</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h2 class="text-3xl font-bold text-teal-700"><?php echo $total_registrations; ?></h2>
        <p class="text-gray-500 mt-2">Registrations</p>
    </div>

</div>

<!-- ACTION CARDS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

    <!-- CREATE -->
    <a href="create_event.php"
    class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">

        <h2 class="text-xl font-semibold mb-2">Create Event</h2>
        <p class="text-gray-600 text-sm">
            Add new college events for students.
        </p>

    </a>

    <!-- MANAGE -->
    <a href="manage_events.php"
    class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">

        <h2 class="text-xl font-semibold mb-2">Manage Events</h2>
        <p class="text-gray-600 text-sm">
            View events and participants.
        </p>

    </a>

    <!-- QUERIES -->
    <a href="manage_queries.php"
    class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">

        <h2 class="text-xl font-semibold mb-2">Manage Queries</h2>
        <p class="text-gray-600 text-sm">
            Respond to student questions.
        </p>

    </a>

</div>

<!-- CHART -->
<div class="bg-white p-6 rounded-2xl shadow">

    <h2 class="text-lg font-semibold mb-4">
        Event Registrations
    </h2>

    <canvas id="eventChart"></canvas>

</div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-6">
    © College Event Management System
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('eventChart');

new Chart(ctx,{
    type: 'bar',
    data: {
        labels: <?php echo json_encode($event_names); ?>,
        datasets: [{
            label: 'Registrations',
            data: <?php echo json_encode($event_counts); ?>,
            backgroundColor: '#0f766e'
        }]
    },
    options:{
        responsive:true,
        scales:{
            y:{ beginAtZero:true }
        }
    }
});
</script>

</body>
</html>
