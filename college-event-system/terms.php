<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Terms & Conditions</title>
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

<h1 class="text-3xl font-semibold mb-6">Terms & Conditions</h1>

<p class="text-gray-600 mb-4">
By using this platform, you agree to the following terms:
</p>

<ul class="space-y-3 text-gray-700">
<li>• Users must provide accurate registration details.</li>
<li>• Misuse of the platform may result in account suspension.</li>
<li>• Event participation is subject to availability.</li>
<li>• Admin decisions regarding events are final.</li>
</ul>

</div>

<footer class="text-center text-gray-500 text-sm py-6">
© College Event Management System
</footer>

</body>
</html>