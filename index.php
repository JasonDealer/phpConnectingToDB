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
                        $articles_count = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `categorie_id` = " . $cat['id']);
                        $articles_count_res = mysqli_fetch_assoc($articles_count);
                        echo '<li>' . $cat['title'] . ' ('. $articles_count_res['total_count'] .')</li>';
                    }
            ?>
        </ul>
        <?php 
    }?>

<?php
    mysqli_close($connection);
?>