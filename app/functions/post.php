<?php

/**
 * Get all posts
 *
 * @return array
 */
function getAllPosts() {
    $db = connectToDb();
    $result = $db->query("SELECT * FROM posts");
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
}

/**
 * Get the latests posts
 *
 * @param  integer  $nr  Number of posts 
 * @return array
 */
function getLatestPosts(int $nr = 10) {
    $db = connectToDb();
    $result = $db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT $nr");
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
}

/**
 * Get post by id
 *
 * @param  integer  $id
 * @return array
 */
function getPostById(int $id) {
    $db = connectToDb();
    $statement = $db->prepare("SELECT * FROM posts WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    $post = $result->fetch_assoc();
    return $post;    
}

/**
 * Creates a post
 *
 * @param  string  $title
 * @param  string  $content
 * @param  integer $userId
 * @return void
 */
function createPost(string $title, string $content, int $userId) {
    $db = connectToDb();
    $statement = $db->prepare("INSERT INTO posts (title, content, author) VALUES (?, ?, ?)");
    $statement->bind_param("ssi", $title, $content, $userId);
    $statement->execute();
    return $db->insert_id;
}

function updatePost(int $id, string $title, string $content) {
    $db = connectToDb();
    $statement = $db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?)");
    $statement->bind_param("ssi", $title, $content, $id);
    $statement->execute();
}

function deletePost(int $id) {
    $db = connectToDb();
    $statement = $db->prepare("DELETE FROM posts WHERE id = ?)");
    $statement->bind_param("i", $id);
    $statement->execute();
}