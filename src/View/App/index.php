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
                        <a class="nav-link" href="user/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/register">Register</a>
                    </li>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/">Home User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/read">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/update">Update acount</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet_perso/w2php502p1/user/delete">Delete acount</a>
                    </li>
                </ul>
                <a class="nav-link btn btn-secondary" href="/projet_perso/w2php502p1/user/deconnect">Disconnect</a>
                <?php endif; ?>
            </div>
        </nav>
        <main class="container mt-5">
            <h1>My Cinema - Home</h1>
            <section class="container m-5"  style="height: 100px;">
                <h3 class="mt-4">Films de la semaine</h3>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="webroot/assets/img/captainMarvel.jpeg" alt="Captain Marvel">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="webroot/assets/img/dragons3.jpeg" alt="Dragons 3">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="webroot/assets/img/venom.jpg" alt="Venom">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </section>
        </main>
        <script src="webroot/js/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>