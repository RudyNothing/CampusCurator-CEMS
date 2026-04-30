<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Accessibility</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.png">
</head>

<body class="bg-[#f5f7f6] text-gray-800">

<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="index.php" class="text-xl font-semibold text-teal-700">
        CampusCurator
    </a>

    <div class="flex gap-6">
        <a href="index.php">Events</a>
        <a href="departments.php">Departments</a>
        <a href="calendar.php">Calendar</a>
        <a href="archives.php">Archives</a>
    </div>

    <a href="support.php" class="bg-teal-700 text-white px-4 py-2 rounded-lg">
        Contact Support
    </a>

</nav>

<div class="max-w-3xl mx-auto px-10 py-10">

<button onclick="history.back()" 
class="mb-6 text-sm text-teal-700 hover:underline">
← Go Back
</button>

<h1 class="text-3xl font-semibold mb-6">Accessibility</h1>

<p class="text-gray-600 mb-4">
We strive to make this platform accessible to all users.
</p>

<ul class="space-y-3 text-gray-700">
<li>• Simple and readable UI design</li>
<li>• Mobile-friendly layout</li>
<li>• Clear navigation and structure</li>
<li>• Minimal reliance on complex interactions</li>
</ul>

</div>

<footer class="text-center text-gray-500 text-sm py-6">
© College Event Management System
</footer>

</body>
</html>