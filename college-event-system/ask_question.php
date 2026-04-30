<?php
include "includes/db.php";
session_start();
if(!isset($_SESSION['student_id'])){
    header("Location: student_login.php");
    exit();
}
if(isset($_POST['submit'])){
    $question = trim($_POST['question']);
    $student_id = $_SESSION['student_id'];
    if(!empty($question)){
        $stmt = $conn->prepare("INSERT INTO queries (student_id, question) VALUES (?,?)");
        $stmt->bind_param("is",$student_id,$question);
        $stmt->execute();
    }
    header("Location: ask_question.php");
    exit();
}
if(isset($_POST['clear'])){
    $student_id = $_SESSION['student_id'];

    $stmt = $conn->prepare("DELETE FROM queries WHERE student_id=?");
    $stmt->bind_param("i",$student_id);
    $stmt->execute();

    header("Location: ask_question.php");
    exit();
}

if(isset($_GET['partial'])){
    while($row = $result->fetch_assoc()){
        ?>
        <div class="bg-white p-6 rounded-2xl shadow mb-4">
            <p class="font-semibold">Q: <?php echo $row['question']; ?></p>
            <?php if($row['answer']){ ?>
                <div class="mt-2 text-green-700">
                    Answer: <?php echo $row['answer']; ?>
                </div>
            <?php } else { ?>
                <div class="mt-2 text-yellow-600 text-sm">
                    Waiting for admin response...
                </div>
            <?php } ?>
        </div>
        <?php
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask Admin</title>
    <link rel="icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
    
    <a href="student_dashboard.php" class="text-xl font-semibold text-teal-700">
        CampusCurator
    </a>

    <div class="flex gap-4">
        <a href="student_dashboard.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Dashboard
        </a>

        <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg">
            Logout
        </a>
    </div>

</nav>

<div class="px-10 py-10 max-w-3xl mx-auto">

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-3xl font-semibold">
        Ask Admin
    </h1>
    <p class="text-gray-600 mt-2">
        Submit your questions and get responses from the administration.
    </p>
</div>


<!-- ASK FORM -->
<div class="queryContainer">
    <!-- QUERY LIST -->
 <div class="space-y-6">

    <?php
    $student_id = $_SESSION['student_id'];
    $stmt = $conn->prepare("SELECT * from queries where student_id=? order by created_at DESC");
    $stmt->bind_param("i",$student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
    ?>

    <div class="bg-white p-6 rounded-2xl shadow">

        <!-- QUESTION -->
        <p class="font-semibold mb-2">
            Q: <?php echo $row['question']; ?>
        </p>

        <!-- ANSWER -->
        <?php if($row['answer']){ ?>

            <div class="mt-3 bg-green-50 border-l-4 border-green-500 p-3 rounded">
                <span class="text-green-700 font-medium">Answer:</span>
                <p class="text-gray-700 mt-1"><?php echo $row['answer']; ?></p>
            </div>

        <?php } else { ?>

            <div class="mt-3 text-yellow-600 text-sm">
                Waiting for admin response...
            </div>

                <?php } ?>

            </div>

        <?php } ?>

    </div>

</div>
<div class="bg-white p-6 rounded-2xl shadow mb-8">

    <form method="POST" class="space-y-4">

        <textarea name="question" rows="4" placeholder="Type your question here..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:outline-none"></textarea>

        <div class="flex justify-between items-center">

            <button name="submit"
            class="bg-teal-700 text-white px-5 py-2 rounded-lg hover:bg-teal-800">
                Send Question
            </button>
            <button onclick="reloadQueries()" 
                class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800">
                        🔄 Refresh
            </button>
            <button name="clear" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                Clear My Queries
            </button>

        </div>

    </form>

</div>

</div>

<!-- FOOTER -->
<footer class="text-center text-gray-500 text-sm py-6">
    © College Event Management System
</footer>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    function reloadQueries(){
        fetch(window.location.pathname + "?partial=1")
            .then(res => res.text())
            .then(data => {
            document.getElementById("queryContainer").innerHTML = data;
        });
    }
</script>
</body>
</html>