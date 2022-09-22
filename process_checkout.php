<?php  

$name_receiver=$_POST['name_receiver'];
$phone_receiver=$_POST['phone_receiver'];
$address_receiver=$_POST['address_receiver'];
include 'admin/connect.php';

session_start();
$cart=$_SESSION['cart'];
$total_price=0;
foreach ($cart as $each) {
	$total_price+=$each['quantity']*$each['price'];
}

$status=0;
$customer_id=$_SESSION['id'];
$sql="insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,status,total_price) values ('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$status','$total_price')";
$result=mysqli_query($connect,$sql);

$sql="select max(id) from orders where customer_id='$customer_id'";
$result=mysqli_query($connect,$sql);
$order_id=mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $product_id => $each) {
	$quantity=$each['quantity'];
	$sql="insert into order_product(order_id,product_id,quantity) values ('$order_id','$product_id','$quantity')";
	$result=mysqli_query($connect,$sql);
}
header('location:view_cart.php?success=Thanh toán thành công');