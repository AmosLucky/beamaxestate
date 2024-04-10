<?php
session_start();

///check for auth

if(!isset($_SESSION['user_id']) || !isset($_SESSION['email'])){
    echo "<script>
    window.location.href = '../login.php';
    </script>";
}

$user_id = $_SESSION['user_id'];
$email =  $_SESSION['email'];


$get_user = "SELECT * FROM users where id = '$user_id'";
$get_user_result = mysqli_query($conn,$get_user);

$current_user = mysqli_fetch_assoc($get_user_result);

$email = $current_user['email'];
$username = $current_user['username'];
$fullname = $current_user['fullname'];




$sql = "SELECT * FROM properties where user_id = '$user_id'order by id desc";

$exe = mysqli_query($conn,$sql);

$myproperies = mysqli_num_rows($exe);




?>