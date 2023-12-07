<?php
require_once('app/bootstrap.php');

// Ta hand om värdena från formuläret
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (getUserByUsername($username)) {
    redirectWithMessage("index.php", "Användarnamnet $username är upptaget. Välj ett annat.");
} else {
    createUser($username, $password, $email);
    redirectWithMessage("index.php", "Konto skapat. Välkommen att logga in!");    
}


?>