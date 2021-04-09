<?php 
	session_start();
	if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
?>


<?php require 'header.php';?>
<?php echo "waiting for approval.. ( 1-2 days )" ?><br>
<a class="btn btn-primary" href="index.php">Go Back to Home</a>


<?php require 'footer.php';?>