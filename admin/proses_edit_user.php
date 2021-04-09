<?php 

require '../conn.php';

$sql = "UPDATE users SET name = ?, email = ?, contact = ?, city=?, address=?, role = ? WHERE id = ?";

$stmt = $kunci->prepare($sql);

$data = [
	$_POST['nama'],
	$_POST['email'],
	$_POST['contact'],
	$_POST['city'],
	$_POST['address'],
	$_POST['role'],
	$_POST['id']
];
$stmt->execute($data);

header('Location: users.php');
 ?>