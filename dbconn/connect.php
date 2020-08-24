<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/dbconn/access.php';

// подключаемся к базе данных
$DB = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
if($DB->connect_error){
    die("Connection failed: " . $DB->connect_error);
}
?>