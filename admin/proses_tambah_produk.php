<?php 
	require '../conn.php';
	$judul = $_POST['judul'];
	$harga = $_POST['harga'];
	$quantity = $_POST['quantity'];
	$foto = $_FILES['foto'];


	$ext = explode(".", $_FILES['foto']['name']);
	$ext = end($ext);
	$ext = strtolower($ext);


	$ext_boleh = ["jpg","jpeg","png"];
	$max_size = 2*1024*1024;
	if(in_array($ext,$ext_boleh) && $_FILES['foto']['size'] <= $max_size){
		
		$tmp = $_FILES['foto']['tmp_name'];
		$perm = "img/" . $_FILES['foto']['name'];
		move_uploaded_file($tmp, $perm);


		

		$sql = "INSERT INTO items (name, quantity, price, image) VALUES(?, ?, ? ,?)";
		$stmt = $kunci->prepare($sql);
		$stmt->execute([$_POST['judul'], $quantity, $harga, $perm]);

		header('Location: product.php');

	}else{
		echo "file tidak valid atau size terlalu besar";
	}

	 ?>