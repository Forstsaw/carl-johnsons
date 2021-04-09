<?php 
	session_start();
	if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
	require 'master.php';
	require '../conn.php';


		$sql ="SELECT a.order_id,b.name,b.address,b.city,b.address,b.contact,a.dates,a.status,a.paymentMethod, c.quantity,d.name as name_product from users b join orders a on a.user_id = b.id
			join users_items c on c.user_id = b.id
			join items d on c.item_id=d.id WHERE a.order_id = ?

			";
	$hasil = $kunci->prepare($sql);
	$hasil->execute([$_GET['id']]);


	$sql2 ="SELECT * from pembayaran where receipt_id = ?";
	$payment = $kunci->prepare($sql2);
	$payment->execute([$_GET['id']]);

	$resi_sql ="SELECT * from resi where order_id = ?";
	$data_resi = $kunci->prepare($resi_sql);
	$data_resi->execute([$_GET['id']]);
	$resi2 = $data_resi->fetch();
 ?>



<div class="container">


<br><br>

<h1>Alamat</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
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

<br><br>
<h1>Bukti pembayaran</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
      <th scope="col">payment_id</th>
      <th scope="col">receipt_id</th>
      <th scope="col">nama_lengkap</th>
      <th scope="col">no_rekening</th>
      <th scope="col">transfer</th>
      <th scope="col">bukti_trf</th>
      <th scope="col">Proses</th>


    </tr>
  </thead>
  <tbody>
   <?php 
	$i = 0;
	while($data2 =$payment->fetch()): 
		$i++;?>
	<tr>
		<td><?= $i;?></td>
		<td><?= $data2['payment_id'];?></td>
		<td><?= $data2['receipt_id'];?></td>
		<td><?= $data2['nama_lengkap'];?></td>
		<td><?= $data2['no_rekening'];?></td>
		<td><?= $data2['transfer'];?></td>
		<td><img id="photo" src="<?= "../".$data2['bukti_trf'];?>"height="100px"></td>

	<?php  if($data['status'] !="delivery" && $data['status'] !="reject"):?>
		<td>
			<a class="btn btn-success" href="approve_order.php?id=<?= $data['order_id']; ?>">Approve</a>
			<a class="btn btn-danger" href="reject_order.php?id=<?= $data['order_id']; ?>">Reject</a>
		</td>
	<?php endif; ?>

	</tr>
	
	<?php break; ?>
<?php endwhile; ?>
  </tbody>
</table>
	<?php if(!strcmp($data['status'], "approve") && ($resi2['resi'] ?? true)): ?>
	<form method="POST" action="kirim.php">
		 <input type="hidden" class="form-control" id="inputZip" name="order_id" value="<?= $data['order_id']; ?>">
		 <div class="form-group col-md-3">
			      <label for="inputZip">Input No Resi</label>
			      <input type="text" class="form-control" id="inputZip" name="resi">
			    </div>
	    <button class="btn btn-primary" type="submit">Kirim</button>
	</form>

	<?php endif ?>
		<?php if (!strcmp($data['status'], "delivery")): ?>
	 <h3>No Resi: <?php echo $resi2['resi'] ?></h3>
	<?php endif ?>

	
</div>
