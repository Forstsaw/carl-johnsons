<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
      
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
            <br><br>
            <div class="container">
                <div class="konten">
                <h1>Register For OUR New Member</h1>

                <div class="row">
                    <div class="column left">
                      <figure>
                         <img src="img/FAVPNG_bakery-pastry-chef-bread_d6KXbCF4.png" width="85%">
                      </figure>
                    </div>

                    <div class="column right">
                        
                        <form method="post" action="user_registration_script.php">

                            <div class="half">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="address" placeholder="Jl umn blok A no 21, Banten, 15100" required="true">
                            </div>

                            <div class="form-group">
                                 <label>Kota</label>
                                <input type="text" class="form-control" name="city" placeholder="Tangerang" required="true">
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="tel" class="form-control" name="contact" placeholder="08123456789" required="true">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <br><br><br><br><br><br>
           <?php
                require 'footer.php';
            ?>

        </div>
    </body>
    <style type="text/css">
        h1{
            font-family: Avenir Next LT Pro Light;
            text-align: center;
        }
    </style>
</html>
