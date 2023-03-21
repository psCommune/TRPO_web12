<!DOCTYPE html>
<html>
<head>
 	<title>Меню рубрик</title>
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
        .post {
            float: left;
            width: 420px;
            margin: 20px;
        }
    </style>
</head>
<body>
	<form action="index.php" method="post" >
            <input type="submit" name="submit" value="На главную">
        </form>
	<div class="container">
        <?php
            require_once 'conf.php';
            $rows = $dbh->query("select * from blog");
            $post_count = 0;
            $category_select = $_POST['category_select'];
            foreach($rows as $row) {
            	if ($row['category']==$category_select) {
            		echo "<div class='post'><h2>" . $row['title'] . "</h2>";        
	                echo "<p><i>" . $row['author'] . "</i></p>";
	                echo "<p><i>" .$row['category']. "</i></p>";
	                echo "<hr><p>" . substr($row['text'], 0,100) . "</p>";
	                echo "<p>" .$row['dateCreation']. "</p>";
	                echo"<a href='post.php?id=" . $row['id'] . "'>Читать подробнее</a></div>";	
	                $post_count++;
            	}
            }
            $dbh = null;
            if (post_count<1){
            	echo "В рубрике нет постов";
            	// header($_SERVER["SERVER_PROTOCOL"]."404 Not Found");
        		// exit;
            }
        ?>
    </div>
</body>
</html>