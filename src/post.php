<?php
    /*
     *  Obtencion de los datos de conexion  a la base de datos a partir del fichero de configuración (res/json/conf.json)
     */
    //Leemos los datos y los recojemos en un Objeto.
    $jsonStr = file_get_contents('../res/json/conf.json');
    $conexData = json_decode($jsonStr);

    //recojemos los datos del objeto generado y los introducimos en sus correspondientes variables
    $db = $conexData->data_base_conex->db;          //nombre de la base de datos
    $user = $conexData->data_base_conex->user;      //usuario
    $passw = $conexData->data_base_conex->passw;    //contraseña
    $dir = $conexData->data_base_conex->dir;        //direccion (DNS o IP)
    $port = $conexData->data_base_conex->port;      //puerto de conexion

    /*
     *  Conexión a la base de datos.
     */
    $conex = mysqli_connect($dir.':'.$port,$user,$passw,$db) 
                    or die ("Unnable to conect to Data Base: ".$db."
                            \nURL: ".$dir.":".$port."
                            \nUser: ".$user."
                            \nPassword: ".$passw);
    
    $conex -> set_charset('utf8');

    if(mysqli_connect_errno()){
        echo "Unnable to conect; Error: ".mysqli_connect_error();
    };

    if (isset($_GET['type'])) {//si hemos recibido correctamente el tipo de petición.
        
        /*
         *  En el caso de que la petición sea de inicio de sesión
         */
        if ($_GET['type'] == 'login'){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
    
            $sql = 'SELECT userName, password FROM users WHERE userName = "'.$user.'" 
                                                           AND password = "'.$pass.'";';
    
            if($res = mysqli_query($conex, $sql)){
                if ($reg = mysqli_fetch_row($res)){
                    header('location: ../miPanel.php?user='.$user);
                } else {
                    header('location: ../login.php?logon=0');
                }
            } 
        
        /*
         *  En el caso de que la petición sea de subida de fichero
         */
        } else if ($_GET['type'] == 'file') {
            $file = $_FILES['file'];
            $name = $file['name'];
            $user = $_GET['user'];
    
            move_uploaded_file($file['tmp_name'], '../media/'.$name);
    
            header("location: ../login.php?user=".$user);
        
        /*
         *  En el caso de que la petición sea de registro 
         */
        } else if ($_GET['type'] == 'register') {
            $nom = $_POST['nom'];
            $apel = $_POST['apel'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $nPass = $_POST['npass'];
            $fNacim = $_POST['fNacim'];
    
            if ($pass != $nPass) {
                header("location: ../login.php?registror=0");
            } else {
                $sql = 'INSERT INTO users (name, surname, userName, password, birthday) 
                        VALUES ("'.$nom.'", 
                                "'.$apel.'", 
                                "'.$user.'", 
                                "'.$pass.'", 
                                "'.$fNacim.'"
                                );';
    
                if(mysqli_query($conex, $sql)){
                    header("location: ../login.php?registror=-1");
                } else {
                    header("location: ../login.php?registror=1");
                };
            }
        
        /*
         *  En el caso de que la petición sea para subir un articulo (Nuevo Post) 
         */
        } else if ($_GET['type'] == 'post') {
            $imgP = $_FILES['imgP'];
            $imgS = $_FILES['imgS'];
            $imgPName = $imgP['name'];
            $imgSName = $imgS['name'];
            $titPost = $_POST['title'];
            $resumPost = $_POST['resum'];
            $descrPost = $_POST['descr'];
            $sitePost = $_POST['site'];
            $user = $_GET['user'];
            
            $sql = 'INSERT INTO historias (title, resum, description, country) 
                    VALUES ("'.$titPost.'", 
                            "'.$resumPost.'", 
                            "'.$descrPost.'", 
                            "'.$sitePost.'"
                            );';
    
            if(mysqli_query($conex, $sql)){
    
                $sql = 'SELECT idpost FROM historias WHERE title = "'.$titPost.'"';
                
                if($res = mysqli_query($conex, $sql)){
                    if ($reg = mysqli_fetch_row($res)){
                        $idPost = $reg[0];
                    }
                }
                
                $sql = 'INSERT INTO post (idusers, idPost) 
                        VALUES ((SELECT idusers FROM users WHERE userName = "'.$user.'"),
                                "'.$idPost.'"
                               );';
                
                if(mysqli_query($conex, $sql)){
                    $dirimg = 'media/'.$user.'/'.$idPost;
                    $rutaimgP = $dirimg.'/1_'.$imgPName;
                    $rutaimgS = $dirimg.'/2_'.$imgSName;
    
                    $sql = 'UPDATE historias SET mainImg = "'.$rutaimgP.'",
                                                 otherImg = "'.$rutaimgS.'"
                                             WHERE idpost = "'.$idPost.'"';
    
                    if(mysqli_query($conex, $sql)){
                        mkdir('../media/'.$user);
                        mkdir('../'.$dirimg);
                        move_uploaded_file($imgP['tmp_name'], '../'.$rutaimgP);
                        move_uploaded_file($imgS['tmp_name'], '../'.$rutaimgS);
    
                        header("location: ../miPanel.php?user=".$user);
                    }
                }
            }

        /*
         *  En el caso de que la petición sea para sustotuir la imagen de un articulo (Cambiar imagen) 
         */
        } else if ($_GET['type'] == 'Cfile') {
            $file = $_FILES['file'];
            $user = $_GET['user'];
            $old = $_GET['old'];
            $oldPath = dirname($old);
            $oldName = basename($old);

            move_uploaded_file($file['tmp_name'], '.'.$oldPath.'/'.$oldName);
    
            header("location: ../miPanel.php?user=".$user);
        }
    }

    /*
     *  Cerramos la conexion a la base de datos
     */
    mysqli_close($conex);
?>