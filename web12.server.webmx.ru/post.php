<?php
	if (!isset($_GET['id'])) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        exit;
    }

    require_once 'conf.php';
	
    $post = $dbh->prepare("SELECT * FROM blog WHERE id=:id");
	
    $post->bindParam(':id', $id);

	$id = $_GET[id];
	$post->execute();
    $result = $post->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        exit;
    }
?>
<html>
    <head>
        <title>Личный блог</title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: Arial;
            }
            .container {
                width: 1000px;
                margin: 0 auto;
                padding: 20px;
            }
            .post-footer > p {
                display: inline-block;
                margin: 20px;
                font-style: italic;
            }
            .div-notdisplay > select {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <form action="index.php" method="post" >
            <input type="submit" name="submit" value="На главную">
        </form>
        <form action="menu.php?" method="post">
            <div class="div-notdisplay">
                <select name="category_select">
                    <option value="<?= $result['category'] ?>"></option>
                </select>    
            </div>
            <input type="submit" name="submit" value="На рубрику">
        </form> 
        <form action="editPost.php?id=<?= $result['id'] ?>" method="post">
            <input type="submit" name="submit" value="Редактировать">
        </form>
        <form action="remove.php" method="post">
            <div class="div-notdisplay">
                <select name="post_select">
                    <option value="<?= $result['id'] ?>"></option>
                </select>    
            </div>
            <input type="submit" name="submit" value="Удалить">
        </form>
        </div>
        <div class="container">
            <h1>Личный блог Иванова И.И.</h1>
            <h2><?= $result['title'] ?></h2>
            <p><?= $result['text'] ?></p>
            <hr>
            <div class="post-footer">
                <p><?= $result['dateCreation'] ?></p>
                <p><?= $result['author'] ?></p>
                <p><?= $result['category'] ?></p>
            </div>
        </div>
    </body>
</html>