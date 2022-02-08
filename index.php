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
    <!-- Cabecera bootstrap -->
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Todos</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">España</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Europa</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Resto del Mundo</a></li>
            </ul>
        </header>
    </div>
    <article>
        <section>
            <?php
                /*
                *  Obtencion de los datos de conexion  a la base de datos a partir del fichero de configuración (res/json/conf.json)
                */
                //Leemos los datos y los recojemos en un Objeto.
                $conexData = json_decode(file_get_contents('./res/json/conf.json'));

                //recojemos los datos del objeto generado y los introducimos en sus correspondientes variables
                $db = $conexData->data_base_conex->db;//nombre de la base de datos
                $dbuser = $conexData->data_base_conex->user;//usuario
                $dbpassw = $conexData->data_base_conex->passw;//contraseña
                $dbdir = $conexData->data_base_conex->dir;//direccion (DNS o IP)
                $dbport = $conexData->data_base_conex->port;//puerto de conexion

                /*
                 *  Conexión a la base de datos.
                 */
                $conex = mysqli_connect($dbdir.':'.$dbport,$dbuser,$dbpassw,$db) 
                                        or die ("Unnable to conect to Data Base: ".$db."
                                                \nURL: ".$dbdir.":".$dbport."
                                                \nUser: ".$dbuser."
                                                \nPassword: ".$dbpassw);

                $conex -> set_charset('utf8');

                if(mysqli_connect_errno()){
                    echo "Unnable to conect; Error: ".mysqli_connect_error();
                };

                /*
                 *  Recuperamos los Articulos con referencia a lugares de España.
                 */
                $sql = 'SELECT title, resum, description, mainImg, otherImg FROM historias WHERE country = "España"';
                
                echo '  <div class="container">
                                <div class="row">
                                    <h1>España</h1>';

                if($res = mysqli_query($conex, $sql)){
                    while ($reg = mysqli_fetch_row($res)){
                        echo '  <div class="col">
                                    <div class="container border">
                                        <div class="row">
                                            <h3>'.$reg[0].'</h3>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <strong>'.$reg[1].'</strong>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[3].'">
                                        </div>
                                        <br>
                                        <div class="row">
                                            <p>'.$reg[2].'<p>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[4].'">
                                        </div>
                                    </div>
                                </div>';
                    }
                }

                echo '</div></div>';

                /*
                 *  Recuperamos los Articulos con referencia a lugares de Europa en general.
                 */
                $sql = 'SELECT title, resum, description, mainImg, otherImg FROM historias WHERE country = "Europa"';
                
                echo '  <div class="container">
                                <div class="row">
                                    <h1>Europa</h1>';

                if($res = mysqli_query($conex, $sql)){
                    while ($reg = mysqli_fetch_row($res)){
                        echo '  <div class="col">
                                    <div class="container border">
                                        <div class="row">
                                            <h3>'.$reg[0].'</h3>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <strong>'.$reg[1].'</strong>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[3].'">
                                        </div>
                                        <br>
                                        <div class="row">
                                            <p>'.$reg[2].'<p>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[4].'">
                                        </div>
                                    </div>
                                </div>';
                    }
                }

                /*
                 *  Recuperamos los Articulos con referencia a lugares del mundo.
                 */
                echo '</div></div>';

                $sql = 'SELECT title, resum, description, mainImg, otherImg FROM historias WHERE country = "Resto del Mundo"';
                
                echo '  <div class="container">
                                <div class="row">
                                    <h1>Resto del mundo</h1>';

                if($res = mysqli_query($conex, $sql)){
                    while ($reg = mysqli_fetch_row($res)){
                        echo '  <div class="col">
                                    <div class="container border">
                                        <div class="row">
                                            <h3>'.$reg[0].'</h3>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <strong>'.$reg[1].'</strong>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[3].'">
                                        </div>
                                        <br>
                                        <div class="row">
                                            <p>'.$reg[2].'<p>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <img src="'.$reg[4].'">
                                        </div>
                                    </div>
                                </div>';
                    }
                }

                echo '</div></div>';
            ?>
        </section>
    </article>
    <aside></aside>
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
</html>