<?php

require 'conn.php';
if(isset($_POST['submit'])){
	
$firstName=$_POST['fname'];
  $lastName=$_POST['lname'];
  $email=$_POST['email'];

 
  $address=$_POST['address'];
  $gender=$_POST['gender'];
// $sqlupdate = "UPDATE users SET fname='$firstName' ,lname='$lastName' ,email='$email' ,password='$password' ,address='$address' WHERE  WHERE id='$id'";
$ss="UPDATE users SET fname='$firstName' ,lname='$lastName' ,email='$email' ,address='$address',gender='$gender'  WHERE id='$id'";
$conn->query($ss) ;}