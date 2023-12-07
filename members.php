<?php 

    require_once('app/bootstrap.php');
    requireLogin();

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <?php
            if (hasMessage()) {
                echo '<p class="message">' . getMessage() . '</p>';
            }
        ?>        
        <h1>Medlemssidorna</h1>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>


</body>
</html>