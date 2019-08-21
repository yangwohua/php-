<?php

$name = $_POST['name'];
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
    echo "<script type='text/javascript'>
        alert('账号已存在，请重新输入!');
        location.href='login.html';
        </script>";
} else {
    $sql = "INSERT INTO admin (username, password)
    VALUES ('{$name}', '{$passwd}')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
        alert('注册账号成功!');
        location.href='login.html';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
