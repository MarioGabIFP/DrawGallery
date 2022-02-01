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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Fin BootStrap -->
    <title>Draw Gallery</title>
</head>
<body>
    <!-- Cabecera bootstrap -->
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="../res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
            </a>

            <ul class="nav">
                <img src="https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/elements/bootstrap-stack.png" class="rounded-circle border border-primary border-2" alt="nombrePerfil" width="40" height="40">
                <li><a href="#" class="nav-link px-2 link-secondary">cerrar sesion</a></li>
            </ul>
        </header>
    </div>
    <!-- Menú Flexbox -->
    <nav></nav>
    <!-- bar Menú -->
    <div class="container">
        <aside>
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light rounded-3" style="width: 280px;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="../src/miPanel.php" class="nav-link link-dark" aria-current="page">
                            <i class="bi bi-activity px-1"></i>
                            Estadísticas
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link active">
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
    </div>
    <!-- Contenido -->
    <article>
        <section>
        </section>
    </article>
    <!-- Footer bootstrap -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2022 MaG Freelance</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="../res/img/svg/logo.svg" class="bi me-2" width="40" height="40">
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