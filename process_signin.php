<?php  

$email=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST['remember'])){ 
	$remember=true;
}
else{
	$remember=false;
}

include 'admin/connect.php';
$sql="select * from users where email='$email' and password='$password'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
$number_rows=mysqli_num_rows($result);

if($number_rows==1){
	session_start();
	$id=$each['id'];
	$_SESSION['id']=$id;
	$_SESSION['name']=$each['name'];
	if($remember==true){
		$token=uniqid('user',true);
		$sql="update users set token='$token' where id='$id'";
		mysqli_query($connect,$sql);
		setcookie('remember',$token,time()+60*60*24*30);
	}
	header('location:user.php');
	exit;
}
else{
	header('location:signin.php?error=Tên hoặc mật khẩu không đúng!');
	exit();
	mysqli_close($connect);
}
