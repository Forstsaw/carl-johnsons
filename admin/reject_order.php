<?php 

	require '../conn.php';
	$sql = "UPDATE orders SET status = ? WHERE order_id = ?";
	$stmt = $kunci->prepare($sql);
	$stmt->execute(["reject",$_GET['id']]);

	header('Location: order.php');
 ?>