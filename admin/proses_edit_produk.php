<?php 

require '../conn.php';

$sql = "UPDATE items SET name = ?, quantity = ?, price = ? WHERE id = ?";

$stmt = $kunci->prepare($sql);

$data = [
	$_POST['nama'],
	$_POST['quantity'],
	$_POST['harga'],
	
	$_POST['id']
];
$stmt->execute($data);

header('Location: product.php')
 ?>