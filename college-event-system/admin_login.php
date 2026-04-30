<?php
include "includes/db.php";
session_start();

$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT admin_id, password_hash FROM admins where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if(password_verify($password,$row['password_hash'])){
            $_SESSION['admin_id'] = $row['admin_id'];
    
            header("Location: admin_dashboard.php");
            exit();
        }
        else{
            $error = "Incorrect Password";
        }
    }
    else{
        $error = "Admin not Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="assets/images/icon.jpg">

</head>

<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    <a href="index.php" class="text-xl font-semibold text-teal-700">
        CampusCurator
    </a>
</nav>

<!-- LOGIN SECTION -->
<div class="min-h-[80vh] flex items-center justify-center px-4">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl border border-gray-100">

        <!-- ICON -->
        <div class="flex justify-center mb-4">
            <div class="bg-teal-100 text-teal-700 p-3 rounded-full">
                🔒
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-center mb-6">
            Administrator Access
        </h2>

        <!-- ERROR -->
        <?php if(!empty($error)){ ?>
            <div class="bg-red-100 text-red-600 px-4 py-2 rounded-lg mb-4 text-sm text-center">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST" class="space-y-4">

            <!-- USERNAME -->
            <div>
                <label class="block text-sm mb-1">Username</label>
                <input type="text" name="username" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" required
                class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <!-- BUTTON -->
            <button type="submit" name="login"
            class="w-full bg-teal-700 text-white py-3 rounded-lg hover:bg-teal-800 transition font-medium">
                Admin Login
            </button>

        </form>

        <!-- EXTRA -->
        <p class="text-center text-xs text-gray-500 mt-5">
            Authorized personnel only
        </p>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-4">
    © College Event Management System
</footer>

</body>
</html>