<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['student_id'])){
    header("Location: student_login.php");
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$sql = "SELECT * FROM events where 1=1";

if(!empty($search)){
    $sql .= " AND (title LIKE ? OR description LIKE ?)";
}

if($type == "upcoming"){
    $sql .= " AND event_date >= CURDATE()";
}
elseif($type == "past"){
    $sql .= " AND event_date < CURDATE()";
}

$stmt = $conn->prepare($sql);

if(!empty($search)){
    $like = "%$search%";
    $stmt->bind_param("ss",$like,$like);
}

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Available Events</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
</head>
<body class="bg-[#f5f7f6] text-gray-800">
<script src="https://cdn.tailwindcss.com"></script>
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
<div class="px-10 py-10">
<!-- HEADER -->
<h1 class="text-3xl font-semibold mb-6">
    <?php
    if($type=="past") echo "Past Events";
    elseif($type=="upcoming") echo "Upcoming Events";
    else echo "All Events";
    ?>
</h1>
<!-- FILTER -->
<form method="GET" id="filterForm" class="flex gap-4 mb-8">
    <input type="text" name="search" placeholder="Search events..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" onkeyup="debounceSubmit()" class="flex-1 p-3 rounded-lg border border-gray-300">
    <select name="type" onchange="document.getElementById('filterForm').submit();" class="p-3 rounded-lg border border-gray-300">
        <option value="">All Events</option>
        <option value="upcoming" <?php if($type=="upcoming") echo "selected"; ?>>Upcoming Events</option>
        <option value="past" <?php if($type=="past") echo "selected"; ?>>Past Events</option>
    </select>

</form>

<!-- EVENTS GRID -->
<div class="grid md:grid-cols-3 gap-6">

<?php
while($row = $result->fetch_assoc()){
    $event_id = $row['event_id'];
    $student_id = $_SESSION['student_id'];
    $is_past = strtotime($row['event_date']) < strtotime(date('Y-m-d'));

    $check = $conn->prepare("SELECT * FROM registrations WHERE event_id=? AND student_id=?");
    $check->bind_param("ii",$event_id,$student_id);
    $check->execute();
    $res = $check->get_result();

    $count_stmt = $conn->prepare("SELECT COUNT(*) as total FROM registrations WHERE event_id=?");
    $count_stmt->bind_param("i", $event_id);
    $count_stmt->execute();
    $count_res = $count_stmt->get_result();
    $participants = $count_res->fetch_assoc()['total'];
?>

<!-- CARD -->
<div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">

    <h2 class="text-xl font-semibold mb-2">
        <?php echo $row['title']; ?>
    </h2>

    <p class="text-gray-600 text-sm mb-4">
        <?php echo $row['description']; ?>
    </p>

    <div class="text-sm text-gray-500 mb-4">
        📅 <?php echo $row['event_date']; ?><br>
        📍 <?php echo $row['venue']; ?>
    </div>

    <!-- ACTION -->
    <?php if($is_past){ ?>

        <span class="text-gray-500 text-sm block mb-2">
            Event Ended
        </span>

        <span class="text-xs text-gray-400">
            Participants: <?php echo $participants; ?>
        </span>

    <?php } elseif($res->num_rows > 0){ ?>

        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-lg text-sm">
            Registered
        </span>

    <?php } else { ?>

        <button 
        class="bg-teal-700 text-white px-4 py-2 rounded-lg register-btn"
        data-event="<?php echo $event_id; ?>">
            Register
        </button>

    <?php } ?>

</div>

<?php } ?>

</div>

</div>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-96 text-center">

        <h2 class="text-lg font-semibold mb-4">Event Registration</h2>

        <div id="modalMessage" class="mb-4"></div>

        <button onclick="closeModal()" class="bg-teal-700 text-white px-4 py-2 rounded">
            Close
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>
let timer;

function debounceSubmit(){
    clearTimeout(timer);
    timer = setTimeout(()=>{
        document.getElementById('filterForm').submit();
    },500);
}

/* REGISTER BUTTON */
document.querySelectorAll(".register-btn").forEach(button=>{
    button.addEventListener("click", function(){

        let eventId = this.dataset.event;
        let btn = this;

        fetch("register_event.php?event_id="+eventId)
        .then(res=>res.text())
        .then(data=>{

            document.getElementById("modalMessage").innerHTML = data;
            document.getElementById("modal").classList.remove("hidden");

            btn.outerHTML = `<span class="bg-green-100 text-green-600 px-3 py-1 rounded-lg text-sm">Registered</span>`;
        });

    });
});

function closeModal(){
    document.getElementById("modal").classList.add("hidden");
}
</script>

</body>
</html>