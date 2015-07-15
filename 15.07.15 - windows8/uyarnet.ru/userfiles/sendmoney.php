<?php
	session_start ();
	include ("style.php");
	include ("config.php");
	include ("func.php");
?>
	<title>Пересылка средств - <?php echo $PortalName; ?></title>
<body>
<center><?php if (!file_exists('files/logo.png')){echo "<img src = 'img/logo.png' border=0 alt = 'На главную'>";} else { echo "<img src = 'files/logo.png' border=0 alt = 'На главную'>";} ?><br>
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
			echo "<br><font color='red'>Получатель не найден!</font><br><br><br>";
			echo "<META HTTP-EQUIV=Refresh Content='3;URL=sendmoney.php'>";
			exit();
		}

		if (intval($ballance) < intval($money)) {
			echo "<br><font color='red'>Недостаточно средств для перевода!</font><br><br><br>";
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
			echo "<br><font color='green'>Деньги будут отосланы в течении нескольких минут!</font><br><br><br>";
			echo "<META HTTP-EQUIV=Refresh Content='3;URL=login.php?client=$c'>";
			exit();
		}
	} 
		?>
		<br><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br> Пересылка средств </b><br><br><br>
		<table>
			<tr>
				<td><b>Переслать клиенту: &nbsp&nbsp</b></td>
				<td><input type = "text"
						name = "toclient"
						id='toclient'
						value = ""
						style = "width : 150px;
						height : 18px;
						font-family : Verdana;
						font-size : 12px;
						margin-top : 3px;
						margin-bottom : 3px;"> &nbsp (укажите номер договора)</td> 
			</tr>
			<tr>
				<td><b>Сумма:</b></td>
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
				<td colspan=2><button style='width:493px;height:40px' alt='Переслать деньги' title='Переслать деньги' onClick='SendMoney()'><img src='img/wallet.png'></button></td>
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
			if ($sp>0) { echo "<font style = 'font-size : 9px;' color = 'darkgray'>Стоимость перевода: $sp $curr</font>";} 
	
	}
else {
	echo "<font color='red'> <br><b>Для продолжения необходимо авторизоваться!</b></font><br><br>";
} ?>
<script type="text/javascript">
	function SendMoney(){
		if (window.document.all.toclient.value.length < 3) {
			alert ("Введите логин клиента, кому необходимо отослать деньги!");
			return 0;
		}
		if (window.document.all.money.value.length ==0) {
			alert ("Введите сумму перевода!");
			return 0;
		}
		var answer = confirm ("Передать деньги клиенту " + window.document.all.toclient.value + "?")
		if (answer) {window.location="sendmoney.php?contract=" + window.document.all.toclient.value + "&money=" + window.document.all.money.value;}
	}
</script>