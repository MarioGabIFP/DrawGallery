<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        if (isset($_GET['logon']) && isset($_GET['user'])){
            if ((bool)$_GET['logon']){
                $user = $_GET['user'];
                $dir = './media/'.$user;
                $rdir = opendir($dir);
                
                while($file=readdir($rdir)){
                    if($file != "." && $file != ".."){
                        $fileArr[] = $file;
                    }
                }

                if (isset($fileArr)) {
                    sort($fileArr, SORT_NATURAL | SORT_FLAG_CASE);
                }

                echo '
                    <!-- Cabecera bootstrap -->
                    <div class="container">
                        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                <img src="./res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
                            </a>
                
                            <ul class="nav">
                                <img src="https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/elements/bootstrap-stack.png" class="rounded-circle border border-primary border-2" alt="nombrePerfil" width="40" height="40">
                                <li><a href="./login.php" class="nav-link px-2 link-secondary">'.$user.', Cerrar sesión</a></li>
                            </ul>
                        </header>
                    </div>
                    <!-- Menú Flexbox -->
                    <nav></nav>
                    <div class="container d-flex">
                        <aside class="p-2">
                            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link  link-dark">
                                            <i class="bi bi-activity px-1"></i>
                                            Estadísticas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link active" aria-current="page">
                                            <i class="bi bi-caret-up-square px-1"></i>
                                            Medios
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link link-dark">
                                            <i class="bi bi-nut px-1"></i>
                                            Configuración
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <article class="p-2">
                            <section>
                                <div class="content">
                                    <form action="./src/post.php?type=file&user='.$user.'" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="col-auto mb-3">
                                                <input name="file" class="form-control" type="file" id="formFile" accept="image/jpg,image/png,image/gif">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Subir Imagen</button>
                                            </div>
                                        </div>
                                        <div class="row">
                ';
                if (isset($fileArr)) {
                    foreach($fileArr as $file){
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        echo '                  <div class="col">
                                                    <img src="'.$dir.'/'.$file.'" title="'.$fileName.'" alt="'.$fileName.'" class="card-img">
                                                </div>
                        ';
                    }
                } else {
                    echo 'Aún no has subido ningun fichero';
                }
                echo '                  </row>
                                    </form>
                                </div>
                            </section>
                        </article>
                    </div>
                ';
            } else {
                echo '
                    <!-- Cabecera bootstrap -->
                    <div class="container">
                        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                <img src="./res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
                            </a>
                
                            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                                <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">NFT\'s</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Conectar Billetera</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Servicios</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Sobre mí</a></li>
                            </ul>
                
                            <div class="col-md-3 text-end">
                                <!-- cerrar sesión button -->
                            </div>
                        </header>
                    </div>
                    <!-- Menú Flexbox -->
                    <nav></nav>
                    <article>
                        <section>
                            <div class="container">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5 class="modal-title">Iniciar Sesión</h5>
                                        </div>
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
                                                    <div class="col modal-footer">
                                                        <div class="card border border-danger" style="width: 18rem;">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">Usuario y/o contraseña incorrectos</li>
                                                            </ul>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                    <aside></aside>
                ';
            }
        } else {
            echo '
                    <!-- Cabecera bootstrap -->
                    <div class="container">
                        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                <img src="./res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
                            </a>
                
                            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                                <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">NFT\'s</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Conectar Billetera</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Servicios</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                                <li><a href="#" class="nav-link px-2 link-dark">Sobre mí</a></li>
                            </ul>
                
                            <div class="col-md-3 text-end">
                                <!-- cerrar sesión button -->
                            </div>
                        </header>
                    </div>
                    <!-- Menú Flexbox -->
                    <nav></nav>
                    <article>
                        <section>
                            <div class="container">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5 class="modal-title">Iniciar Sesión</h5>
                                        </div>
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
                                </div>
                            </div>
                        </section>
                    </article>
                    <aside></aside>
                ';
        }
    ?>

    <!-- Footer bootstrap -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2022 MaG Freelance</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="./res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li><a href="#" class="nav-link px-2 link-secondary">Privacidad</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Aviso Legal</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Cookies</a></li>
            </ul>
        </footer>
    </div>
</body>
</html>