<?php
include "includes/db.php";
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['reply'])){
    $query_id = $_POST['query_id'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("UPDATE queries SET answer=?, status='answered' WHERE query_id=?");
    $stmt->bind_param("si",$answer,$query_id);
    $stmt->execute();

    header("Location: manage_queries.php");
    exit();
}

$result = $conn->query("SELECT * FROM queries ORDER BY created_at DESC");

if(isset($_POST['clear_all'])){
    $conn->query("DELETE from queries");

    header("Location: manage_queries.php");
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
    <title>Student Queries</title>
    <link rel="icon" href="assets/images/icon.jpg">
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

<div class="px-10 py-10 max-w-4xl mx-auto">

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold">
        Student Queries
    </h1>

    <form method="POST">
        <button onclick="reloadQueries()" class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800">
                🔄 Refresh
        </button>
        <button name="clear_all"
        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 text-sm">
            Clear All
        </button>
    </form>
</div>

<div class="queryContainer">
    <!-- QUERY LIST -->
    <div class="space-y-6">
    
    <?php while($row = $result->fetch_assoc()){ ?>
    
        <div class="bg-white p-6 rounded-2xl shadow">
    
            <!-- QUESTION -->
            <p class="font-semibold mb-2">
                Q: <?php echo $row['question']; ?>
            </p>
    
            <!-- ANSWER / FORM -->
            <?php if($row['status']=="answered"){ ?>
    
                <div class="mt-3 bg-green-50 border-l-4 border-green-500 p-3 rounded">
                    <span class="text-green-700 font-medium">Answer:</span>
                    <p class="text-gray-700 mt-1"><?php echo $row['answer']; ?></p>
                </div>
    
            <?php } else { ?>
    
                <form method="POST" class="mt-4">
                    <input type="hidden" name="query_id" value="<?php echo $row['query_id']; ?>">
    
                    <textarea name="answer" rows="3" required
                    placeholder="Write a clear response..."
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:outline-none mb-3"></textarea>
    
                    <button name="reply"
                    class="bg-teal-700 text-white px-4 py-2 rounded-lg hover:bg-teal-800 text-sm">
                        Send Reply
                    </button>
                </form>
    
            <?php } ?>
    
        </div>
    
    <?php } ?>
    
    </div>
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