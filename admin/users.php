<?php 
	session_start();
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
	require "master.php";
	require '../conn.php';


	$sql ="SELECT * FROM users";

	$hasil = $kunci->prepare($sql);
	$hasil -> execute();
?>
      

        
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New</a>
 </div>


<table class="table">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">city</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
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
		<td><?= $data['email'];?></td>
		<td><?= $data['contact'];?></td>
		<td><?= $data['city'];?></td>
		<td><?= $data['address'];?></td>
		<td><?= $data['role'];?></td>
		<td>
			<a class="btn btn-primary" href="edit_user.php?id=<?= $data['id']; ?>">Ubah</a>
			<a class="btn btn-danger" href="hapus_user.php?id=<?= $data['id']; ?>">Hapus</a>
		</td>
	</tr>
<?php endwhile; ?>
  </tbody>
</table>