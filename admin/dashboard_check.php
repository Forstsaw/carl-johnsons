<?php 
session_start();
if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
if(isset($_SESSION['role'])){   
    echo $_SESSION['role'];
}
else{
    echo "No session :(";
}
 ?>