<?php

 $to_mail = "dks.group.ua@gmail.com"; // ��� email

 $date = date("Y-m-d");
 $ip = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['phones'])){
 $phones = $_POST['phones'];
}
$phones = "";
if(isset($_POST['phone'])){
if($_POST['phone'] == "yes") { 

 if ($_POST['phones'] =="") {
    $err02 ="<BR>�� �� ����� <b>�������</b>";
    $send = "no";
    }


if ($send != "no"){

$sendphone = "<B>��� ������ �� ������ ���� ������ ��� ����� �� �������� ���</B>
<BR>
<a href='javascript: self.close ()'>������� ����</a>


</div>";

$message="

��� - $name
������� - $phones
���������� - $text

IP - $ip
���� - $date
";

mail("$to_mail","����� ������","$message","From: phone@zakaz-zvonok.ru\n"."Content-type: text/plain; charset=windows-1251");
}
else if ($send == "no") {
    $sendphone = "<div  style='padding: 14 0 0 15px; color: #838383;'>";
    $sendphone .= "$err01"; 
	$sendphone .= "$err02";
	$sendphone .= "<BR><BR>��������� <a href='zvonok.php'>�����</a> � ��������� �������";
    $sendphone .= "</div>";
    }
 }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>����� ��������� ������</title>
</head>
<body>
<center>
<div style="padding: 20px;"> 

<font style="font-size: 20px;">����� ��������� ������:</font><Br><Br>    

<? if($sendphone) { echo $sendphone; } else { ?>
<table border=0>
<form method=post onSubmit="if(!document.getElementById('phone').value){ alert(document.getElementById('phone').value + '������� �����!'); return false;}">
<input type="hidden" name="enter" value="1">
<tr>
<td align=right><font class="olive">������������</font></td>
<td><input type="text" class="login" name="name" size=20></td>
</tr>
<tr>
<td align=right><font class="olive">�������:</font></td>
<td><input name="phones" class="login" type="text" size=20></td>
</tr>    
<tr><td colspan=2 align=center>����������: <BR><textarea name="text" cols="30" rows="5"></textarea></td></tr>    
<tr>
<td colspan=2 align=center>
<input type="submit" value="���������">
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