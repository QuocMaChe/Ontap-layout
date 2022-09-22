<?php 
	require '../check_login_super_admin.php';
	if (empty($_POST['id'])){
		header("location:index.php?error=Phải truyền mã để sửa");
		exit;
	}

	$id=$_POST['id'];

	if (empty($_POST['name'])||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['image'])){
		header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin");
		exit;
	}

	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$image=$_POST['image'];


	include '../connect.php';
	$sql="update manufacturers set name='$name',address='$address',phone='$phone',image='$image' where id='$id'";

	$result=mysqli_query($connect,$sql);


	if($connect){
		header("location:index.php?success=Sửa thành công");
	}
	else{
		header("location:form_update.php?id=$id&success=Lỗi truy vấn");
	}
	mysqli_close($connect);

