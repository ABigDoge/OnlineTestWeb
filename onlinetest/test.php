<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>测试</title>
        <link rel='stylesheet' href='onlinetest.css' type='text/css'> 
    </head>
    <body>
        <div class='start'>测试</div>
        <?php 
        session_start();
        echo $_SESSION['username'];
        ?>
    </body>
</html>