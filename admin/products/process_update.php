<?php 
	$id=$_POST['id'];
	require '../check_login_admin.php';
	$name=$_POST['name'];
	$image_new=$_FILES['image_new'];

	if($image_new['size']>0){ 
		$folder='photos/';
		$file_tail=explode('.',$image_new['name'])[1];
		$file_name=time().'.'.$file_tail;
		$path_file=$folder.$file_name;
		move_uploaded_file($image_new["tmp_name"], $path_file);
	}
	else{
		$file_name=$_POST['image_old'];
	}

	$price=$_POST['price'];
	$description=$_POST['description'];
	$manufacturer_id=$_POST['manufacturer_id'];
	$type_ids=$_POST['type_id'];

	
	include '../connect.php';
	$sql="update products set name='$name',image='$file_name',price='$price',description='$description',manufacturer_id='$manufacturer_id' where id=$id";
	$result=mysqli_query($connect,$sql);
	
	mysqli_close($connect);
	header('location:index.php');