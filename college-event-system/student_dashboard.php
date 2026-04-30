<?php
session_start();

if(!isset($_SESSION['student_id'])){
    header("Location: student_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">

</head>

<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="index.php" class="text-xl font-semibold text-teal-700">
        CampusCurator
    </a>

    <div class="flex items-center gap-6">
        <span class="text-gray-600 font-medium">
            👤 <?php echo $_SESSION['student_name']; ?>
        </span>

        <a href="logout.php" 
        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
            Logout
        </a>
    </div>

</nav>

<!-- DASHBOARD CONTENT -->
<div class="px-10 py-12">

    <!-- HEADER -->
    <div class="mb-10">
        <h1 class="text-3xl font-semibold">
            Welcome, <?php echo $_SESSION['student_name']; ?>
        </h1>
        <p class="text-gray-600 mt-2">
            Explore events, manage participation, and stay updated.
        </p>
    </div>

    <!-- ACTION CARDS -->
    <div class="grid md:grid-cols-3 gap-6">

        <!-- EVENTS -->
        <a href="view_events.php"
        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">

            <div class="text-3xl mb-3 text-teal-600">📅</div>

            <h2 class="text-xl font-semibold mb-2">
                Browse Events
            </h2>

            <p class="text-gray-600 text-sm">
                View upcoming and past events and register easily.
            </p>

        </a>

        <!-- TIMETABLE -->
        <a href="timetable.php"
        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">

            <div class="text-3xl mb-3 text-orange-500">📄</div>

            <h2 class="text-xl font-semibold mb-2">
                Exam Timetable
            </h2>

            <p class="text-gray-600 text-sm">
                Download and view your semester exam schedule.
            </p>

        </a>

        <!-- ASK ADMIN -->
        <a href="ask_question.php"
        class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">

            <div class="text-3xl mb-3 text-purple-500">❓</div>

            <h2 class="text-xl font-semibold mb-2">
                Ask Admin
            </h2>

            <p class="text-gray-600 text-sm">
                Submit queries and get responses from administration.
            </p>

        </a>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-6">
    © College Event Management System
</footer>

</body>
</html>