<?php 

require '../conn.php';
$resi = $_POST['resi'];
$order_id = $_POST['order_id'];

$sql = "INSERT INTO resi (order_id, resi) VALUES(?, ?)";
$stmt = $kunci->prepare($sql);
$stmt->execute([$order_id,$resi]);

$sql_update = "UPDATE orders SET status = ? WHERE order_id = ?";
$stmt2 = $kunci->prepare($sql_update);
$stmt2->execute(["delivery",$order_id]);

header('Location: order.php');

 ?>