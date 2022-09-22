<?php 
	require '../check_login_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		tr{
			text-align: center;
		}
	</style>
</head>
<body>
<?php 
	$order_id=$_GET['id'];
  	require '../connect.php';
  	$sql="select * from order_product join products on products.id=order_product.product_id where order_id='$order_id'";
  	$result=mysqli_query($connect,$sql);
  	$sum_price=0;
?>
<table border="1" width="100%">
	 	<tr>
	 		<th>
	 			Ảnh
	 		</th>
	 		<th>
	 			Tên sản phẩm
	 		</th>
	 		<th>
	 			Giá
	 		</th>
	 		<th>
	 			Số lượng
	 		</th>
	 		<th>
	 			Tổng tiền
	 		</th>
	 	</tr>
	 	<?php foreach ($result as $each):?>
	 		<tr>
	 			<td>
	 				<img src="../products/photos/<?php echo $each['image'] ?>" height='100'>
	 			</td>
	 			<td>
	 				<?php echo $each['name'] ?>
	 			</td>
	 			<td>
	 				<?php echo $each['price'] ?>
	 			</td>
	 			<td>
	 				<?php echo $each['quantity'] ?>
	 			</td>
	 			<td>
	 				<?php 
	 					echo $each['quantity']*$each['price'];
	 					$sum_price+=$each['quantity']*$each['price'];
	 				?>
	 			</td>
	 		</tr>
	 	<?php endforeach ?>
</table>
<br>
<h1>Tổng tiền đơn này là : <?php echo $sum_price; ?> </h1>
</body>
</html>
