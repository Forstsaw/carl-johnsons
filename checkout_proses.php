<?php 
	session_start();
	require 'conn.php';
	if(!isset($_SESSION['email'])){
        header('location: login.php');
    }

	//$namapenerima = $_POST['namapenerima'];
	//$no_hp = $_POST['no_hp'];
	//$alamat = $_POST['alamat'];
	//$kota = $_POST['kota'];
	//$kodepos = $_POST['kodepos'];
	$paymentMethod = $_POST['paymentMethod'];
	$user_id = $_SESSION['id'];
	$total = $_POST['total'];
	$order_id = $_POST['order_id'];
	$order_num =  "user".strval($_SESSION["id"]);


	//$sql_alamat = "INSERT INTO alamat (user_id, nama_penerima, alamat, kota,kode_pos,no_hp) VALUES(?, ?, ? ,?, ?, ?)";
	//$stmt = $kunci->prepare($sql_alamat);
	//$stmt->execute([$user_id,$namapenerima, $alamat, $kota,$kodepos ,$no_hp]);
	


	$sql_check = "select * from users_items where order_num = ? and status = ?";
	$check = $kunci->prepare($sql_check);
	$check->execute([$order_num, "masuk keranjang"]);
	$total_id = array();	
	$i = 0;
	while($data =$check->fetch()){
		$i++;
		array_push($data['id']);
	}

	if($i > 0){

		$sql_order = "INSERT INTO orders (order_num, user_id, dates,total ,paymentMethod,status) VALUES(?, ?,?, ?,? ,?)";
		$stmt = $kunci->prepare($sql_order);
		$stmt->execute([$order_num,$user_id, date("Y/m/d"),$total ,$paymentMethod,"unpaid"]);
		
		
		$sql_update = "UPDATE users_items SET status = ? WHERE order_num = ?";
		$stmt2 = $kunci->prepare($sql_update);
		$stmt2->execute(["Confirmed",$order_num]);



	
		header('Location: confirmation.php');
	}else{
		header('Location: checkout.php');
	}



	

	

	 ?>	


















