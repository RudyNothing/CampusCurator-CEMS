<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

$event_id = $_GET['event_id'];

$stmt = $conn->prepare("SELECT students.name, students.email, students.roll_number FROM registrations JOIN students on registrations.student_id = students.student_id WHERE registrations.event_id=?");

$stmt->bind_param("i", $event_id);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="admin_dashboard.php" class="text-xl font-semibold text-teal-700">
        Admin Panel
    </a>

    <div class="flex gap-4">
        <a href="manage_events.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            ← Back to Events
        </a>

        <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg">
            Logout
        </a>
    </div>

</nav>

<div class="px-10 py-10">

<!-- HEADER -->
<div class="mb-6">
    <h1 class="text-3xl font-semibold">
        Registered Students
    </h1>
    <p class="text-gray-500 mt-1">
        List of students registered for this event
    </p>
</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">

            <!-- HEAD -->
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Roll Number</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

            <?php while($row = $result->fetch_assoc()){ ?>

                <tr class="hover:bg-gray-50 transition">

                    <td class="px-6 py-4 font-semibold">
                        <?php echo $row['name']; ?>
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        <?php echo $row['email']; ?>
                    </td>

                    <td class="px-6 py-4">
                        <?php echo $row['roll_number']; ?>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>
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