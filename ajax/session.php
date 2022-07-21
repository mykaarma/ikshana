<?php 
session_start();
if(password_verify("sessioninfo", $_POST['token']))
    {
        $_SESSION['name']=$_POST['name'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['image']=$_POST['imageurl'];

    }


?>