<?php 
require 'master.php';
require '../conn.php';

$sql = "SELECT * FROM users
	WHERE id= ?";

$hasil = $kunci->prepare($sql);
$hasil ->execute([$_GET['id']]);

$data = $hasil->fetch();
 ?>


 <h1>Edit Program Studi</h1>
 <form action="proses_edit_user.php" method="POST">
 	
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

 	<div class="form-group">
    <label for="exampleFormControlSelect1">Role:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="role">
      <option value ="buyer">Buyer</option>
      <option value ="admin">Admin</option>
    </select>
  </div>

 	<input type="hidden" name="id" value="<?= $data['id'];?>"><br />
 	<button type="submit">Simpan Perubahan</button>
 </form>