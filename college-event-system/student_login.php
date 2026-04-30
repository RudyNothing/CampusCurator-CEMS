<?php
include "includes/db.php";
session_start();

$error = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT student_id, name, password_hash FROM students WHERE email=?");

    if(!$stmt){
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $row = $result->fetch_assoc();

        if(password_verify($password,$row['password_hash'])){
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['student_name'] = $row['name'];

            header("Location: student_dashboard.php");
            exit();
        }
        else{
            $error = "Incorrect password";
        }
    }
    else{
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Favicon -->
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

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-semibold text-center mb-6">
            Student Login
        </h2>

        <!-- ERROR MESSAGE -->
        <?php if(!empty($error)){ ?>
            <div class="bg-red-100 text-red-600 px-4 py-2 rounded-lg mb-4 text-sm">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST" class="space-y-4">

            <!-- EMAIL -->
            <div>
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" required
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
            class="w-full bg-teal-700 text-white py-3 rounded-lg hover:bg-teal-800 transition">
                Login
            </button>

        </form>

        <!-- REGISTER LINK -->
        <p class="text-center text-sm mt-5 text-gray-600">
            Don't have an account?
            <a href="student_register.php" class="text-teal-700 font-medium">
                Register here
            </a>
        </p>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-4">
    © College Event Management System
</footer>

</body>
</html>