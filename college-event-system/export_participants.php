<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

$event_id = $_GET['event_id'];
// Get Event Name
$event_query = $conn->prepare("SELECT title FROM events WHERE event_id=?");
$event_query->bind_param("i",$event_id);
$event_query->execute();
$event_result = $event_query->get_result();
$event = $event_result->fetch_assoc();

// Fetch Participants
$stmt = $conn->prepare("SELECT students.name, students.email, students.roll_number FROM registrations JOIN students ON registrations.student_id = students.student_id WHERE registrations.event_id=?");

$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$event['title'].'_participants.csv"');

$output = fopen("php://output", "w");

// Column Headers
fputcsv($output,["Name","Email","Roll Number"]);

// Data
while($row = $result->fetch_assoc()){
    fputcsv($output,$row);
}
fclose($output);
exit();
?>