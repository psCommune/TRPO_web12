<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Удаляем из бд</title>
</head>
<body>
	<?php
		$post_select = $_POST['post_select'];
		require_once 'conf.php';
        $rows = $dbh->query("DELETE from blog WHERE id = $post_select");
		header("Location: index.php");
	?>
</body>
</html>