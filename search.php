<?php  
//$search=$_GET['term'];
$search='Iphone';
require 'admin/connect.php';
$sql="select * from products where name like '%$search%'";
$result=mysqli_query($connect,$sql);

$arr=[];
foreach ($result as $each) {
	$arr[]=[
		'label'=>$each['name'],
		'value'=>$each['id'],
		'image'=>$each['image'],
	];
}
/*$i=0;
foreach ($result as $each) {
	$arr[$each['id']][]=[
		'label'=>$each['name'],
		'value'=>$each['id'],
		'image'=>$each['image'],
	];
	$i++;
}*/
echo json_encode($arr);