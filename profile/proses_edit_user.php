<?php 

require '../conn.php';
if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }

$sql = "UPDATE users SET name = ?, email = ?, contact = ?, city=?, address=? WHERE id = ?";

$stmt = $kunci->prepare($sql);

$data = [
	$_POST['nama'],
	$_POST['email'],
	$_POST['contact'],
	$_POST['city'],
	$_POST['address'],
	$_POST['id']
];
$stmt->execute($data);

header('Location: account.php');
 ?>