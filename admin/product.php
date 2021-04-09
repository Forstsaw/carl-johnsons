<?php 
	session_start();
if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }

	require '../conn.php';

	$sql ="SELECT * FROM items";

	$hasil = $kunci->prepare($sql);
	$hasil -> execute();
?>

 <?php if($_SESSION['role'] == "admin"): ?>
  <?php require 'master.php' ?>         
	<link rel="stylesheet" type="text/css" href="style.css">


	        
	<div class="container-fluid">
	  <div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800">Product</h1>
	    <a href="add_product.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New</a>
	 </div>


	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	    	<th scope="col">No</th>
	      <th scope="col">id</th>
	      <th scope="col">Product Name</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Price</th>
	      <th scope="col">Image</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	   <?php 
		$i = 0;
		while($data =$hasil->fetch()): 
			$i++;?>
		<tr>
			<td><?= $i;?></td>
			<td><?= $data['id'];?></td>
			<td><?= $data['name'];?></td>
			<td><?= $data['quantity'];?></td>
			<td><?= $data['price'];?></td>
			<td><img id="photo" src="<?= $data['image'] ?>"  width="65px" height="45px"></td>
		
			<td>
				<a class="btn btn-primary" href="edit_produk.php?id=<?= $data['id']; ?>">Ubah</a>
				<a class="btn btn-danger" href="proses_hapus_produk.php?id=<?= $data['id']; ?>">Hapus</a>
			</td>
		</tr>

	<?php endwhile; ?>

	  </tbody>
	</table>

<?php endif ?>
<?php 
if($_SESSION['role'] != "admin" or $_SESSION['role'] != ""){
  header('Location : login.php'); 
}
 ?>