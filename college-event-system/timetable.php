<?php
session_start();

if(!isset($_SESSION['student_id'])){
    header("Location: student_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Exam Timetable</title>
<link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="student_dashboard.php" class="text-xl font-semibold text-teal-700">
        CampusCurator
    </a>

    <a href="student_dashboard.php" class="text-gray-600 hover:text-teal-700">
        ← Back to Dashboard
    </a>

</nav>

<div class="px-10 py-10">

<!-- HEADER -->
<div class="mb-10">
    <h1 class="text-3xl font-semibold">
        Examination Timetable
    </h1>
    <p class="text-gray-600 mt-2">
        Download your semester-wise exam schedules.
    </p>
</div>

<!-- CARDS -->
<div class="grid md:grid-cols-3 gap-6">

    <!-- 4th SEM -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        
        <div class="text-3xl mb-3 text-teal-600">🎓</div>

        <h2 class="text-xl font-semibold mb-2">
            4th Semester
        </h2>

        <p class="text-gray-600 text-sm mb-4">
            Complete exam schedule for 4th semester students.
        </p>

        <a href="assets/files/4th_sem_timetable.pdf" target="_blank"
        class="bg-teal-700 text-white px-4 py-2 rounded-lg hover:bg-teal-800">
            View PDF
        </a>

    </div>

    <!-- 2nd SEM -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        
        <div class="text-3xl mb-3 text-orange-500">📘</div>

        <h2 class="text-xl font-semibold mb-2">
            2nd Semester
        </h2>

        <p class="text-gray-600 text-sm mb-4">
            Exam timetable for second semester courses.
        </p>

        <a href="assets/files/2nd_sem_timetable.pdf" target="_blank"
        class="bg-teal-700 text-white px-4 py-2 rounded-lg hover:bg-teal-800">
            View PDF
        </a>

    </div>

    <!-- BACK EXAMS -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        
        <div class="text-3xl mb-3 text-red-500">⚠️</div>

        <h2 class="text-xl font-semibold mb-2">
            Back Exams
        </h2>

        <p class="text-gray-600 text-sm mb-4">
            Schedule for backlog / supplementary exams.
        </p>

        <a href="assets/files/back_exam_timetable.pdf" target="_blank"
        class="bg-teal-700 text-white px-4 py-2 rounded-lg hover:bg-teal-800">
            View PDF
        </a>

    </div>

</div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-6">
    © College Event Management System
</footer>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>