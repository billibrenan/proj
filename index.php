<?php
   # поля: id; question; answer1; answer2; answer3; answer4; trueAnswerID
   # таблица: test
       
        $db = mysql_connect ("localhost", "root", "");
mysql_query("SET NAMES utf8");
mysql_select_db ("testt", $db);
 
   $result = mysql_query("SELECT * FROM `testt`");
   if($status==1){
           $mark = 0;
           while($row = mysql_fetch_object($result)){
                   $i = $i+1;
                   if($quest[$i]==$row->trueAnswerID){
                           $mark = $mark+1;
                   }
           }
   echo("Количество правильных ответов: ".$mark);
   }
   else{
           while($row = @mysql_fetch_object($result)){
           $i = $i+1;
           echo("Вопрос № <b>".$row->id."</b><br>".$row->question."<br>
           Варианты ответов:<br>1) ".$row->answer1."<br>2) ".$row->answer2."<br>3) ".$row->answer3."<br>4) ".$row->answer4."<br>
           <form action=".$_SERVER['PHP_SELF']." method='post'>
           Номер правильного ответа: <select size='1' name='quest[".$i."]'>
             <option value='1'>1</option>
             <option value='2'>2</option>
             <option value='3'>3</option>
             <option value='4'>4</option>
           </select><br><br>");
           }
   echo("<input name='status' type='hidden' value='1'>
   <input type='submit' value='Проверить ответы'>");
   }
   ?>