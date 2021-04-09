<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }

    require 'conn.php';


    
    $sql ="SELECT * FROM items ORDER BY id ASC";
    $hasil = $kunci->prepare($sql);
    $hasil -> execute();
?>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1 class="nama1">Welcome to our Carls Johnson's!</h1>
                    <p class="nama2">We have the best Cake and Bread. No need to hunt around, we have all in one place</p>
                </div>
            </div>
            <div class="container">
                
                <h1>Get our best cakes in the world, grab it now!</h1><br />  
                <?php  
          
        
                     while($row = $hasil->fetch())  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo "admin/".$row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">Rp. <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                
                ?>  
                <div style="clear:both"></div>  
                <br />  
            </div>
            <br><br><br><br><br><br><br><br>
             <?php
                require 'footer.php';
            ?>
        </div>
        <style type="text/css">
              .jumbotron .nama1{
                color: white;
                margin-top: 100px;
              }
              .jumbotron .nama2{
                color: white;
                margin-right: -100px;

              }
              .jumbotron{
                background-image: url("img/product_banner.jpg");
                background-size: cover;
                width: 100%; /* Full width (cover the whole page) */
                height: 50%;

              }
            h1{
                  font-family: Monotype Corsiva;
                  text-align: center;

                }

        </style>
    </body>


