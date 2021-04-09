<?php 
require 'master.php';
require '../conn.php';

$sql = "SELECT * FROM items
	WHERE id= ?";

$hasil = $kunci->prepare($sql);
$hasil ->execute([$_GET['id']]);

$data = $hasil->fetch();
 ?>


 <h1>Edit Program Studi</h1>
 <form action="proses_edit_produk.php" method="POST">
 	
 	<label>Nama:</label>
 	<input type="text" name="nama" value="<?php echo $data['name'];?>"><br />
 	<label>Quantity:</label>
 	<input type="text" name="quantity" value="<?php echo $data['quantity'];?>"><br />

 	<label>Price:</label>
 	<input type="text" name="harga" value="<?php echo $data['price'];?>"><br />



 

 	<input type="hidden" name="id" value="<?= $data['id'];?>"><br />
 	<button type="submit">Simpan Perubahan</button>
 </form>