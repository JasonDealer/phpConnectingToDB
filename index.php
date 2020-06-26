<?php
    $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'test_db');
    if ($connection == false) {
        echo 'Не удалось подключиться к БД';
        exit();
    }

    $result = mysqli_query($connection, "SELECT * FROM `articles_categories`");

    if( mysqli_num_rows($result) == 0 ) {
        echo 'Категорий не найдено';
    } else {?>
        <ul>
            <?php
                while(($cat = mysqli_fetch_assoc($result))) {
                        $articles_count = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = " . $cat['id']);
                        echo '<li>' . $cat['title'] . ' ('. mysqli_num_rows($articles_count) .')</li>';
                    }
            ?>
        </ul>
        <?php 
    }?>

<?php
    mysqli_close($connection);
?>