<?php

//包含数据库配置文件
require_once 'connect.php';

if($_POST['submit']=="登录"){

    if(isset($_REQUEST['code']))
    {
        session_start();
        if(!(strtolower($_REQUEST['code']) == $_SESSION['code']))
        {
            echo "<script type='text/javascript'>
                   alert('验证码错误！');
                   location.href='login.php';
                   </script>";
        }else{
            $name=$_POST['username'];
            $password=md5($_POST['password']);
        }
    }
}
//通过session函数可在web服务器中储存
session_start();
$_SESSION['name']=$name;

//查询管理员表的查询语句
$sql="SELECT * FROM admin WHERE username='{$name}' AND userpwd='{$password}'";

//查询用户表的查询语句
$sql1="SELECT * FROM user WHERE username='{$name}' AND userpwd='{$password}'";

// 对两个语句分别进行查询，得出两个结果集
$result=$mysqli->query($sql);
$res=$mysqli->query($sql1);

//判断是否是管理员,如果不是，则继续判断是否是用户
if ($result && $result->num_rows>0){
    echo "<script type='text/javascript'>
    alert('登录成功，您的身份是管理员！');
    location.href='admin.work.php';
    </script>";
}elseif($res && $res->num_rows>0){
    echo "<script type='text/javascript'>
    alert('登录成功!');
    location.href='user.index.php';
    </script>";
}else{
    echo "<script type='text/javascript'>
    alert('登录错误!');
    location.href='login.php';
    </script>";
}
?>