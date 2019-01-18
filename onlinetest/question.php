<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>python基础知识测试</title>
        <link rel='stylesheet' href='onlinetest.css' type='text/css'>
        <link rel='stylesheet' href='link1.css' type='text/css'>
        <?php
        session_start();
        $username = $_SESSION['username'];
        ?> 
        <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js">
        </script> 
        <script>
            var username ="<?php echo $username;?>";
            function greet()
            {
                var time = new Date();
                var hour = time.getHours();
                if( hour >=0 && hour < 12 )
                {
                    document.write( 'Good Morning,'+username+'!');
                }
                else if( hour >= 12 && hour <= 18 )
                {
                    document.write( 'Good Afternoon,'+username+'!' );
                }
                else
                {
                    document.write( 'Good Evening,'+username+'!' );
                }
            }
        </script>
        <script>
            function calculate()
            {
                clearInterval(myVar);
                var scores=0;
                var q1=document.forms[0].answer1.value;
                if( q1 == '3' )
                {
                    scores = scores+1;
                }
                var q2=document.forms[0].answer2.value;
                if( q2 == 'cor' )
                {
                    scores = scores+2;
                }
                var q3=document.forms[0].answer3.value;
                if( q3 == 'cor' )
                {
                    scores = scores+3;
                }  
                var time2=new Date().getTime();
            //    alert(time2+' '+time1);
                var time = (time2-time1)/1000;
                alert('你的分数是'+scores+'!  '+'你共用时'+time.toFixed(1)+'s!');
                $.post("store.php",{scores:scores,time:time});
            }
        </script>
    </head>
    <body>
        <div class='start'>python基础知识测试</div>
        <img src='python.jpg' alt='python' >
        <a href='query.php' id='history'>查看历史记录</a>
        <div id='rectime'>已用时间：<p id='cost'></p></div>
        <div id='welcome' ><script>greet();</script></div>
        <div id='intro'>Python是当今最受欢迎的程序设计语言之一，具有良好的
            可读性，简洁性和可扩展性，具有丰富而强大的库。<br>在国外用Python做科学计算的研究
            机构日益增多，一些知名大学已经采用Python来教授程序设计课程。<br>例如卡耐基梅隆大学
            的编程基础、麻省理工学院的计算机科学及编程导论就使用Python语言讲授。<br>在北理工，
            我们也有Python选修课。本测试通过几个小题，可以初步测试一下你对python基本语法的
            掌握程度！
        </div>
        <script>
            var time1=new Date().getTime();
            var myVar = setInterval(function(){ myTimer() }, 100);
            function myTimer() 
            {
                    var d = new Date();
                    var t = ( d - time1 )/1000;
                    document.getElementById("cost").innerHTML = t.toFixed(1)+'s';
            }
        </script>
        <form id='question' onsubmit="calculate()">
            <fieldset>
                1.classmates = ['Michael', 'Bob', 'Tracy'],<br>
                  则len(classmates)的返回值是多少？<br>
                  <input type="text" name='answer1'><br><br>
                2.L = list(range(100)),则取出[0, 1, 2, 3, 4, 5, 6, 7, 8, 9]<br>
                  应当怎么切片？<br>
                  <input type="radio" name='answer2' value='cor'>L[:10]<br>
                  <input type="radio" name='answer2' value='wro'>L[:9]<br><br>
                3.我们知道，高阶函数可以把函数作为结果值返回。那么，在如下代码中：<br>
                 <pre>
                    def lazy_sum(*args):
                        def sum():
                            ax = 0
                            for n in args:
                                ax = ax + n
                            return ax
                        return sum
                    f = lazy_sum(1, 3, 5, 7, 9)
                 </pre>
                 <pre>     最终求和结果的表示应当是:<select name='answer3'>
                        <option value="wro">f</option>
                        <option value="cor">f()</option>
                        <option value="wro">*f</option>
                 </select></pre><br>
                <input type="submit" value="提交" class='subbutton'><br><br>
                <input type="hidden" name='grade' id='score'>
                <input type='hidden' name='tottime' id='time'>
            </fieldset>
        </form>  
    </body>
</html>