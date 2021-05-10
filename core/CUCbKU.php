<?php
define ('H',$_SERVER['DOCUMENT_ROOT']);
require_once H.'/core/zefox.php';



$summa = $_POST['LMI_PAYMENT_AMOUNT']; // Входящая сумма
$kosh = $_POST['LMI_PAYEE_PURSE']; // кошелек

$kod = $_POST['FIELD_1']; // код






if(trim($_POST['LMI_PAYEE_PURSE'])!= $kosh) {
$err="ERR: Ошибка  не правильный кошелек";
echo $err;
exit;
}



if(trim($_POST['LMI_PAYMENT_AMOUNT'])!= $summa) {
$err="ERR: Ошибка не правильная сумма";
echo $err;
exit;
}




 
IF($_POST['LMI_PREREQUEST']==1) 
{
}
ELSE 
{



if ($kod  != null)
{
	
		if ($summa == 100) { $times = date('d.m.Y H:i:s', (time() + 604800));}
		if ($summa == 300) { $times = date('d.m.Y H:i:s', (time() + 2629743));}
		if ($summa == 700) { $times = date('d.m.Y H:i:s', (time() * 5));}
		



mysql_query("INSERT INTO `users` (`kod`,`End Time`) values('".$kod."','".$times."')");




$money= $summa / 100;
$moneyproch = $money * 30;
$moneyproch2 = $money * 10;


$user1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `admins` WHERE `id` = '1'  LIMIT 1"));
$user2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `admins` WHERE `id` = '2'  LIMIT 1"));
$user3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `admins` WHERE `id` = '3'  LIMIT 1"));
$user4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `admins` WHERE `id` = '4'  LIMIT 1"));

mysql_query("UPDATE `admins` SET `money` = '".($user1['money'] + $moneyproch)."' WHERE `id` ='1'");	
mysql_query("UPDATE `admins` SET `money` = '".($user2['money'] + $moneyproch)."' WHERE `id` = '2'");	
mysql_query("UPDATE `admins` SET `money` = '".($user3['money'] + $moneyproch)."' WHERE `id` = '3'");	
mysql_query("UPDATE `admins` SET `money` = '".($user4['money'] + $moneyproch2)."' WHERE `id` = '4'");						


				$logtime = time();
				$text= 'Пользователь оплатил код '.$kod.' через мерчант';
				mysql_query("INSERT INTO `log` (`time`,`text`,`who`) values('".$logtime."','".check($text)."','')");



}



}







?>
