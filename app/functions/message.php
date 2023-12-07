<?php

/**
 * Redirects to URL with message in session variable
 *
 * @param  string $url
 * @param  string $message
 * @return void
 */
function redirectWithMessage(string $url, string $message) {
    setMessage($message);
    header('Location: ' . $url);
}

/**
 * Checks if there is a message
 *
 * @return boolean
 */
function hasMessage() {
    return isset($_SESSION['message']);
}

/**
 * Returns message and deletes it
 *
 * @return string
 */
function getMessage() {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
    return $message;
}

/**
 * Puts a message in session variable
 *
 * @param  string  $message
 * @return void
 */
function setMessage(string $message) {
    $_SESSION['message'] = $message;
}
