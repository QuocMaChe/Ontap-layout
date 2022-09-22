<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		td{
			text-align: center;
		}
		img{
			height: 100px;
		}
	</style>
</head>
<body>
	<?php 
		session_start();
		include 'admin/connect.php';
		$sum_price=0;
		$total=0;
	 ?>
	<?php if(isset($_GET['success'])){ unset($_SESSION['cart']);?>
		<script type="text/javascript">
			alert("Thanh toán thành công");
		</script>
	<?php } ?>
	 <?php if(empty($_SESSION['cart'])){?>
	 	Giỏ hàng trống. <a href="index.php"> Quay lại trang chủ</a>
	 <?php }else{ ?>
	 	<?php 
		 	$cart=$_SESSION['cart'];
	 	?>
	 	<table border="1" width="100%" >
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
	 		<th>
	 			Xóa
	 		</th>
	 	</tr>
	 	<?php foreach ($cart as $id => $each):?>
	 		<?php if($each['name']!=''||$each['quantity']!=''||$each['price']!=''){ ?>
	 			<tr>
		 			<td>
		 				<img src="admin/products/photos/<?php echo $each['image'] ?>">
		 			</td>
		 			<td>
		 				<?php echo $each['name'] ?>
		 			</td>
		 			<td>
		 				<span class="span-price">
		 					<?php echo $each['price'] ?>
		 				</span>
		 			</td>
		 			<td>
		 				<button class="btn-update-quantity" 
		 				data-id='<?php echo $id ?>' 
		 				data-type='0'>
		 				-
		 				</button>
		 				<span class="span-quantity">
		 					<?php echo $each['quantity'] ?>
		 				</span>
		 				<button class="btn-update-quantity" 
		 				data-id='<?php echo $id ?>' 
		 				data-type='1'>
		 				+
		 				</button>
		 			</td>
		 			<td>
		 				<span class="span-sum">
		 					<?php 
		 						$total= $each['quantity']*$each['price'];
		 						$sum_price+=$total;
		 						echo $total;
		 					?>
		 				</span>
		 			</td>
		 			<td>
		 				<button class="btn-delete" data-id='<?php echo $id ?>'>
		 					X
		 				</button>
		 			</td>
	 			</tr>
	 		<?php } ?>
	 	<?php endforeach ?>
	 </table>
	 	<a href="index.php"> Quay lại trang chủ</a>
	 	<h1 >Tổng tiền hóa đơn: 
	 		<span id="total-price">
	 			<?php echo $sum_price; ?>
	 		</span> 
	 		VNĐ.			
	 	</h1>
	 <?php } ?>
	 <?php if($sum_price>0){ ?>
	 	<?php 
	 		include 'admin/connect.php';
	 		$id=$_SESSION['id'];
	 		$sql="select * from users where id='$id'";
	 		$result=mysqli_query($connect,$sql);
	 		$each=mysqli_fetch_array($result);
	 	 ?>
	 	<form method="post" action="process_checkout.php">
	 		<br>
	 		Tên người nhận
	 		<input type="text" name="name_receiver" value="<?php echo $each['name'] ?>">
	 		<br>
	 		Số điện thoại người nhận
	 		<input type="number" name="phone_receiver" value="<?php echo $each['phone_number'] ?>">
	 		<br>
	 		Địa chỉ người nhận
	 		<input type="text" name="address_receiver" value="<?php echo $each['address'] ?>">
	 		<br>
	 		<button>Đặt hàng</button>
	 	</form>
	 <?php } 
	 	mysqli_close($connect);
	 ?>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 <script type="text/javascript">
	 	$(document).ready(function() {
	 		$('.btn-update-quantity').click(function(event) {
	 			let btn=$(this);
	 			let id=btn.data('id');
	 			let type=parseInt(btn.data('type'));
	 			$.ajax({
	 			url: 'update_quantity_in_cart.php',
	 			type: 'GET',
	 			data: {id, type},
		 		})
		 		.done(function() {
		 			let parent_tr=btn.parents('tr')
		 			let price=parent_tr.find('.span-price').text();
		 			let quantity=parent_tr.find('.span-quantity').text();
		 			if(type==1){
		 				quantity++;
		 			}
		 			else{
		 				quantity--;

		 			}
		 			if(quantity==0){
		 				parent_tr.remove();
		 			}
		 			else{
		 				parent_tr.find('.span-quantity').text(quantity);
		 				let sum=price*quantity;
			 			parent_tr.find('.span-sum').text(sum);
		 			}
		 			get_total();
		 		})
	 		});	
	 		$('.btn-delete').click(function(event) {
	 			let btn=$(this);
	 			let id=btn.data('id');
	 			$.ajax({
	 				url: 'delete_from_cart.php',
	 				type: 'GET',
	 				data: {id},
	 			})
	 			.done(function() {
	 				btn.parents('tr').remove();
	 				get_total();
	 			})	
	 		}); 		
	 	});
	 	function get_total(){
	 		let total=0;
		 	$('.span-sum').each(function(){
		 		total+=parseFloat($(this).text());
		 	});
		 	$('#total-price').text(total);
	 	}
	 </script>
</body>
</html>