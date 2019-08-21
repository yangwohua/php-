<?php
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
//本文件名是welcome.php  
$name = $_POST['name'];
$passwd = $_POST['mypassword'];
// echo "用户名" . $name . "</br>";
// echo "密码" . $passwd . "</br>";

$sql = "SELECT * FROM admin WHERE username= '{$name}' AND password='{$passwd}'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    echo "<script type='text/javascript'>
        alert('登录成功!');
        location.href='http://www.4399.com/';
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert('登录失败, 请检查用户名或密码!');
        location.href='/login.html';
        </script>";
}

$conn->close();
