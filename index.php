<?php

    require 'connect.php';
    require 'functions.php';

    header('Content-type: application/json');

    $type = $_GET['q'];

    if($type === 'posts') {
        getPosts($connect);
    }

