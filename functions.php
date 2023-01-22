<?php

function getPosts($connect) {
    $posts = mysqli_query($connect, "SELECT * FROM `posts`");
    $postsList = [];
    while($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    print_r(json_encode($postsList));
}

function getPost($connect, $id) {
    $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id`='$id' ");

    if(mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "post not found"
        ];

        print_r(json_encode($res));
    } else {
        $post = mysqli_fetch_assoc($post);
        print_r(json_encode($post));
    }
}
function addPost($connect, $data) {
    $title = $data['title'];
    $body = $data['body'];

    mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body')");

    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

    print_r(json_encode($res));
}