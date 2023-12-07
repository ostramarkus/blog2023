<?php

    require_once("app/bootstrap.php");

    login("asdasd", "asdasd");

    var_dump($_SESSION);

    $id = createPost("Test", "Testtext", getUserId());

    $posts = getAllPosts();

    var_dump($posts);


    
?>