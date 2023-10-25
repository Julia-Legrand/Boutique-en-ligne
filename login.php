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

    <!--STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body class="bodyAdmin">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <main class="mainLogin">
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

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>