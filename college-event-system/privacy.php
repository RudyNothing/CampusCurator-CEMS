<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Privacy Policy</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.png">
</head>

<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
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

<!-- CONTENT -->
<div class="max-w-3xl mx-auto px-10 py-10">

<button onclick="history.back()" 
class="mb-6 text-sm text-teal-700 hover:underline">
← Go Back
</button>

<h1 class="text-3xl font-semibold mb-6">Privacy Policy</h1>

<p class="text-gray-600 mb-4">
We value your privacy and are committed to protecting your personal information.
</p>

<ul class="space-y-3 text-gray-700">
<li>• Your data is used only for event registration and communication.</li>
<li>• We do not sell or share your personal data with third parties.</li>
<li>• Passwords are securely hashed and stored.</li>
<li>• Only authorized admins can access limited user data.</li>
</ul>

</div>

<footer class="text-center text-gray-500 text-sm py-6">
© College Event Management System
</footer>

</body>
</html>