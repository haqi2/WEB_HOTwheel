<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$sql = "DELETE FROM koleksi_hotwheels WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: index.php?status=deleted");
} else {
    echo "Error: " . $conn->error;
}
?>