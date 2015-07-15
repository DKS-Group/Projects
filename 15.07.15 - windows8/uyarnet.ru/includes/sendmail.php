<?php
	$m_name = trim($_POST['m_name']);
	$m_tel = trim($_POST['m_tel']);
	$m_adress = trim($_POST['m_adress']);
	$m_etaj = trim($_POST['m_etaj']);
	
if ($m_name=='') { echo "Введите имя"; }
elseif ($m_tel=='') { echo "Введите контактный телефон"; }
elseif ( $m_adress=="" ) { echo "Введите Адрес"; }
else { 
		$adminmail = "laplundik@ya.ru"; # E-mail, на который уйдёт письмо
		
			$m_name = iconv("UTF-8", "windows-1251", $m_name);
			$m_tel = iconv("UTF-8", "windows-1251", $m_tel);
			$m_adress = iconv("UTF-8", "windows-1251", $m_adress);
			$m_etaj = iconv("UTF-8", "windows-1251", $m_etaj);

		# Формирование письма администратору	
		$theme   = '=?windows-1251?B?'.base64_encode($m_theme).'?=';
		$headers = "From: ".$ch_kont." <".$m_tel.">\r\n";
		$headers = $headers."Return-path: <".$tel.">\r\n";
		$headers = $headers."Content-type: text/html; charset=\"windows-1251\"\r\n";
		mail($adminmail,$m_theme,"<b>Новое сообщение с сайта</b><br />
								<b>Прислал:</b> ".$m_name."<br />
								<b>Телефон:</b> ".$m_tel."<br />
								<b>Адрес:</b> ".$m_adress."<br />
								<b>Этаж:</b> ".$m_etaj."<br />
								<b>Дата отправки:</b> ".date('d.m.Y H:i'),$headers);
		echo 'Spasibo,zayavka prinyata,ozhidajte zvonka specialista';
}