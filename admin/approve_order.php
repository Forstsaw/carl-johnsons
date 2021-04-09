<?php 
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
	require '../conn.php';
	$sql = "UPDATE orders SET status = ? WHERE order_id = ?";
	$stmt = $kunci->prepare($sql);
	$stmt->execute(["approve",$_GET['id']]);

	header('Location: order.php');
 ?>