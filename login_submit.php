<?php
    require 'connection.php';
    session_start();
    $email=mysqli_real_escape_string($con,$_POST['email']);
   
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
  
    $role = 'buyer';
    $user_authentication_query="select id,email,role from users where email='$email' and password='$password' and role='$role'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==1){
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];  //user id
        $_SESSION['role']= $row['role']; 
        header('location: index.php');
    }else{
        $role = 'admin';
        $user_authentication_query="select id,email,role from users where email='$email' and password='$password' and role='$role'";
        $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
        $rows_fetched=mysqli_num_rows($user_authentication_result);
        if($rows_fetched==1){
            $row=mysqli_fetch_array($user_authentication_result);
            $_SESSION['email']=$email;
            $_SESSION['id']=$row['id'];  //user id
            $_SESSION['role']= $row['role']; 
            header('location: admin/order.php');
    }else{
        header('location: login.php');
    }
}
    
 ?>
