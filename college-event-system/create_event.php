<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];

    $stmt = $conn->prepare("INSERT into events (title, description, event_date, venue) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $title, $description, $date, $venue);

    if($stmt->execute()){
        $success =  "Event created successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-8 py-5 bg-white shadow-sm">
    
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

<!-- FORM SECTION -->
<div class="px-4 mt-4 flex justify-center">

    <div class="bg-white w-full max-w-xl p-8 rounded-2xl shadow-lg">

        <h2 class="text-2xl font-semibold mb-6 text-center">
            Create New Event
        </h2>

        <!-- SUCCESS MESSAGE -->
        <?php if(isset($success)){ ?>
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4 text-sm">
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <form method="POST" class="space-y-4">

            <!-- TITLE -->
            <div>
                <label class="block text-sm mb-1">Event Title</label>
                <input type="text" name="title" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:outline-none">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="block text-sm mb-1">Description</label>
                <textarea name="description" rows="4" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:outline-none"></textarea>
            </div>

            <!-- DATE -->
            <div>
                <label class="block text-sm mb-1">Event Date</label>
                <input type="date" name="date" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:outline-none">
            </div>

            <!-- VENUE -->
            <div>
                <label class="block text-sm mb-1">Venue</label>
                <input type="text" name="venue" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:outline-none">
            </div>

            <!-- BUTTON -->
            <button type="submit" name="create"
            class="w-full bg-teal-700 text-white py-3 rounded-lg hover:bg-teal-800 transition">
                Create Event
            </button>

        </form>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-6">
    © College Event Management System
</footer>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>