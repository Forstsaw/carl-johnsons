<?php 
require '../conn.php';

$sql ="DELETE FROM users WHERE id = ?";

$stmt = $kunci->prepare($sql);
$stmt->execute([$_GET['id']]);

header('Location: users.php');
 ?>