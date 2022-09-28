<?php
$host = 'localhost';
$user = 'root';
$pass = '';
session_start();
$conn = new mysqli($host, $user, $pass);
if (!$conn) {
    die('Could not connect' . mysqli_connect_errno());
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS chat";
    $result = $conn->query($sql);
    $db = 'chat';
    // RECONNECTING TO DATABASE
    $conn = new mysqli($host, $user, $pass, $db);
    if (!$conn) {
        die('could not connect to database' . mysqli_connect_error());
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS users(
            id INT(11) PRIMARY KEY AUTO_INCREMENT, 
            username VARCHAR(255),
            email VARCHAR(255),
            country VARCHAR(255),
            gender VARCHAR(255),
            profile_pic VARCHAR(255),
            password VARCHAR(255),
            status VARCHAR(255),
            password_answer VARCHAR(255),
            created_at TIMESTAMP
        )";
        if (!$result = $conn->query($sql)) {
            die('unable to create table' . mysqli_connect_error());
        }
    }
}

$sql = "CREATE TABLE IF NOT EXISTS messages(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    sender_username VARCHAR(100),
    reciever_username VARCHAR(100),
    body VARCHAR(255),
    status VARCHAR(100),
    created_at TIMESTAMP
)";
if (!$result = $conn->query($sql)) {
    die('unable to create table' . mysqli_connect_error());
}
