<?php

/**
 * Redirect if not logged in
 *
 * @return void
 */
function requireLogin() {
    if ( ! isLoggedIn()) {
        redirectWithMessage("index.php", "Du måste vara inloggad för att ta del av medlemssidorna.");
    }
}


/**
 * Check if user is logged in
 *
 * @return boolean
 */
function isLoggedIn() {
    return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE;
}


/**
 * Check credentials for login
 *
 * @param  string  $username
 * @param  string  $password
 * @return bool
 */
function login($username, $password) {
    $user = getUserByUsername($username);

    // Check if user exist
    if ( ! $user) {
        return FALSE;
    }

    $hashedPassword = $user['password'];    

    // Check if password match
    if ( ! password_verify($password, $hashedPassword)) {
        return FALSE;
    }

    // If password match - log in user
    loginUser($user['id']);
    return TRUE;
}

/**
 * Get id of logged in user
 *
 * @return int
 */
function getUserId() {
    return $_SESSION['userId'];
}

/**
 * Logs in a user
 *
 * @param  int  $id
 * @return void
 */
function loginUser($id) {
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['userId'] = $id;
}

/**
 * Logs out user
 *
 * @return void
 */
function logout() {
    unset($_SESSION['loggedIn']);
    unset($_SESSION['userId']);
}