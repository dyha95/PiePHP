<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv ="X-UA-Compatible" content="IE=edge">
        <title>PiePHP - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <?php endif;?>
                </ul>
            </div>
        </nav>
        <main class="container mt-5">
            <h1>Register</h1>
            <form action="" method="post">
        
            <div class="form-group">
                <label for ="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
                <input type="submit" class="btn btn-primary" value="send">
            </form>
        </main>
    </body>
</html>