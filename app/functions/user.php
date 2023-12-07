<?php

/**
 * Saves a new user to the database
 *
 * @param  string  $username
 * @param  string  $password
 * @param  string  $email
 * @return int  id
 */
function createUser(string $username, string $password, string $email) {
    $db = connectToDb();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $username, $hashedPassword, $email);
    $statement->execute();
    return $db->insert_id;
}

/**
 * Get all users
 *
 * @return array
 */
function getAllUsers() {
    $db = connectToDb();
    $result = $db->query("SELECT * FROM users");
    $users = $result->fetch_all(MYSQLI_ASSOC);
    return $users;
}

/**
 * Get a user based on username
 *
 * @param  string  $username
 * @return array  Userdata
 */
function getUserByUsername(string $username) {
    $db = connectToDb();
    $statement = $db->prepare("SELECT * FROM users WHERE username = ?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();
    return $user;
}

/**
 * Get user from id
 *
 * @param  integer  $id
 * @return array
 */
function getUserById(int $id) {
    $db = connectToDb();
    $statement = $db->prepare("SELECT * FROM users WHERE id = ?");
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();
    return $user;
}
