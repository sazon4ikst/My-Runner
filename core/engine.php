<?
session_start();

include("config.php");
include("functions.php");

$db = mysql_connect($config['host'],$config['dbuser'],$config['dbpassword']) or die("Database error");
mysql_select_db($config['dbbase'], $db);
mysql_query("set names 'utf8'");

//loadmodules
include("modules/members.php");
$members_module= new Members();
include("modules/orders.php");
$orders_module= new Orders();
include("modules/api.php");
$api_module= new Api();
//loadmodules


?>