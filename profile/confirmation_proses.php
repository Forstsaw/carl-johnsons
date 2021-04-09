<?php 
	session_start();
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
	require '../conn.php';

	$namalengkap = $_POST['namalengkap'];
	$norek = $_POST['norek'];
	$transfer = $_POST['transfer'];
	$receipt = $_POST['receipt'];
	$foto = $_FILES['bukti'];
	


	$ext = explode(".", $foto['name']);
	$ext = end($ext);
	$ext = strtolower($ext);


	$ext_boleh = ["jpg","jpeg","png"];
	$max_size = 2*1024*1024;
	if(in_array($ext,$ext_boleh) && $foto['size'] <= $max_size){
		
		$tmp = $foto['tmp_name'];
		$perm = "img/bukti/" . $foto['name'];
		move_uploaded_file($tmp, $perm);



		$sql = "INSERT INTO pembayaran (receipt_id,nama_lengkap, no_rekening, transfer, bukti_trf) VALUES(?,?, ?, ? ,?)";
		$stmt = $kunci->prepare($sql);
		$stmt->execute([$receipt,$namalengkap, $norek, $transfer, $perm]);

		$sql2 = "UPDATE orders SET status =  ? WHERE order_id = ?";
		$stmt2 = $kunci->prepare($sql2);
		$stmt2->execute(["paid",$receipt]);

		header('Location: ../approval.php');

	}else{
		echo "file tidak valid atau size terlalu besar";
	}

 ?>

