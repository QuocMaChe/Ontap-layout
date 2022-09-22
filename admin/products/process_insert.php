<?php 
	require '../check_login_admin.php';
	if($_POST['name']==''||$_FILES['image']==''||$_POST['price']==''||$_POST['manufacturer_id']==''||$_POST['type_names']==''){
		header('location:index.php?error=Thêm không thành công');
		exit();
	}
	$name=addslashes($_POST['name']);
	$image=$_FILES['image'];
	$price=addslashes($_POST['price']);
	$description=addslashes($_POST['description']);
	$manufacturer_id=addslashes($_POST['manufacturer_id']);
	$type_names=explode(',', $_POST['type_names']);

	//tạo 1 folder rồi đưa ảnh đến folder ảnh
	$folder='photos/';
	$file_tail=explode('.', $image['name'])[1];//lấy đuôi .png
	//$path_file=$folder.basename($image["name"]);
	$file_name=time().'.'.$file_tail;//nối thành 1 chuỗi .png theo thời gian
	$path_file=$folder.$file_name;

	move_uploaded_file($image["tmp_name"], $path_file);

	include '../connect.php';
	$sql="insert into products(name,image,price,description,manufacturer_id) values ('$name','$file_name','$price','$description','$manufacturer_id')";

	mysqli_query($connect,$sql);
	$product_id=mysqli_insert_id($connect);
	foreach ($type_names as $type_name) {
		$sql="select * from type where name='$type_name'";
		$result=mysqli_query($connect,$sql);
		$type=mysqli_fetch_array($result);
		if(empty($type)){
			$sql="insert into type(name) values ('$type_name')";
			mysqli_query($connect,$sql);
			$type_id=mysqli_insert_id($connect);
		}else{
			$type_id=$type['id'];
		}


		$sql="insert into product_type values ('$product_id','$type_id')";
		mysqli_query($connect,$sql);
	}
	mysqli_close($connect);
	header('location:index.php?success=Thêm thành công');