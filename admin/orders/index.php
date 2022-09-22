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
  	require '../connect.php';
  	$sql="select orders.*,users.name,users.phone_number,users.address from orders join users on users.id=orders.customer_id";
  	$result=mysqli_query($connect,$sql);
?>
<table border="1" width='100%'>
	<tr>
		<th>
			Mã
		</th>
		<th>
			Thời gian đặt hàng
		</th>
		<th>
			Thông tin người nhận
		</th>
		<th>
			Thông tin người đặt
		</th>
		<th>
			Trạng thái
		</th>
		<th>
			Tổng tiền
		</th>
		<th>
			Xem
		</th>
		<th>
			Sửa
		</th>
	</tr>
	<?php foreach ($result as $each ): ?>
		<tr>
			<td>
			<?php echo $each['id']; ?>
		</td>
		<td>
			<?php echo $each['created_at']; ?>
		</td>
		<td>
			<?php echo $each['name_receiver']; ?>
			<?php echo $each['phone_receiver']; ?>
			<?php echo $each['address_receiver']; ?>
		</td>
		<td>
			<?php echo $each['name']; ?>
			<?php echo $each['phone_number']; ?>
			<?php echo $each['address']; ?>
		</td>
		<td>
			<?php 
				switch ($each['status']) {
					case '0':
						echo "Mới đặt";
						break;
					case '1':
						echo "Đã duyệt";
						break;
					default:
						echo "Đã hủy";
						break;
				}
			 ?>
		</td>
		<td>
			<?php echo $each['total_price']; ?>
		</td>
		<td>
			<a href="detail.php?id=<?php echo $each['id']; ?>">Xem chi tiết</a>
		</td>
		<td>
			<?php if($each['status']==0){?>
					<a href="update.php?id=<?php echo $each['id']; ?>&status=1">Duyệt</a>
					<a href="update.php?id=<?php echo $each['id']; ?>&status=2">Hủy</a>
			<?php }else{
				echo " ";
			} ?>
		</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>