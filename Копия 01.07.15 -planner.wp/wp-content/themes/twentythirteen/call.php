<?php

 $to_mail = "dks.group.ua@gmail.com"; // ваш email

 $date = date("Y-m-d");
 $ip = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['phones'])){
 $phones = $_POST['phones'];
}
$phones = "";
if(isset($_POST['phone'])){
if($_POST['phone'] == "yes") { 

 if ($_POST['phones'] =="") {
    $err02 ="<BR>Вы не ввели <b>Телефон</b>";
    $send = "no";
    }


if ($send != "no"){

$sendphone = "<B>Как только мы увидим вашу заявку так сразу же позвоним Вам</B>
<BR>
<a href='javascript: self.close ()'>Закрыть окно</a>


</div>";

$message="

Имя - $name
Телефон - $phones
Коментарий - $text

IP - $ip
Дата - $date
";

mail("$to_mail","Заказ звонка","$message","From: phone@zakaz-zvonok.ru\n"."Content-type: text/plain; charset=windows-1251");
}
else if ($send == "no") {
    $sendphone = "<div  style='padding: 14 0 0 15px; color: #838383;'>";
    $sendphone .= "$err01"; 
	$sendphone .= "$err02";
	$sendphone .= "<BR><BR>Вернитесь <a href='zvonok.php'>назад</a> и повторите попытку";
    $sendphone .= "</div>";
    }
 }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Заказ обратного звонка</title>
</head>
<body>
<center>
<div style="padding: 20px;"> 

<font style="font-size: 20px;">Заказ обратного звонка:</font><Br><Br>    

<? if($sendphone) { echo $sendphone; } else { ?>
<table border=0>
<form method=post onSubmit="if(!document.getElementById('phone').value){ alert(document.getElementById('phone').value + 'Введите номер!'); return false;}">
<input type="hidden" name="enter" value="1">
<tr>
<td align=right><font class="olive">Представтесь</font></td>
<td><input type="text" class="login" name="name" size=20></td>
</tr>
<tr>
<td align=right><font class="olive">Телефон:</font></td>
<td><input name="phones" class="login" type="text" size=20></td>
</tr>    
<tr><td colspan=2 align=center>Коментарий: <BR><textarea name="text" cols="30" rows="5"></textarea></td></tr>    
<tr>
<td colspan=2 align=center>
<input type="submit" value="отправить">
<input type="hidden" name="phone" value="yes">
<input type="hidden" name="ip" value="<? echo $_SERVER['REMOTE_ADDR'];?>">
<input type="hidden" name="data" value="<? echo date("H:i d.m.Y");?>">
</td>
</tr>    
</form>
</table>
<? } ?>
</div>
</html>