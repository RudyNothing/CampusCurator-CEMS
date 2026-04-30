<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

$result = $conn->query("SELECT * from events");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="admin_dashboard.php" class="text-xl font-semibold text-teal-700">
        Admin Panel
    </a>

    <div class="flex gap-4">
        <a href="admin_dashboard.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Dashboard
        </a>

        <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg">
            Logout
        </a>
    </div>

</nav>

<div class="px-10 py-10">

<!-- HEADER -->
<h1 class="text-3xl font-semibold mb-6">
    Manage Events
</h1>

<!-- TABLE CARD -->
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">

            <!-- HEADER -->
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Venue</th>
                    <th class="px-6 py-4 text-center">Participants</th>
                    <th class="px-6 py-4 text-center">Export</th>
                    <th class="px-6 py-4 text-center">Delete</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

            <?php while($row = $result->fetch_assoc()){ ?>

                <tr class="hover:bg-gray-50 transition">

                    <!-- TITLE -->
                    <td class="px-6 py-4 font-semibold">
                        <?php echo $row['title']; ?>
                    </td>

                    <!-- DESCRIPTION -->
                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate">
                        <?php echo $row['description']; ?>
                    </td>

                    <!-- DATE -->
                    <td class="px-6 py-4">
                        <?php echo $row['event_date']; ?>
                    </td>

                    <!-- VENUE -->
                    <td class="px-6 py-4">
                        <?php echo $row['venue']; ?>
                    </td>

                    <!-- PARTICIPANTS -->
                    <td class="px-6 py-4 text-center">
                        <a href="view_participants.php?event_id=<?php echo $row['event_id']; ?>"
                        class="bg-teal-600 text-white px-3 py-1 rounded-lg text-xs hover:bg-teal-700">
                            View
                        </a>
                    </td>

                    <!-- EXPORT -->
                    <td class="px-6 py-4 text-center">
                        <a href="export_participants.php?event_id=<?php echo $row['event_id']; ?>"
                        class="bg-green-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-green-600">
                            CSV
                        </a>
                    </td>

                    <!-- DELETE -->
                    <td class="px-6 py-4 text-center">
                        <a href="delete_event.php?event_id=<?php echo $row['event_id']; ?>"
                        onclick="return confirm('Delete this event?')"
                        class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-red-600">
                            Delete
                        </a>
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

</body>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>