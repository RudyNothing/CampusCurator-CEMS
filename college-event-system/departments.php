<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Departments</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">
</head>

<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    <a href="index.php" class="text-xl font-semibold text-teal-700">CampusCurator</a>

    <div class="flex gap-6">
        <a href="index.php">Events</a>
        <a href="departments.php" class="text-teal-700 font-medium">Departments</a>
        <a href="calendar.php">Calendar</a>
        <a href="archives.php">Archives</a>
    </div>

    <a href="support.php" class="bg-teal-700 text-white px-4 py-2 rounded-lg">Contact Support</a>
</nav>

<div class="px-10 py-10">

<h1 class="text-3xl font-semibold mb-8">Departments</h1>

<div class="grid md:grid-cols-3 gap-6">

<div class="bg-white p-6 rounded-xl shadow">
<h3 class="font-semibold text-lg">Computer Science</h3>
<p class="text-gray-600 mt-2">Workshops, hackathons, coding events.</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
<h3 class="font-semibold text-lg">Mechanical</h3>
<p class="text-gray-600 mt-2">Technical fests, robotics events.</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
<h3 class="font-semibold text-lg">Management</h3>
<p class="text-gray-600 mt-2">Business meets, seminars, leadership events.</p>
</div>

</div>

</div>

</body>
</html>