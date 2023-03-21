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
            form {
                width:500px;
            }
            form > div > input,textarea,select {
                width: 100%;
            }

            textarea {
                height: 300px;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <form action="index.php" method="post" >
            <input type="submit" name="submit" value="На главную">
        </form>
        </div>
        <form action="editPost2.php?id=<?= $result['id'] ?>" method="post">
            <div>
                <label for="title">Заголовок записи</label><br>
                <input type="text" name="title" placeholder="заголовок" value="<?= $result['title'] ?>" required>
            </div>
            <div>
                <label for="author">Автор записи</label><br>
                <input type="text" name="author" placeholder="автор" value="<?= $result['author'] ?>" required>
            </div>
            <div>
                <label for="category">Рубрика записи</label><br>
                <select name="category" >
                    <?php
                        require_once 'conf.php';
                        $rows = $dbh->query("select * from categories");
                        foreach($rows as $row) {
                           echo "<option value='".$row['id']."'>".$row['categoryName']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="text">Текст записи</label><br>
                <textarea name="text" placeholder="текст" required><?= $result['text'] ?></textarea>
            </div>
            <div>
                <input type="submit" name="submit" value="Редактировать запись">
            </div>
        </form>
    </body>
</html>