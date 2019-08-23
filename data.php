<?php
    require_once('config/db.php');

    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

    mysqli_set_charset($link, 'utf8');

    $is_auth = rand(0, 1);

    $user_name = 'Андрей';

    $title = 'Главная';

    /*$categories = [
        'Доски и лыжи',
        'Крепления',
        'Ботинки',
        'Одежда',
        'Инструменты',
        'Разное'
    ];*/

    // Вывел категории из базы данных!
    $categories_sql = "SELECT `name`, `code` FROM category";
    $categories_result = mysqli_query($link, $categories_sql);
    $categories = mysqli_fetch_all($categories_result, MYSQLI_ASSOC);

    /*$lots = [
        [
            'name' => '2014 Rossignol District Snowboard',
            'category' => 'Доски и лыжи',
            'price' => '10999',
            'img_url' => 'img/lot-1.jpg',
            'last_date' => '2019-10-10 15:00',
        ],
        [
            'name' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => 'Доски и лыжи',
            'price' => '159999',
            'img_url' => 'img/lot-2.jpg',
            'last_date' => '2019-10-15',
        ],
        [
            'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => 'Крепления',
            'price' => '8000',
            'img_url' => 'img/lot-3.jpg',
            'last_date' => '2019-10-10 14:40',
        ],
        [
            'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => 'Ботинки',
            'price' => '10999',
            'img_url' => 'img/lot-4.jpg',
            'last_date' => '2019-10-13',
        ],
        [
            'name' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => 'Одежда',
            'price' => '7500',
            'img_url' => 'img/lot-5.jpg',
            'last_date' => '2019-10-21',
        ],
        [
            'name' => 'Маска Oakley Canopy',
            'category' => 'Разное',
            'price' => '5400',
            'img_url' => 'img/lot-6.jpg',
            'last_date' => '2019-10-31',
        ]
    ];*/
    $lots_sql = "SELECT lot.`title` AS `name`, lot.`initial_rate` AS `price`, lot.`image` AS `img_url`, lot.`date_close` AS `last_date`, category.`name` AS `category` FROM `lot` "
        . "JOIN `category` ON category.`id` = lot.`category_id` "
        . "WHERE lot.`date_close` > NOW() "
        . "GROUP BY lot.`id` "
        . "ORDER BY lot.`date_add` ASC";
    $lots_result = mysqli_query($link, $lots_sql);
    $lots = mysqli_fetch_all($lots_result, MYSQLI_ASSOC);
    print("<pre>");
    var_dump($lots);
    print("</pre>");