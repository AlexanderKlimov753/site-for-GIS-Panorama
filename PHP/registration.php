<?php

$fname = trim(filter_var($_POST['fname'],FILTER_SANITIZE_SPECIAL_CHARS));
$lname = trim(filter_var($_POST['lname'],FILTER_SANITIZE_SPECIAL_CHARS));
$Mname = trim(filter_var($_POST['Mname'],FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'],FILTER_SANITIZE_SPECIAL_CHARS));
$phone = trim(filter_var($_POST['phone'],FILTER_SANITIZE_SPECIAL_CHARS));
$INN = trim(filter_var($_POST['INN'],FILTER_SANITIZE_SPECIAL_CHARS));
$username = trim(filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS));

if(strlen($fname)<2) {
	echo "fname error";
	exit;
}

if(strlen($lname)<2) {
	echo "lname error";
	exit;
}

if(strlen($Mname)<2) {
	echo "Mname error";
	exit;
}

if(strlen($email)<2 && !str_contains($email,'@')) {
	echo "email error";
	exit;
}

if(strlen($phone)<2) {
	echo "phone error";
	exit;
}

if(strlen($INN)<2) {
	echo "INN error";
	exit;
}

if(strlen($username)<2) {
	echo "username error";
	exit;
}

if(strlen($password)<2) {
	echo "password error";
	exit;
}

//password
$hashpass = password_hash($password, PASSWORD_BCRYPT);

//DB
require "db.php";

$sql = 'INSERT INTO users(fname,lname,Mname,email,phone,INN,username,password) VALUES(?,?,?,?,?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$fname, $lname, $Mname, $email, $phone, $INN, $username, $hashpass]);

header('location: ../index.html');
