<?php
	session_start ();
	include ("style.php");
	include ("config.php");
	include ("func.php");
?>
	<title>��������� ������� - <?php echo $PortalName; ?></title>
<body>
<center><?php if (!file_exists('files/logo.png')){echo "<img src = 'img/logo.png' border=0 alt = '�� �������'>";} else { echo "<img src = 'files/logo.png' border=0 alt = '�� �������'>";} ?><br>
<?php

if ($_SESSION['auth']) {
	if (($sendmoney == "True") && (isset ($_REQUEST["contract"]))) {
		$c=$_SESSION['login'];
		$c2=$_REQUEST['contract'];
		$money=0;
		if (is_numeric($_REQUEST['money'])) {$money=$_REQUEST['money'];}

		$sql = "SELECT ballance FROM stat WHERE user_name = '$c';";
		if ($GLOBALS ["UseMySQL"] == "True") { 
			$result = mysql_query($sql,$GLOBALS ["mysql"]);
			$row = mysql_fetch_array($result);
			$ballance = $row[0];
			mysql_free_result($result);
		}else {
			$result = odbc_exec ($GLOBALS ["odbc"], $sql);
			$ballance = odbc_result($result, 1);
			odbc_free_result($result);
			}
		$bal = split(" ",$ballance);
		$ballance = $bal[0];
		
		$sql = "SELECT contract FROM stat WHERE contract = '$c2';";
		if ($GLOBALS ["UseMySQL"] == "True") { 
			$result = mysql_query($sql,$GLOBALS ["mysql"]);
			$row = mysql_fetch_array($result);
			$contract = $row[0];
			mysql_free_result($result);
		}else {
			$result = odbc_exec ($GLOBALS ["odbc"], $sql);
			$contract = odbc_result($result, 1);
			odbc_free_result($result);
			}
			
		if (strlen($contract)<1){
			echo "<br><font color='red'>���������� �� ������!</font><br><br><br>";
			echo "<META HTTP-EQUIV=Refresh Content='3;URL=sendmoney.php'>";
			exit();
		}

		if (intval($ballance) < intval($money)) {
			echo "<br><font color='red'>������������ ������� ��� ��������!</font><br><br><br>";
			echo "<META HTTP-EQUIV=Refresh Content='3;URL=sendmoney.php'>";
			exit();
		} else {
			$uid = uniqid("",true);
			$datetoday = date("Y-m-d");
			$timetoday = date("H:i:s");
			$datetoday.="  ". $timetoday;
			$sql = "INSERT INTO addcash VALUES('$c','$money','SEND_MONEY','$c2',0,'$uid','SEND_MONEY','$datetoday');";
			if ($GLOBALS ["UseMySQL"] == "True") {mysql_query($sql,$GLOBALS ["mysql"]);
			}else {odbc_exec ($GLOBALS ["odbc"], $sql);}
			MakeActivity();
			echo "<br><font color='green'>������ ����� �������� � ������� ���������� �����!</font><br><br><br>";
			echo "<META HTTP-EQUIV=Refresh Content='3;URL=login.php?client=$c'>";
			exit();
		}
	} 
		?>
		<br><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br> ��������� ������� </b><br><br><br>
		<table>
			<tr>
				<td><b>��������� �������: &nbsp&nbsp</b></td>
				<td><input type = "text"
						name = "toclient"
						id='toclient'
						value = ""
						style = "width : 150px;
						height : 18px;
						font-family : Verdana;
						font-size : 12px;
						margin-top : 3px;
						margin-bottom : 3px;"> &nbsp (������� ����� ��������)</td> 
			</tr>
			<tr>
				<td><b>�����:</b></td>
				<td><input type = "text"
						name = "money"
						id='money'
						value = ""
						style = "width :340 px;
						height : 18px;
						font-family : Verdana;
						font-size : 12px;
						margin-top : 3px;
						margin-bottom : 3px;"></td> 
			</tr>
			<tr>
				<td colspan=2><button style='width:493px;height:40px' alt='��������� ������' title='��������� ������' onClick='SendMoney()'><img src='img/wallet.png'></button></td>
			</tr>
		</table>
		
		<?php 
			$sql = "SELECT param_value FROM workparams WHERE param_name = 'SEND_MONEY_PRICE';";
			if ($GLOBALS ["UseMySQL"] == "True") { 
				$result = mysql_query($sql,$GLOBALS ["mysql"]);
				$row = mysql_fetch_array($result);
				$sp = $row[0];
				mysql_free_result($result);
			}else {
				$result = odbc_exec ($GLOBALS ["odbc"], $sql);
				$sp = odbc_result($result, 1);
				odbc_free_result($result);
			}
			if ($sp>0) { echo "<font style = 'font-size : 9px;' color = 'darkgray'>��������� ��������: $sp $curr</font>";} 
	
	}
else {
	echo "<font color='red'> <br><b>��� ����������� ���������� ��������������!</b></font><br><br>";
} ?>
<script type="text/javascript">
	function SendMoney(){
		if (window.document.all.toclient.value.length < 3) {
			alert ("������� ����� �������, ���� ���������� �������� ������!");
			return 0;
		}
		if (window.document.all.money.value.length ==0) {
			alert ("������� ����� ��������!");
			return 0;
		}
		var answer = confirm ("�������� ������ ������� " + window.document.all.toclient.value + "?")
		if (answer) {window.location="sendmoney.php?contract=" + window.document.all.toclient.value + "&money=" + window.document.all.money.value;}
	}
</script>