<?php
	require_once 'conf.php';
	$new_post = $dbh->prepare("INSERT INTO categories (categoryName) VALUES(:categoryName)");
	$new_post->bindParam(':categoryName',$categoryName);

	if($_POST['categoryName']!="")
	{
		$categoryName = $_POST['categoryName'];
		$new_post->execute();
	}
	else
	{
		die();
	}

	$new_post = null;
	$dbh = null;
	header("Location: addPost2.php");
?>