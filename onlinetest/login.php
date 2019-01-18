<?php
header("Content-Type:text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','lsyCXX0416579','onlinetest');
if( !$con )
{
    die('无法连接：  '.mysqli_error( $con ));
}
$username = $_POST['username'];
$password = $_POST['password'];
$checkuser ="select * from user where username='$username' and password='$password'";
$retch = mysqli_query( $con, $checkuser );
if( !$retch )
{
    echo "用户名或密码错误！";
    header("refresh:2;url='onlinetest.html'");
}
else
{
    session_start();
    $_SESSION['username'] = $username;
    header("location:question.php");
}