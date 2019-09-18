<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PiePHP - Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
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
                        <a class="nav-link" href="user/">Home User</a>
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
        <main class="container mt-5">
            <h1>Home User</h1>
        </main>
        <script src="webroot/js/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>