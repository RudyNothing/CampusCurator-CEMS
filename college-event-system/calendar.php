<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Calendar</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">
</head>

<body class="bg-[#f5f7f6]">

<nav class="flex justify-between px-10 py-6 bg-white shadow">
<a href="index.php" class="text-teal-700 font-semibold">CampusCurator</a>

<div class="flex gap-6">
<a href="index.php">Events</a>
<a href="departments.php">Departments</a>
<a href="calendar.php" class="text-teal-700 font-medium">Calendar</a>
<a href="archives.php">Archives</a>
</div>

<a href="support.php" class="bg-teal-700 text-white px-4 py-2 rounded-lg">Contact</a>
</nav>

<div class="px-10 py-10">

<h1 class="text-3xl font-semibold mb-6">Event Calendar</h1>

<?php
$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");

while($row = $result->fetch_assoc()){
?>

<div class="bg-white p-5 mb-4 rounded-xl shadow">
    <h3 class="font-semibold text-lg"><?php echo $row['title']; ?></h3>
    <p class="text-gray-600"><?php echo $row['event_date']; ?> | <?php echo $row['venue']; ?></p>
</div>

<?php } ?>

</div>

</body>
</html>