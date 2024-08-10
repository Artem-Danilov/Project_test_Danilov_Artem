<?
$server = 'localhost';
$login = 'dartem2005';
$pass = 'Temoha2003';
$nameDb = 'dartem2005';

$connect = mysqli_connect($server, $login, $pass, $nameDb);
if ($connect == false) {
	echo("Error: Unable to connect to MySQL " . mysqli_connect_error());
}
