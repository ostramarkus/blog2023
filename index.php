<?php 

    require_once('app/bootstrap.php');
    $posts = getLatestPosts();

?>

<!DOCTYPE html>
<html lang="sb">
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

        <?php
            foreach ($posts as $post):
                $author = getUserById($post['author']);
        ?>
            <article class="post">
                <header class="post-header">
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p><?= htmlspecialchars($author['username']) ?> - <?= htmlspecialchars($post['created_at']) ?></p>
                </header>
                <div class="post-content">
                    <?= htmlspecialchars($post['content']) ?>
                </div>
            </article>
        <?php
            endforeach;
        ?>

        <form action="register.php" method="post">
            <h2>Skapa konto</h2>
            <p><input type="text" name="username" placeholder="Användarnamn"></p>
            <p><input type="password" name="password" placeholder="Lösenord"></p>
            <p><input type="email" name="email" placeholder="E-post"></p>
            <p><input type="submit" value="Skapa konto"></p>
        </form>

        <form action="login.php" method="post">
            <h2>Logga in</h2>
            <p><input type="text" name="username" placeholder="Användarnamn"></p>
            <p><input type="password" name="password" placeholder="Lösenord"></p>
            <p><input type="submit" value="Logga in"></p>
        </form>   
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>


</body>
</html>