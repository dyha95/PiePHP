<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv ="X-UA-Compatible" content="IE=edge">
        <title>Profile - MyCinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/projet_perso/w2php502p1/">My Cinema</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                <?php if(empty($_SESSION['id'])):  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register">Register</a>
                    </li>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/">Home User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update">Update acount</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete">Delete acount</a>
                    </li>
                </ul>
                <a class="nav-link btn btn-secondary" href="deconnect">Disconnect</a>
                <?php endif; ?>
            </div>
        </nav>
        <main class="container m-5">
            <h1>Profil User </h1>
            <section class="m-3 ">
                <h3>Informaition</h3>

                <p>Email : <?php echo $email ?> </p>
                <p>Password: <?php echo $password; ?> </p>
            </section>
        </main>
    </body>
</html>