<?php
require_once('../src/config.php');
require_once('../src/header.html');

$id  = $_GET[ "id" ];

// deletes query from database by comparing id's
$result = $mysqli->query ("DELETE FROM list WHERE id = $id") or die($mysqli->error);

header("Location: index.php");

$mysqli->close();