<?php
require 'conn.php';
session_start(); 
if($_SESSION['isLogin'] == true){

}else{
    header("location: login.php");
}
$id=$_POST['id'];

$sql = "DELETE FROM users WHERE id='$id'";

$conn->query($sql);
$_SESSION['deleteCourse']='ll';
    header("location:index.php");
