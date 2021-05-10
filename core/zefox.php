<?
define('HOST', 'localhost'); //Сервер базы
define('USER', 'имя бд'); //Имя пользователя
define('PASS', 'пароль от бд'); //Пароль базы
define('BASE', 'имя бд'); //База данных

mysql_connect(HOST, USER, PASS) or exit('Немогу подключиться к серверу');
mysql_select_db(BASE) or exit('Немогу подключиться к базе');
mysql_query("set names 'utf8'");
mysql_query("set charset 'utf8'");
mysql_query("set SESSION collation_connection = 'utf8_general_ci'");

function check($check){
	$check = htmlspecialchars(mysql_real_escape_string($check));
	return $check;
}



	if (isset($_COOKIE['userlogin']) and isset($_COOKIE['userpass'])) {
	$userlogin = check($_COOKIE['userlogin']);
	$userpass = check($_COOKIE['userpass']);
		
	$query = mysql_query("SELECT * FROM `admins` WHERE `login` = '$userlogin' and `pass` = '$userpass' LIMIT 1");
	$admin = mysql_fetch_assoc($query);

}



function times($time)
{
$month_name =
array( 1 => 'января',
2 => 'февраля',
3 => 'марта',
4 => 'апреля',
5 => 'мая',
6 => 'июня',
7 => 'июля',
8 => 'августа',
9 => 'сентября',
10 => 'октября',
11 => 'ноября',
12 => 'декабря'
);

$month = $month_name[ date( 'n' , $time ) ];

$day = date( 'j' , $time );
$year = date( 'Y' , $time );
$hour = date( 'G' , $time );
$min = date( 'i' , $time );

$date = $day . ' ' . $month . ' ' . $year . ' г. в ' . $hour . ':' . $min;

$dif = time()- $time;
if($dif==0)
{
	return " только что";
}else
if($dif<60){
return $dif." сек. назад";
}elseif($dif>=60 and $dif<3600){
return round($dif/60)." мин. назад";
}elseif($dif>=3600 and $dif<86400){
return round($dif/3600)." час. назад";
}else{
return $date;
}

}

?>