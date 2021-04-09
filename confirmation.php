<?php 
	session_start();
    require 'conn.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }



 ?>

<?php require 'header.php';?>


<div class="container">
	<h1>Upload Bukti Pembayaran</h1>

	<form action="confirmation_proses.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
	    <label for="exampleInputEmail1">No. Receipt</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="receipt">
	    <small id="emailHelp" class="form-text text-muted"></small>
	  </div>
		<div class="form-group">
	    <label for="exampleInputEmail1">Nama Lengkap</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="namalengkap">
	    <small id="emailHelp" class="form-text text-muted">*Sesuai nama rekening</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nomor Rekening</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" name="norek">
	  </div>
	    <div class="form-group">
	    <label for="exampleInputPassword1">Jumlah Transfer</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" name="transfer">
	    <small id="emailHelp" class="form-text text-muted">*Sesuai pada receipt</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
	    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="bukti">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>



</div>
<?php require 'footer.php';?>