<?php 
	session_start();
	
	require '../conn.php';


?>
<?php if($_SESSION['role'] == "admin"): ?>
  <?php require 'master.php' ?>    
  <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Produk</label>
      <input type="text" class="form-control" placeholder="Kue Bolu" name="judul">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Harga</label>
      <input type="text" class="form-control" placeholder="20000" name="harga">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Quantity</label>
      <input type="text" class="form-control" placeholder="150" name="quantity">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Choose Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Upload Product</button>
  </form>


<?php endif ?>
<?php 
if($_SESSION['role'] != "admin" or $_SESSION['role'] != ""){
  header('Location : login.php'); 
}
 ?>
