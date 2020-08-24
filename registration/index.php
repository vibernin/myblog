<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/dbconn/connect.php';

$loginSuccess = false;
$passwordSuccess = false;
if(isset($_GET['login']) && !empty($_GET['login'])){
    if(strlen($_GET['login']) >= 3){
        if (preg_match('/^[a-z0-9_]+$/i', $_GET['login'])){
            $login = trim($_GET['login']);
            $loginSuccess = true;
        }
        else{
            echo 'Логин содержит недопустимые символы<br>';
        }
    }
    else{
        echo 'Логин должен состоять как минимум из 3 символов<br>';
    }
}
else{
    echo 'Введите логин<br>';
}
if(isset($_GET['password']) && !empty($_GET['password'])){
    if(strlen($_GET['login']) >= 3){
        $password = trim($_GET['password']);
        $passwordSuccess = true;
    }
    else{
        echo 'Пароль должен состоять как минимум из 3 символов<br>';
    }
}
else{
    echo 'Введите пароль<br>';
}
if($loginSuccess === true && $passwordSuccess === true){
    $checkLogin = $DB->query("SELECT login FROM reg WHERE login = '" . $login ."'");
    if(mysqli_num_rows($checkLogin) > 0){
        echo 'Пользователь с таким логином уже существует';
    }
    if(mysqli_num_rows($checkLogin) === 0){
        $newUser = $DB->query("INSERT INTO reg (login, password) VALUES ('$login', '$password')");
        if ($DB->query($newUser) === TRUE) {
            echo "Ваш аккаунт создан<br>";
        }
    }
}
?>