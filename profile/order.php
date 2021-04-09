<?php 
	session_start();
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
	require "master.php";
	require '../conn.php';

	
		$sql ="SELECT a.order_id,b.name,b.address,b.city,b.address,b.contact,a.dates,a.status,a.paymentMethod, c.quantity,d.name as name_product from users b join orders a on a.user_id = b.id
			join users_items c on c.user_id = b.id
			join items d on c.item_id=d.id 
		
			WHERE b.id = ?

			";



	$hasil = $kunci->prepare($sql);
	$hasil -> execute([$_SESSION['id']]);
?>
      

        
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
   
 </div>


<table class="table">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
    	<th scope="col">No Order</th>
      <th scope="col">Nama</th>
      <th scope="col">alamat</th>
      <th scope="col">kota</th>
      <th scope="col">no hp</th>
      <th scope="col">dates</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Quantity</th>
      <th scope="col">paymentMethod</th>
      <th scope="col">status</th>
   

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
		<td><?= $data['name'];?></td>
		<td><?= $data['address'];?></td>
		<td><?= $data['city'];?></td>
		<td><?= $data['contact'];?></td>
		<td><?= $data['dates'];?></td>
		<td><?= $data['name_product'];?></td>
		<td><?= $data['quantity'];?></td>
		<td><?= $data['paymentMethod'];?></td>
		<td><?= $data['status'];?></td>
		

	</tr>
	
	<?php break; ?>
<?php endwhile; ?>
  </tbody>
</table>