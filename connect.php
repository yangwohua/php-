<?php

//连接数据库
$mysqli = new mysqli("localhost","root","root","php");
if($mysqli->connect_errno){
    die('Connent Error:'.$mysqli->connect_error);
}else{
    $mysqli->set_charset('UTF8');           //定义字符集
}
//把警告信息和提示信息过滤
error_reporting(E_ALL^E_NOTICE^E_WARNING);
