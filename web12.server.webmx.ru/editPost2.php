<?php
	// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    if (!isset($_GET['id'])) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        exit;
    }
    if($_POST['title']!="" && $_POST['author']!="" && $_POST['text']!="")
	{
		require_once 'conf.php';

		$edit_post = $dbh->prepare("UPDATE blog SET title=:title, author=:author, text=:text, category=:category, dateCreation=:dateCreation WHERE id=:id");
		$edit_post->bindParam(':title', $title);
		$edit_post->bindParam(':author', $author);
		$edit_post->bindParam(':text', $text);
		$edit_post->bindParam(':category', $category);
		$edit_post->bindParam(':dateCreation', $dateCreation);
	    $edit_post->bindParam(':id', $id);
		
		$title = $_POST['title'];
		$author = $_POST['author'];
		$text = $_POST['text'];
		$category = $_POST['category'];
		$dateCreation = date("y-m-d");
		$id = $_GET[id];
		$edit_post->execute();	

		$edit_post = null;
		$dbh = null;
		
		header("Location: index.php");
	}
	else
	{
		header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
        exit;
	} 
?>