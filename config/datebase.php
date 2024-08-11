<?
$server = 'localhost';
$login = 'dartemq2_tetsbd';
$pass = 'Temoha2003';
$nameDb = 'dartemq2_tetsbd';

$connect = mysqli_connect($server, $login, $pass, $nameDb);
if ($connect == false) {
	echo("Error: Unable to connect to MySQL " . mysqli_connect_error());
}
