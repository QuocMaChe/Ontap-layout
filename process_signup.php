<?php  

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone_number=$_POST['phone_number'];
$address=$_POST['address'];

include 'admin/connect.php';
$sql="select count(*) from users where email='$email'";
$result=mysqli_query($connect,$sql);

$number_rows=mysqli_fetch_array($result)['count(*)'];

if($number_rows==1){
	session_start();
	$_SESSION['error']='Trùng email rồi';
	header('location:signup.php');
	exit();
}

$sql="insert into users(name,email,password,phone_number,address) values ('$name','$email','$password','$phone_number','$address')";
$result=mysqli_query($connect,$sql);

$sql="select id from users where email='$email'";
$result=mysqli_query($connect,$sql);
$id=mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id']=$id;
$_SESSION['name']=$name;

mysqli_close($connect);
header('location:index.php');
