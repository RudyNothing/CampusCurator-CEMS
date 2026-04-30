<?php ?>

<!DOCTYPE html>
<html>
<head>
<title>Contact Support</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">
</head>

<body class="bg-[#f5f7f6]">

<nav class="flex justify-between px-10 py-6 bg-white shadow">
<a href="index.php" class="text-teal-700 font-semibold">CampusCurator</a>

<div class="flex gap-4">
<a href="index.php">Events</a>
<a href="departments.php">Departments</a>
<a href="calendar.php">Calendar</a>
<a href="archives.php">Archives</a>
</div>

</nav>

<div class="px-10 py-10 max-w-xl mx-auto">

<h1 class="text-3xl font-semibold mb-6">Contact Support</h1>

<form class="space-y-4">

<input type="text" placeholder="Your Name"
class="w-full p-3 border rounded-lg">

<input type="email" placeholder="Your Email"
class="w-full p-3 border rounded-lg">

<textarea placeholder="Your Message"
class="w-full p-3 border rounded-lg"></textarea>

<button class="bg-teal-700 text-white px-5 py-2 rounded-lg">
Send Message
</button>

</form>

</div>

</body>
</html>