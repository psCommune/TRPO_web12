<!Doctype html>
<html>
    <head>
        <title>Добавить запись в блог</title>
        <meta charset="utf-8">
        <style>
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
    <form method="POST" action="addPost2.php">
        <div>
            <label for="title">Заголовок записи</label><br>
            <input type="text" name="title" placeholder="заголовок" required>
        </div>
        <div>
            <label for="author">Автор записи</label><br>
            <input type="text" name="author" placeholder="автор" required>
        </div>
        <div>
        	<label for="category">Рубрика записи</label><br>
        	<select name="category" required>
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
            <textarea name="text" placeholder="текст" required></textarea>
        </div>
        <div>
            <input type="submit" name="submit" value="Добавить запись">
        </div>
    </form>
    <form method="POST" action="addCategories.php">
        <div>
            <label for="categoryName">Название рубрики</label><br>
            <input type="text" name="categoryName" placeholder="Рубрика" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Добавить рубрику">
        </div>
    </form>
</html>