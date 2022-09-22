<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form>
		Điền jk đó đi
		<input type="text" name="ten" id="ten">
	</form>
	<div id="ket_qua"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#ten').change(function(event) {
				let ten=$(this).val();
				$("#ket_qua").text('Bạn đã điền: '+ten)
			});
		});
	</script>
</body>
</html>