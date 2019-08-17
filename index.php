<?php
    require_once('helpers.php');
    require_once('data.php');
    require_once('function.php');

    $content = include_template('main.php', [
        'categories' => $categories,
        'products' => $products
    ]);

    $layout = include_template('layout.php', [
        'content' => $content,
        'title' => $title,
        'user_name' => $user_name,
        'is_auth' => $is_auth
    ]);

    print($layout);
