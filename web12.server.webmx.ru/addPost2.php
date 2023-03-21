<?php
	require_once 'conf.php';
	$new_post = $dbh->prepare("INSERT INTO blog (title, author, text, category, dateCreation) VALUES(:title, :author, :text, :category, :dateCreation)");
	$dateNow =  date("y-m-d");
	$new_post->bindParam(':title', $title);
	$new_post->bindParam(':author', $author);
	$new_post->bindParam(':text', $text);
	$new_post->bindParam(':category', $category);
	$new_post->bindParam(':dateCreation', $dateNow);

	$title = $_POST['title'];
	$author = $_POST['author'];
	$text = $_POST['text'];
	$category = $_POST['category'];
	$dateCreation = date("y-m-d");
	
	$new_post->execute();	

	$new_post = null;
	$dbh = null;
	header("Location: index.php");
?>