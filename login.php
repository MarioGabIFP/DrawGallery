<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./res/css/styles.css" rel="stylesheet">
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Fin BootStrap -->
    <title>Draw Gallery</title>
</head>
    <body>
        <?php
            if (isset($_GET['logon'])){
                if ($_GET['logon'] == 0) {
                    echo '
                        <!-- Cabecera bootstrap -->
                        <div class="container">
                            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                    <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
                                </a>
                            </header>
                        </div>
                        <!-- Menú Flexbox -->
                        <nav></nav>
                        <article>
                            <section>
                                <div class="container">
                                    <div class="container w-42">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a id="menu_login" class="nav-link active" aria-current="page" href="#">Iniciar Sesión</a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="menu_register" class="nav-link" href="#">Registrarse</a>
                                            </li>
                                        </ul>
                                        <div id="login" class="border-bottom border-start border-end">
                                            <div class="modal-body">
                                                <form class="container g-3" method="POST" action="./src/post.php?type=login">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="user" class="visually-hidden">Usuario</label>
                                                            <input type="text" class="form-control border border-danger" id="user" name="user" placeholder="Usuario">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="pass" class="visually-hidden">Contraseña</label>
                                                            <input type="password" class="form-control border border-danger" id="pass" name="pass" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="modal-footer">
                                                                <div class="card border border-danger" style="width: 18rem;">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item">Usuario y/o contraseña incorrectos</li>
                                                                    </ul>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="register" class="border-bottom border-start border-end visually-hidden">
                                            <div class="modal-body">
                                                <form class="container g-3" method="POST" action="./src/post.php?type=register">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="nom" class="form-control" type="text" placeholder="Nombre" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="apel" class="form-control" type="text" placeholder="Apellidos" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="user" class="form-control" type="text" placeholder="Usuario" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="pass" class="form-control" type="password" placeholder="Contraseña" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="npass" class="form-control" type="password" placeholder="Repite la contraseña" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="fNacim" class="form-control" type="Date" placeholder="Fecha de nacimiento" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </article>
                    ';
                }
            } else if (isset($_GET['registror'])) {
                echo '
                    <!-- Cabecera bootstrap -->
                    <div class="container">
                        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
                            </a>
                        </header>
                    </div>
                    <!-- Menú Flexbox -->
                    <nav></nav>
                    <article>
                        <section>
                            <div class="container">
                                <div class="container w-42">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a id="menu_login" class="nav-link active" aria-current="page" href="#">Iniciar Sesión</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="menu_register" class="nav-link" href="#">Registrarse</a>
                                        </li>
                                    </ul>
                                    <div id="login" class="border-bottom border-start border-end">
                                        <div class="modal-body">
                                            <form class="container g-3" method="POST" action="./src/post.php?type=login">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="user" class="visually-hidden">Usuario</label>
                                                        <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="pass" class="visually-hidden">Contraseña</label>
                                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="register" class="border-bottom border-start border-end visually-hidden">
                                        <div class="modal-body">
                                            <form class="container g-3" method="POST" action="./src/post.php?type=register">
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="nom" class="form-control" type="text" placeholder="Nombre" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="apel" class="form-control" type="text" placeholder="Apellidos" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="user" class="form-control" type="text" placeholder="Usuario" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>
                                                ';
                if ($_GET['registror'] == 0) {
                    echo '
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="pass" class="form-control border border-danger" type="text" placeholder="Contraseña" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="npass" class="form-control border border-danger" type="text" placeholder="Repite la contraseña" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>';
                }
                echo '
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="fNacim" class="form-control" type="Date" placeholder="Fecha de nacimiento" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <br>';
                if ($_GET['registror'] == 0) {
                    echo '
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="modal-footer">
                                                            <div class="card border border-danger" style="width: 18rem;">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Las contraseñas no coinciden</li>
                                                                </ul>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Registrarse</button>
                                                        </div>
                                                    </div>
                                                </div>';
                }
                echo '
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                    ';
            }else {
                echo '
                        <!-- Cabecera bootstrap -->
                        <div class="container">
                            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                    <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
                                </a>
                            </header>
                        </div>
                        <!-- Menú Flexbox -->
                        <nav></nav>
                        <article>
                            <section>
                                <div class="container">
                                    <div class="container w-42">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a id="menu_login" class="nav-link active" aria-current="page" href="#">Iniciar Sesión</a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="menu_register" class="nav-link" href="#">Registrarse</a>
                                            </li>
                                        </ul>
                                        <div id="login" class="border-bottom border-start border-end">
                                            <div class="modal-body">
                                                <form class="container g-3" method="POST" action="./src/post.php?type=login">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="register" class="border-bottom border-start border-end visually-hidden">
                                            <div class="modal-body">
                                                <form class="container g-3" method="POST" action="./src/post.php?type=register">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="nom" class="form-control" type="text" placeholder="Nombre" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="apel" class="form-control" type="text" placeholder="Apellidos" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="user" class="form-control" type="text" placeholder="Usuario" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="pass" class="form-control" type="password" placeholder="Contraseña" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="npass" class="form-control" type="password" placeholder="Repite la contraseña" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input name="fNacim" class="form-control" type="Date" placeholder="Fecha de nacimiento" aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </article>
                    ';
            }
        ?>

        <!-- Footer bootstrap -->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">© 2022 MaG Freelance</p>

                <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li><a href="#" class="nav-link px-2 link-secondary">Privacidad</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Aviso Legal</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Cookies</a></li>
                </ul>
            </footer>
        </div>
    </body>
    <script src="./res/js/functions.js" rel="stylesheet"></script>
</html>