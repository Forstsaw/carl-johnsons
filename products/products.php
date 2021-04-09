<?php
    session_start();
    require '../check_if_added.php';

    $dsn= "mysql:host=127.0.0.1;dbname=store";
    $kunci = new PDO($dsn,'root','');

    $sql ="SELECT * FROM items";

    $hasil = $kunci->prepare($sql);
    $hasil -> execute();
?>


    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Projectworlds Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require '../header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Projectworlds Store!</h1>
                    <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php 
                        $i = 0;
                        while($data =$hasil->fetch()): 
                            $i++;?>
                    <div class="col-md-4 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="<?= $data['image'] ?> alt="Cannon">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3><?= $data['name'];?></h3>
                                    <p><?= $data['price'];?></p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(1)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                    <?php endwhile; ?>
                  
                    
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
             <?php
                require '../footer.php';
            ?>
        </div>
    </body>

