<?php 
	require '../check_login_admin.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
</head>
<body>
	<?php 

		include '../connect.php';
		include '../menu.php';
		$sql="select * from manufacturers";
		$result_manufacturers=mysqli_query($connect,$sql);
		mysqli_close($connect);
	 ?>
	 <form method="post" action="process_insert.php" enctype="multipart/form-data">
		 Tên
		<input type="text" name="name">
		<br>
		Ảnh
		<input type="file" name="image">
		<br>
		Giá
		<input type="number" name="price">
		<br>
		Mô tả
		<textarea name="description"></textarea>
		<br>
		Nhà sản xuất
		<select name="manufacturer_id">
			<?php foreach ($result_manufacturers as $each): ?>
				<option value="<?php echo $each['id']; ?>">
					<?php echo $each['name']; ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
		Thể loại
		<input type="text" name="type_names[]" id="type">
		<br>
		<button>Thêm</button>
	 </form>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 <script type="text/javascript" src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
	 <script type="text/javascript" src="typeahead.bundle.js"></script>
	 <script type="text/javascript">
	 	$(document).ready(function() {
	 		$("form").keypress(function(event) {
	 			if(event.keyCode==13){
	 				event.preventDefault();
	 			}
	 		});
	 		var types = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  remote: {
			    url: 'list_type.php?q=%QUERY',
			    wildcard:'%QUERY'
			  }
			});

			//types.initialize();

			$('#type').tagsinput({
			  typeaheadjs: {
			    displayKey: 'name',
			    valueKey: 'name',
			    source: types
			  },
			  freeInput:true
			});
	 	});
	 </script>
</body>
</html>