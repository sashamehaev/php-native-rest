<?php
    header('Content-type: application/json');
    require 'connect.php';
    require 'functions.php';

    $method = $_SERVER['REQUEST_METHOD'];

    $q = $_GET['q'];
    $params = explode('/', $q);

    $type = $params[0];
    $id = $params[1];

    if($method === 'GET') {
        if($type === 'posts') {
            if(isset($id)) {
                getPost($connect, $id);
            } else {
                getPosts($connect);
            }
        }
    }





