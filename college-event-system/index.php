<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CEMS</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">

</head>

<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    <h1 class="text-xl font-semibold text-teal-700">CampusCurator</h1>

    <div class="hidden md:flex gap-8 text-gray-600">
        <a href="index.php" class="text-teal-700 font-medium">Events</a>
        <a href="departments.php">Departments</a>
        <a href="calendar.php">Calendar</a>
        <a href="archives.php">Archives</a>
    </div>

    <a href="support.php" class="bg-teal-700 text-white px-5 py-2 rounded-lg">
        Contact Support
    </a>
</nav>

<!-- HERO SECTION -->
<section class="grid md:grid-cols-2 gap-10 px-10 py-16 items-center">

    <!-- TEXT -->
    <div>
        <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">
            Institutional Event Hub
        </span>

        <h1 class="text-5xl font-bold mt-5 leading-tight">
            Curating the <span class="text-teal-700">Academic</span> Experience.
        </h1>

        <p class="mt-5 text-gray-600">
            Seamlessly coordinate seminars, festivals, and workshops through one intelligent platform.
        </p>

        <p class="mt-4 text-sm text-gray-500">
            Trusted by 50+ universities nationwide.
        </p>
    </div>

    <!-- IMAGE -->
    <div>
        <img src="assets/images/college.jpg" class="rounded-2xl shadow-lg">
    </div>

</section>

<!-- PORTAL CARDS -->
<section class="grid md:grid-cols-2 gap-10 px-10 py-10">

    <!-- STUDENT -->
    <div class="bg-white p-8 rounded-2xl shadow-md">
        <h2 class="text-2xl font-semibold mb-3">Student Portal</h2>

        <p class="text-gray-600 mb-5">
            Register for events, track schedules, and manage participation.
        </p>

        <a href="student_login.php"
        class="bg-teal-700 text-white px-6 py-3 rounded-lg inline-block">
            Enter Student Portal →
        </a>
    </div>

    <!-- ADMIN -->
    <div class="bg-white p-8 rounded-2xl shadow-md">
        <h2 class="text-2xl font-semibold mb-3">Administrator Access</h2>

        <p class="text-gray-600 mb-5">
            Manage events, analytics, and student queries efficiently.
        </p>

        <a href="admin_login.php"
        class="bg-teal-200 text-teal-800 px-6 py-3 rounded-lg inline-block">
            Admin Login →
        </a>
    </div>

</section>

<!-- ANALYTICS SECTION -->
<section class="px-10 py-12 grid md:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-semibold">Real-time Analytics</h3>
        <p class="text-gray-600 mt-2">
            Monitor event engagement and participation in real time.
        </p>
    </div>

    <div class="bg-teal-700 text-white p-6 rounded-2xl shadow flex items-center justify-center">
        <h2 class="text-4xl font-bold">98% <span class="text-lg block">Student Satisfaction</span></h2>
    </div>

</section>

<!-- STATS -->
<section class="px-10 py-10">

    <div class="bg-white p-6 rounded-2xl shadow grid md:grid-cols-4 text-center gap-4">

        <div>
            <h3 class="text-xl font-bold">12k+</h3>
            <p class="text-gray-500 text-sm">Events</p>
        </div>

        <div>
            <h3 class="text-xl font-bold">850</h3>
            <p class="text-gray-500 text-sm">Departments</p>
        </div>

        <div>
            <h3 class="text-xl font-bold">200k</h3>
            <p class="text-gray-500 text-sm">Students</p>
        </div>

        <div>
            <h3 class="text-xl font-bold">24/7</h3>
            <p class="text-gray-500 text-sm">Support</p>
        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="px-10 py-6 text-gray-500 text-sm flex justify-between">
    <span>© 2026 CEMS</span>
    <span>
        <a href="privacy.php" style="display:inline;">Privacy •</a>
        <a href="terms.php" style="display:inline;">Terms •</a>
        <a href="accessibility.php" style="display:inline;">Accessibility</a>
    </span>
</footer>

</body>
</html>