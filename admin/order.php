<?php 
	session_start();?>
	<?php if($_SESSION['role'] == "admin"): ?>
<?php 		
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }

	require "master.php";
	require '../conn.php';

	$sql ="SELECT a.order_id,b.name,b.address,b.city,b.address,b.contact,a.dates,a.status,a.paymentMethod, c.quantity,d.name as name_product from users b join orders a on a.user_id = b.id
			join users_items c on c.user_id = b.id
			join items d on c.item_id=d.id

			";

	$sql ="SELECT * FROM orders";

	$hasil = $kunci->prepare($sql);
	$hasil -> execute();
?>
      

        
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
    
 </div>


<table class="table">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
      <th scope="col">Order Id</th>
      <th scope="col">Order Number</th>
      <th scope="col">User Id</th>
      <th scope="col">Dates</th>
      <th scope="col">paymentMethod</th>
      <th scope="col">status</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
   <?php 
	$i = 0;
	while($data =$hasil->fetch()): 
		$i++;?>
	<tr>
		<td><?= $i;?></td>
		<td><?= $data['order_id'];?></td>
		<td><?= $data['order_num'];?></td>
		<td><?= $data['user_id'];?></td>
		<td><?= $data['dates'];?></td>
		<td><?= $data['paymentMethod'];?></td>
		<td><?= $data['status'];?></td>
		<td>
			<a class="btn btn-primary" href="detail_order.php?id=<?= $data['order_id']; ?>">Detail</a>
		</td>
		

	</tr>
<?php endwhile; ?>
  </tbody>
</table>

<?php endif; ?>

<?php if($_SESSION['role'] != "admin"){
	header('Location: ../login.php');
} ?>