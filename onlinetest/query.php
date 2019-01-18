<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>历史记录</title>
        <link rel='stylesheet' href='onlinetest.css' type='text/css'>
    </head>
    <body>
        <div class='start'>历史记录</div>
        <img src='medal.jpg' alt='medals'>
<?php
header("Content-Type:text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','lsyCXX0416579','onlinetest');
if( !$con )
{
    die('无法连接：  '.mysqli_error( $con ));
}
session_start();
$username = $_SESSION['username'];
$history = "select * from {$username} order by score desc, time";
$rethis = mysqli_query( $con, $history );
if( !$rethis )
{
    die('无法查询！');
}
echo "<div id='histit'>{$username}的历史成绩</div>";
echo "<table id='histab'><tr><th>分数</th><th>测试用时(s)</th><th>测试时间</th></tr>";
while($row = mysqli_fetch_assoc( $rethis) )
{
    echo "<tr><td>{$row['score']}</td><td>{$row['time']}</td><td>{$row['mdate']}</td></tr>";
}
echo "</table>";
?>   
    </body>
</html>