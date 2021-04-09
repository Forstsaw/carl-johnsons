
<?php
    session_start();
    require 'conn.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    

	$sql ="SELECT * FROM users where id = ?";

	$hasil = $kunci->prepare($sql);
	$hasil -> execute([$_SESSION['id']]);
	$userData = $hasil->fetch();

	$sql2 ="SELECT * FROM orders";
	$hasil2 = $kunci->prepare($sql2);
	$hasil2 -> execute();
	$order_id = 0;
	while($order2 = $hasil2->fetch()){
		$order_id = $order2['order_id'];
	};
	$order_id +=1;
?>


<?php require 'header.php';?>
<div class="container">
	<div class="row">
		<div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
			
				<!-- User Info (alamat) -->
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<address>
	                        <p><strong><?php echo $userData['name']; ?></strong></p>
	                        <p><?php echo $userData['address']; ?></p>
	                        <p><?php echo $userData['city']; ?></p>
	                        <p><abbr title="Phone"></abbr><?php echo $userData['contact']; ?></p>
	                    </address>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
	                    <p> <em><?php echo "Date: " . date("Y-m-d") . "<br>"; ?></em> </p>
	                    <p> Receipt #<em><?php echo $order_id; ?></em> </p>
	                </div>
				</div>
				<!-- Akhir dari User Info (alamat) -->


				<!-- Bagian Receipt -->
				<div class="row">
					<div class="text-center">
	                    <h1>Receipt</h1>
	                </div>

					<!-- Bagian Table Receipt -->
	                <table class="table table-hover">
	                	<thead>
	                        <tr>
	                            <th>Product</th>
	                            <th>Quantity</th>
	                            <th class="text-center">Price</th>
	                            <th class="text-center">Total</th>
	                            <th class="text-center">Remove</th>
	                        </tr>
	                    </thead>

	                    <tbody>
	                    	<?php  
	                            $total = 0;  
	                            $order_num =  "user".strval($_SESSION["id"]); 
	                            $sql ="SELECT *
	                                    FROM items
	                                    JOIN (users_items)
	                                    ON (users_items.item_id = items.id)
	                                    WHERE users_items.status = ? and users_items.order_num = ?";

	                            $hasil = $kunci->prepare($sql);
	                            $hasil -> execute(["masuk keranjang", $order_num]);
	                       
	                          	while($data =$hasil->fetch()): 
	                      	?>  
		                      <tr>  
		                           <td ><?php echo $data["name"]; ?></td>  
		                           <td><?php echo $data["quantity"]; ?></td>  
		                           <td>Rp. <?php echo $data["price"]; ?></td>  
		                           <td>Rp. <?php echo number_format($data["quantity"] * $data["price"], 2); ?></td>  
		                           <td><a class="btn btn-danger" href="cart.php?action=delete&id=<?php echo $data["item_id"]; ?>">Remove</span></a></td>  
		                      </tr>  
	                      	<?php $total =  $total + ($data["quantity"] * $data["price"])+rand(1,999);  ?>
	                  		<?php endwhile; ?>
	                     
	                        <tr>
	                            <td>   </td>
	                            <td>   </td>
	                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
	                            <td class="text-center text-danger"><h4><strong>Rp. <?php echo number_format($total, 2); ?></strong></h4></td>
	                        </tr>
	                    	
	                    </tbody>

	                </table>
	                <form method="POST" action="checkout_proses.php">
		                <input type="hidden" name="total" value=<?= $total; ?>>
		                <input type="hidden" name="orderid" value=<?= $order_id; ?>>
			                <div class="form-group col-md-4">
						      <label for="inputState">Metode Pembayaran</label>
						      <select id="inputState" class="form-control" name="paymentMethod" required="true">
						        <option selected>Choose...</option>
						        <option value="bca">BCA (Transfer manual)</option>
						        <option value="mandiri">MANDIRI (Transfer manual)</option>
						        <option value="bni">BNI (Transfer manual)</option>
						        <option value="bri">BRI (Transfer manual)</option>
						      </select>
						    </div>
		                <button type="submit" class="btn btn-success btn-lg btn-block">
		                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
		                </button></td>
		               
		            </form>
				</div>
				<small>*Pastikan membayar sesuai total yang tertera</small>
		

			<!-- Akhir Bagian Receipt -->
			<h3>Pembelian Oleh Transfer Bank</h2>
			<h4>BCA</h3>
			<h4>NO Rekening : 088382382383</h4>
			<h5>Atas Nama : Carls johnsons</h5>
			<br>
			<h4>Mandiri</h3>
			<h4>NO Rekening : 808838238243</h4>
			<h5>Atas Nama : Carls johnsons</h5>
			<br>
			<h4>BRI</h3>
			<h4>NO Rekening : 5883823828543</h4>
			<h5>Atas Nama : Carls johnsons</h5>
			<br>
			<h4>BNI</h3>
			<h4>NO Rekening : 408838238345283</h4>
			<h5>Atas Nama : Carls johnsons</h5>
			<br>
		
		
		</div>
	</div>
</div>
    </body>
    <style type="text/css">
      h3, h1,p,th,td,h4,h5,small,label{
      	color: black;

    }





<?php require 'footer.php';?>
