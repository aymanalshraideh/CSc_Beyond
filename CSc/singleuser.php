<?php
require 'conn.php';

$id = $_post['id'];
$sql = "SELECT * FROM users WHERE id='$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);