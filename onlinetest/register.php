<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>新用户注册</title>
        <link rel='stylesheet' href='onlinetest.css' type='text/css'>  
    </head>
    <body>
        <div class='start'>新用户注册</div>
<?php
header("Content-Type:text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','lsyCXX0416579','onlinetest');
if( !$con )
{
    die('无法连接：  '.mysqli_error( $con ));
}
function err( $errname )
{
    die("<p class='err'>{$errname}是必须填写的信息！");
}
$username = $_POST['username'];
if( empty($username) )
{
    err( '用户名' );
}
$password = $_POST['password'];
if( empty($password) )
{
    err( '密码' );
}
$cpassword = $_POST['cpassword'];
if( $password != $cpassword )
{
    die('密码与确认密码不同！');
}
$sex = $_POST['sex'];
if( empty($sex) )
{
    err( '性别' );
}
$school = $_POST['school'];
if( empty($school) )
{
    err( '学院' );
}
$createuser = "create table `{$username}`(
            id int primary key auto_increment,
            `score` int,
            `time` float,
            mdate timestamp not null default current_timestamp
            )";
$retcre = mysqli_query( $con, $createuser );
if( !$retcre )
{
    die('无法添加用户：  '.mysqli_error($con));
}
$insertuser = "insert into user(id, username, password, sex, school)
            values
            (default, '$username', '$password', '$sex', '$school')";
$retins = mysqli_query( $con, $insertuser );
if( !$retins )
{
    die('无法创建用户：  '.mysqli_error($con));
}
else echo "<p class='err'>注册成功！马上自动跳转至登录页面</p>";
header("refresh:1;url='onlinetest.html'");
?>
    </body>
</html>