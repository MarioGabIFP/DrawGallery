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
             *  Carga del perfil del usuario
             */
            if (isset($_GET['user'])) {//Si hemos recibido correctamente la variable user
                //recojemos los datos necesarios para cargar el perfil
                $user = $_GET['user'];//usuario
                $dir = './media/'.$user;//directorio de medios
                $rdir = opendir($dir);//Variable lectora
                $colCount = 0;//contador de columnas
                $rowCount = 0;//contador de columnas
                $posts = [];//Array que contiene los Post del usuario

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
                 *  Carga del directorio de medios del usuario sobre el array '$fileArr'
                 */
                while($file=readdir($rdir)){
                    if($file != "." && $file != ".."){
                        $fileArr[] = $file;
                    }
                }

                if (isset($fileArr)) {
                    sort($fileArr, SORT_NATURAL | SORT_FLAG_CASE);
                }

                /*
                 *  Carga de los post publicados por el usuario
                 */
                $sql = 'SELECT title, country, concat(name, " ", surname) AS autor, pubDate 
                          FROM historias INNER JOIN post ON post.idpost = historias.idpost
                                         INNER JOIN users ON users.idusers = post.idusers
                         WHERE users.userName = "'.$user.'";';

                if($res = mysqli_query($conex, $sql)){
                    $x = 0;
                    while ($reg = mysqli_fetch_row($res)){
                        $posts[$x] = $reg;
                        $x++;
                    }
                }

                echo '
                    <!-- Cabecera bootstrap -->
                    <div class="container">
                        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                                <img src="./res/img/png/logo.png" class="bi me-2" width="40" height="40">
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
                                        <a id="menu_post" href="#" class="nav-link active">
                                            <i class="bi bi-activity px-1"></i>
                                            Mis Post
                                        </a>
                                    </li>
                                    <li>
                                        <a id="menu_media" href="#" class="nav-link link-dark" aria-current="page">
                                            <i class="bi bi-caret-up-square px-1"></i>
                                            Medios
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <article class="p-2 w-100">
                            <section id="media" class="visually-hidden">
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
                                    </form>
                                    <div class="container">
                ';

                if (isset($fileArr)) {
                    $i = 0;
                    $numOfFiles = sizeof($fileArr);
                    for ($i;$i < $numOfFiles;$i++){
                        echo '<div class="row">';
                        $colCount = 0;
                        $colNum = $i + $colCount;
                        
                        do {
                            $fileName = pathinfo($fileArr[$colNum], PATHINFO_FILENAME);
                            echo '<div class="col">
                                        <img src="'.$dir.'/'.$fileArr[$colNum].'" title="'.$fileName.'" alt="'.$fileName.'" class="card-img">
                                  </div>';
                            $colCount++;
                            $colNum = $i + $colCount;
                        } while ($colCount < 3 && $colNum < $numOfFiles);

                        $i = $i + ($colCount - 1);
                        echo '</div>';
                    }
                        
                } else {
                    echo 'Aún no hay ningún fichero a mostrar';
                }

                echo '              </div>
                                </div>
                            </section>
                            <section id="post">
                                <div class="container">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a id="menu_misPost" class="nav-link active" aria-current="page" href="#">Mis Post</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="menu_nPost" class="nav-link" href="#">Nuevo Post</a>
                                        </li>
                                    </ul>
                                    <div id="postList" class="table-responsive border-bottom border-start border-end">
                                        <table class="table caption-top">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Titulo</th>
                                                    <th scope="col">Zona visitada</th>
                                                    <th scope="col">Autor</th>
                                                    <th scope="col">Fecha y Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                if (isset($posts)) {
                    $i = 0;
                    $numOfPosts = sizeof($posts);
                    for ($i;$i < $numOfPosts;$i++){
                        echo '<tr>
                                    <th scope="row"><input class="form-check-input" type="checkbox"></th>';
                        $title = $posts[$i][0];
                        $zone = $posts[$i][1];
                        $author = $posts[$i][2];
                        $date = $posts[$i][3];
                        echo '      <td>'.$title.'</td>';
                        echo '      <td>'.$zone.'</td>';
                        echo '      <td>'.$author.'</td>';
                        echo '      <td>'.$date.'</td>';
                        echo '</tr>';
                    }
                        
                } else {
                    echo 'Aún no has publicado ningún Post, ¿a que esperas?';
                }
                echo '
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="nuePost" class="border-bottom border-start border-end visually-hidden">
                                        <div class="modal-body w-auto">
                                            <form class="container p-3 g-3" enctype="multipart/form-data" method="POST" action="./src/post.php?type=post&user='.$user.'">
                                                <div class="d-flex w-100">
                                                    <div class="row p-2 flex-fill">
                                                        <div class="col">
                                                            <input name="title" placeholder="Titulo" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row p-2 flex-fill">
                                                        <div class="col">
                                                            <input name="resum" placeholder="Resumen" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="d-flex w-100">
                                                    <div class="row p-2 flex-fill">
                                                        <div class="col">
                                                            <textarea name="descr" placeholder="Descripcion" class="form-control h-100"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row p-2 flex-fill">
                                                        <div class="col">
                                                            <label for="imgP" class="form-label">Imagen principal</label>
                                                            <input name="imgP" class="form-control" type="file" id="imgP" accept="image/jpg,image/png,image/gif">
                                                            <br>
                                                            <label for="imgS" class="form-label">Imagen secundaria</label>
                                                            <input name="imgS" class="form-control" type="file" id="imgS" accept="image/jpg,image/png,image/gif">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <select name="site" class="form-select">
                                                            <option selected>Lugar Visitado</option>
                                                            <option value="1">España</option>
                                                            <option value="2">Europa</option>
                                                            <option value="3">Resto del mundo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Publicar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </article>
                    </div>
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