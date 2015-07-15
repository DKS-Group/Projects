<?php
	$m_name = trim($_POST['m_name']);
	$m_email = trim($_POST['m_email']);
	$m_theme = trim($_POST['m_theme']);
	$m_message = trim($_POST['m_message']);
	
if ($m_name=='') { echo "Введите имя"; }
elseif ($m_email=='') { echo "Введите E-mail"; }
elseif (!preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $m_email)) { echo "Неверно введён e-mail"; }
elseif ( $m_message=="" ) { echo "Введите сообщение"; }
else { 
		$adminmail = "laplundik@ya.ru"; # E-mail, на который уйдёт письмо
		
			$m_name = iconv("UTF-8", "windows-1251", $m_name);
			$m_email = iconv("UTF-8", "windows-1251", $m_email);
			$m_theme = iconv("UTF-8", "windows-1251", $m_theme);
			$m_message = iconv("UTF-8", "windows-1251", $m_message);
		
		# Формирование письма администратору	
		$theme   = '=?windows-1251?B?'.base64_encode($m_theme).'?=';
		$headers = "From: ".$ch_kont." <".$m_email.">\r\n";
		$headers = $headers."Return-path: <".$m_email.">\r\n";
		$headers = $headers."Content-type: text/html; charset=\"windows-1251\"\r\n";
		mail($adminmail,$m_theme,"<b>Новое сообщение с сайта</b><br />
								<b>Прислал:</b> ".$m_name."<br />
								<b>Номер договора:</b> ".$m_theme."<br />
								<b>Текст сообщения:</b> ".$m_message."<br />

								<b>Дата отправки:</b> ".date('d.m.Y H:i'),$headers);
		echo 'Zajavka prinjata, ozhidajte zvonka specialista';
}