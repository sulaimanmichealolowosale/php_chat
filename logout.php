<?php
include 'path.php';
include(ROOT_PATH . '/app/database/functions.php');

session_start();
$id=$_SESSION['id'];
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['profile_pic']);
unset($_SESSION['status']);
session_destroy();
$data=[
    'status'=>'offline'
];
$logout=update('users',$data,$id);
header('location: ' . BASE_URL . 'login');