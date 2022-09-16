<?php
require 'conn.php';
session_start(); 
if($_SESSION['isLogin'] == true){

}else{
    header("location: login.php");
}
// $id=$_POST['id'];
$id= $_GET['deleteId'];

$sql = "DELETE FROM users WHERE id='$id'";

$conn->query($sql);
$_SESSION['deleteCourse']='ll';
    // header("location:index.php");
