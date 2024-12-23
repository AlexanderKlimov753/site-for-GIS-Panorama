<?php
session_start(); 
//$email = trim(filter_var($_POST['email'],FILTER_SANITIZE_SPECIAL_CHARS));
//$phone = trim(filter_var($_POST['phone'],FILTER_SANITIZE_SPECIAL_CHARS));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS));

if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $email = $login;
    $phone = '';
} else {
    $email = '';
    $phone = $login;
}

if(strlen($password)<2) {
	echo "password error";
	exit;
}

//DB
require "db.php";

//�����������
$sql = 'SELECT id, password FROM users WHERE email = ? OR phone = ?';
$query = $pdo->prepare($sql);
$query->execute([$email, $phone]);

if($query->rowCount()==0)
	echo"такого чела нет";
else{
    $user = $query->fetch();
    if (password_verify($password, $user['password'])) {
        // password is correct
        setcookie('login', $login, time() + 3600 * 24 * 30, '/');
        header('location: ../auth.html');
    } else {
        echo "password error";
    }
}
