<?php 
session_start();
if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
require 'master.php';
require '../conn.php';

$sql = "SELECT * FROM users
	WHERE id= ?";

$hasil = $kunci->prepare($sql);
$hasil ->execute([$_SESSION['id']]);

$data = $hasil->fetch();
 ?>

 <h1>Account Informtion</h1>
 <form action="proses_edit_user.php" method="POST">
 	<div class="form-group">
 	<label>Nama:</label>
 	<input type="text" name="nama" value="<?php echo $data['name'];?>"><br />
 	<label>email:</label>
 	<input type="email" name="email" value="<?php echo $data['email'];?>"><br />

 	<label>contact:</label>
 	<input type="text" name="contact" value="<?php echo $data['contact'];?>"><br />

	
	<label>city:</label>
 	<input type="text" name="city" value="<?php echo $data['city'];?>"><br />

 	<label>Address:</label>
 	<input type="text" name="address" value="<?php echo $data['address'];?>"><br />


  </div>

 	<input type="hidden" name="id" value="<?= $data['id'];?>"><br />
 	<button class="btn btn-primary" type="submit">Simpan Perubahan</button>
 </form>