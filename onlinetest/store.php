<?php
header("Content-Type:text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','lsyCXX0416579','onlinetest');
if( !$con )
{
    die('无法连接：  '.mysqli_error( $con ));
}
session_start();
$username = $_SESSION['username'];
$tottime = $_POST['time'];
$scores = $_POST['scores'];
$store = "insert into {$username}(score, `time`)
        values
        ('$scores','$tottime')";
$retadd = mysqli_query( $con, $store );
if( !$retadd )
{
    die('无法保存成绩：  '.mysqli_error( $con ));
}
