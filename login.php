<?php

require_once('app/bootstrap.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = getUserByUsername($username);

if (login($username, $password)) {
    redirectWithMessage("members.php", "Välkommen " . $username . "!");
} else {
    redirectWithMessage("index.php", "Fel användarnamn eller lösenord. Var god och försök igen.");
}

?>