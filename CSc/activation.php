<?php
require 'conn.php';
session_start(); 
if($_SESSION['isLogin'] == true){

}else{
    header("location: login.php");
}
$id=$_POST['id'];
if ($_POST['active'] == 0) {
    $active = "UPDATE users SET activation='1' WHERE id='$id' ";
    
    
} else {
    $active = "UPDATE users SET activation='0' WHERE id='$id' ";
   
}

 $conn->query($active);
 header("location: index.php");
