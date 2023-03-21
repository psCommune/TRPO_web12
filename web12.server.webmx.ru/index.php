<!DOCTYPE html>
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
            }

            .post {
                float: left;
                width: 420px;
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div>
            <form action="menu.php" method="post">
                <select name="category_select" required>
                    <?php
                        require_once 'conf.php';
                        $rows = $dbh->query("select * from categories");

                        foreach($rows as $row) {
                           echo "<option value='".$row['id']."'>".$row['categoryName']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Сортировка">
            </form>   
        </div>
        <div class="container">
            <h1>Личный блог Иванова И.И.</h1>
            <?php
                require_once 'conf.php';
                //$rows = $dbh->query("select * from blog");
                $rows = $dbh->query("select * from blog join categories on blog.category = categories.id");

                foreach($rows as $row) {
                    // print_r($row);
                    echo "<div class='post'><h2>" . $row['title'] . "</h2>";        
                    echo "<p><i>" . $row['author'] . "</i></p>";
                    echo "<p><i>" .$row['categoryName']. "</i></p>";
                    echo "<hr><p>" . substr($row['text'], 0,100) . "</p>";
                    echo "<p>" .$row['dateCreation']. "</p>";
                    echo"<a href='post.php?id=" . $row['0'] . "'>Читать подробнее</a></div>";
                }
                $dbh = null;
            ?>
        </div>
    </body>
</html>