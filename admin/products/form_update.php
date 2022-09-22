<?php 
	require '../check_login_admin.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		include '../connect.php';
		include '../menu.php';
		$id=$_GET['id'];
		$sql="select * from products where id='$id'";
		$result=mysqli_query($connect,$sql);
		$each=mysqli_fetch_array($result);

		$sql="select * from manufacturers";
		$manufacturers=mysqli_query($connect,$sql);

		$sql="select * from type";
		$type_ids=mysqli_query($connect,$sql);
		mysqli_close($connect);
	 ?>
	 <form method="post" action="process_update.php" enctype="multipart/form-data">
	 <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	 Tên
	<input type="text" name="name" value="<?php echo $each['name'] ?>">
	<br>
	Đổi ảnh
	<input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
	<input type="file" name="image_new" value="<?php echo $each['image'] ?>">
	<br>
	Hoặc giữ Ảnh cũ
	<br>
	<img src="photos/<?php echo $each['image'] ?>" height="100">
	Giá
	<input type="number" name="price" value="<?php echo $each['price'] ?>">
	<br>
	Mô tả
	<textarea name="description"><?php echo $each['description'] ?></textarea>
	<br>
	Nhà sản xuất
	<select name="manufacturer_id">
		<?php foreach ($manufacturers as $manufacturer): ?>
		<option value="<?php echo $manufacturer['id']; ?>" 
			<?php if($each['manufacturer_id']==$manufacturer['id']) {?>
				selected
			<?php } ?>
			>
			<?php echo $manufacturer['name']; ?>
		</option>
		<?php endforeach ?>
	</select>
	<br>
	Thể loại
		<select name="type_id[]" multiple>
			<?php foreach ($type_ids as $each): ?>
				<option value="<?php echo $each['id']; ?>">
					<?php echo $each['name']; ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
	<button>Sửa</button>
	 </form>
</body>
</html>