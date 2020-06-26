<?php
    $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'test_db');
    if ($connection == false) {
        echo 'Не удалось подключиться к БД';
        exit();
    }

    $result = mysqli_query($connection, "SELECT * FROM `articles_categories`");
?>

<ul>
    <?php
        while(($cat = mysqli_fetch_assoc($result)))
        {
            echo '<li>' . $cat['title'] . '</li>';
        }
    ?>
</ul>