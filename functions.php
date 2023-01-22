<?php

function getPosts($connect) {
    $posts = mysqli_query($connect, "SELECT * FROM `posts`");
    $postsList = [];
    while($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    print_r(json_encode($postsList));
}