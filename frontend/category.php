<?php
require_once ('../db/dbhelper.php');
$id = '';
if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category Page - <?=$name?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center"><?=$name?></h2>
			</div>
			<div class="panel-body">
				<div class="row">
<?php
$sql         = 'select product.id, product.title, product.price, product.thumbnail, product.updated_at, category.name category_name from product left join category on product.id_category = category.id where category.id = '.$id;
$productList = executeResult($sql);

foreach ($productList as $item) {
	echo '<div class="col-lg-3">
				<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%"></a>
				<a href="detail.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
				<p style="color: red; font-weight: bold;">'.$item['price'].'</p>
			</div>';
}
?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>