<?php 
require '../conn.php';

$sql ="DELETE FROM items WHERE id = ?";

$stmt = $kunci->prepare($sql);
$stmt->execute([$_GET['id']]);


header('Location: product.php');
 ?>
