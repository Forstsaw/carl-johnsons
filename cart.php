<?php
    session_start();
    require 'conn.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
   


     if(isset($_POST["add_to_cart"])){
        $sql = "INSERT INTO users_items(order_num,user_id ,item_id, quantity, status) VALUES(?,?, ?, ? ,?)";
        $stmt = $kunci->prepare($sql);
        $order_num =  "user".strval($_SESSION["id"]);
        $stmt->execute([$order_num,$_SESSION["id"], $_GET["id"], $_POST["quantity"],"masuk keranjang"]);
     }

     if(isset($_GET["action"]))  
 {  
      if ($_GET["action"] == "delete") {
           $sql ="DELETE FROM users_items WHERE item_id = ? and user_id = ?";
            $stmt = $kunci->prepare($sql);
            $stmt->execute([$_GET['id'],$_SESSION["id"]]);
            echo '<script>alert("Item Removed")</script>';  
            echo '<script>window.location="cart.php"</script>';  
      }

 }  
      


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
     
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
</html>


 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Cart - CarlsJohnson's</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
         <?php require 'header.php';?>
    
           <div style="clear:both"></div>  
                <br />  
                 
                <div class="container">
                     <h3>Keranjang</h3>
                <div class="table-responsive">  
                     <table class="table table-bordered table-dark">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php  
                                $total = 0;  
                                $order_num =  "user".strval($_SESSION["id"]); 

                                $sql ="SELECT *
                                        FROM items
                                        JOIN (users_items)
                                        ON (users_items.item_id = items.id)
                                        WHERE users_items.status = ? and users_items.order_num = ?;";

                                $hasil = $kunci->prepare($sql);
                                $hasil -> execute(["masuk keranjang", $order_num]);
                           
                              while($data =$hasil->fetch()): 
                          ?>  
                          <tr>  
                               <td><?php echo $data["name"]; ?></td>  
                               <td><?php echo $data["quantity"]; ?></td>  
                               <td>Rp. <?php echo $data["price"]; ?></td>  
                               <td>Rp. <?php echo number_format($data["quantity"] * $data["price"], 2); ?></td>  
                               <td><a class="btn btn-danger" href="cart.php?action=delete&id=<?php echo $data["item_id"]; ?>"><span>Remove</span></a></td>  
                          </tr>  
                          <?php $total = $total + ($data["quantity"] * $data["price"]);   ?>
                      <?php endwhile; ?>
               
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Rp. <?php echo number_format($total, 2); ?></td>  
                               <td><a type="button" class="btn btn-primary" href="checkout.php">Checkout</a></td>  
                          </tr>  
           
                     </table>  
                </div>  
           </div>
            <br><br><br>
           <?php
                require 'footer.php';
            ?>
      </body>  
 </html>