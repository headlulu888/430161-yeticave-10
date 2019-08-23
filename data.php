<?php
    require_once('config/db.php');

    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

    mysqli_set_charset($link, 'utf8');

    $is_auth = rand(0, 1);

    $user_name = 'Андрей';

    $title = 'Главная';

    // Вывел категории из базы данных!
    $categories_sql = "SELECT `name`, `code` FROM category";
    $categories_result = mysqli_query($link, $categories_sql);
    $categories = mysqli_fetch_all($categories_result, MYSQLI_ASSOC);

    // Вывел лоты из базы данных!
    $lots_sql = "SELECT lot.`title` AS `name`, lot.`initial_rate` AS `price`, lot.`image` AS `img_url`, lot.`date_close` AS `last_date`, category.`name` AS `category` FROM `lot` "
        . "JOIN `category` ON category.`id` = lot.`category_id` "
        . "WHERE lot.`date_close` > NOW() "
        . "GROUP BY lot.`id` "
        . "ORDER BY lot.`date_add` ASC";
    $lots_result = mysqli_query($link, $lots_sql);
    $lots = mysqli_fetch_all($lots_result, MYSQLI_ASSOC);