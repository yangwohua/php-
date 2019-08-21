<?php

$name = $_POST['username'];
$passwd = $_POST['password'];

//连接数据库
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "php";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} else {
    $conn->set_charset('UTF8');
}

header("Content-type: text/html; charset=utf-8");

$sql = "SELECT * FROM admin WHERE username= '{$name}'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $sql = "UPDATE admin SET password = '{$passwd}' WHERE username='{$name}'";
    $result = $conn->query($sql);
    echo "<script type='text/javascript'>
        alert('重置用户的密码成功!');
        location.href='login.html';
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert('用户名不存在!');
        location.href='login.html';
        </script>";
}

$conn->close();
