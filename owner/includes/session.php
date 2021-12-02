<?php 

   
    session_start();
    if(!isset($_SESSION['owner'])){
        header('Location:../login.php');
    }


?>