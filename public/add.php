<?php
require_once('../src/config.php');

$title = $_POST['title'];
if (empty($title)) {
    die("Connection failed: ");
}
$activity = $_POST['activity'];

// inserts input values into db
$stmt = $mysqli->prepare("INSERT INTO list (title, activity) VALUES (?,?)");
$stmt->bind_param('ss', $title, $activity);
$stmt->execute();

header("Location: index.php");

$mysqli->close();
