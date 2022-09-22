<?php  
function current_url(){
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/PHP/Ôn_tập&lay_out';
	return $url;
}
$email=$_GET['email'];

require 'admin/connect.php';

$sql="select id,name from users where email='$email'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);

if(mysqli_num_rows($result)==1){
	$id=$each['id'];
	$name=$each['name'];
	$sql="delete from forgot_password where customer_id='$id'";
	$result=mysqli_query($connect,$sql);
	$token=uniqid();
	$sql="insert into forgot_password (customer_id,token) values ('$id','$token')";
	mysqli_query($connect,$sql);
	$link=current_url().'/change_new_password.php?token='.$token;
	
	require 'mail.php';
	$title='Change New Password';
	$content="Bấm vào đây <a href='$link'> Hiệu lực trong 60 giây</a>";
	sendmail($email,$name,$title,$content);
}
