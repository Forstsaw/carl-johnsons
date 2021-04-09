<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css2/style.css" type="text/css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1 class="nama1">Carls Johnson's</h1>
                       <p class="nama2">The Best Cakes and Breads Around The World, Grab It Now!</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                  <div class="topnav">
                    <a href="#home">PRODUCTS</a>
                    <a href="#contact">ABOUT</a>
                    <a href="#about">CONTACT US</a>
                  </div>
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/roti2.jpg" alt="Camera">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Cheezee Roll</p>
                                        <p>The best cheese roll available in the world.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/roti3.jpg" alt="Watch">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Choco Mocha Roll</p>
                                    <p>Original Taste from the best brands.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/roti4.jpg" alt="Shirt">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Oreo Roll</p>
                                   <p>Our New Product</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row padding konten-container">
             <div class="column left">
              <h1>History of CJ Bread and Cakes</h1>
              <h3>
                CJ Bread and Cakes first bread was made by "Big Smoke" in the little street of grove streets on 1985, followed by its first cake at 1986. with the family-recipe that kept secret to make the breads and cakes have a distinct flavor compared to other bakeries 
              </h3>
             </div>
            <div class="column right">
              <img src="img/Baking_Bread_Buns.jpg" width="100%">
            </div>
           </div>
            <br><br> <br><br><br><br>
             <?php
                require 'footer.php';
            ?>
        </div>
    </body>
    <style type="text/css">
      h3, h1{
      font-family: Monotype Corsiva;
      text-align: center;
    }
    .nama1, .nama2{
      color: white;
    }
</style>
</html>