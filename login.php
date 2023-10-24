<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Montserrat:wght@300&family=Over+the+Rainbow&display=swap" rel="stylesheet">

    <!--STYLE-->
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body style="height: 100vh;" class="body3">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <main class="main2">
        <h2>Connecte-toi</h2>

        <div class="bloc">
            <form action="loginForm.php" method="POST">
                <input type="mail" class="input" name="mail" placeholder="Email">
                <input type="password" class="input" name="password" placeholder="Mot de passe">
        </div>
        <div class="actions">
            <input type="submit" class="submit" value="Connexion">
        </div>
        </form>

        <h2>Tu n'as pas de compte ?</h2>

        <a href="users.php" class="submit">Créer un compte</a>
    </main>
</body>

</html>