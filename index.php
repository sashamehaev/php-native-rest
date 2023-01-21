<?php

    require 'connect.php';

    header('Content-type: application/json');

    $type = $_GET['q'];

    if($type === 'posts') {
        $posts = mysqli_query($connect, "SELECT * FROM `posts`");
        $postsList = [];
        while($post = mysqli_fetch_assoc($posts)) {
            $postsList[] = $post;
        }
        print_r(json_encode($postsList));
    }

