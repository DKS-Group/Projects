<?php
	$m_name = trim($_POST['m_name']);
	$m_tel = trim($_POST['m_tel']);
	$m_adress = trim($_POST['m_adress']);
	$m_etaj = trim($_POST['m_etaj']);
	
if ($m_name=='') { echo "������� ���"; }
elseif ($m_tel=='') { echo "������� ���������� �������"; }
elseif ( $m_adress=="" ) { echo "������� �����"; }
else { 
		$adminmail = "laplundik@ya.ru"; # E-mail, �� ������� ���� ������
		
			$m_name = iconv("UTF-8", "windows-1251", $m_name);
			$m_tel = iconv("UTF-8", "windows-1251", $m_tel);
			$m_adress = iconv("UTF-8", "windows-1251", $m_adress);
			$m_etaj = iconv("UTF-8", "windows-1251", $m_etaj);

		# ������������ ������ ��������������	
		$theme   = '=?windows-1251?B?'.base64_encode($m_theme).'?=';
		$headers = "From: ".$ch_kont." <".$m_tel.">\r\n";
		$headers = $headers."Return-path: <".$tel.">\r\n";
		$headers = $headers."Content-type: text/html; charset=\"windows-1251\"\r\n";
		mail($adminmail,$m_theme,"<b>����� ��������� � �����</b><br />
								<b>�������:</b> ".$m_name."<br />
								<b>�������:</b> ".$m_tel."<br />
								<b>�����:</b> ".$m_adress."<br />
								<b>����:</b> ".$m_etaj."<br />
								<b>���� ��������:</b> ".date('d.m.Y H:i'),$headers);
		echo 'Spasibo,zayavka prinyata,ozhidajte zvonka specialista';
}