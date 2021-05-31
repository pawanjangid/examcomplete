<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php $page_title; ?></title>
	<?php include 'include_top.php';?>
</head>
<body>
<?php include 'header.php';?>
	<?php include 'pages/'.$page_name.'.php'; ?>

<?php include 'footer.php';?>

</body>
<?php include 'include_bottom.php'; ?>
</html>