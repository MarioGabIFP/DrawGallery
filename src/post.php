<?php
    $db = 'drawgallery';
    $user = 'root';
    $passw = '';
    $dir = 'localhost';
    $port = '3316';

    $conex = mysqli_connect($dir.':'.$port,$user,$passw,$db) or die ("Unnable to conect to Data Base: ".$db."
                                                                      \nURL: ".$dir.":".$port."
                                                                      \nUser: ".$user."
                                                                      \nPassword: ".$passw);
    
    $conex -> set_charset('utf8');

    if(mysqli_connect_errno()){
        echo "Unnable to conect; Error: ".mysqli_connect_error();
    };

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

    } else if ($_GET['type'] == 'file') {
        $file = $_FILES['file'];
        $name = $file['name'];
        $user = $_GET['user'];

        move_uploaded_file($file['tmp_name'], '../media/'.$name);

        header("location: ../login.php?user=".$user);
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
                    mkdir('../'.$dirimg);
                    move_uploaded_file($imgP['tmp_name'], '../'.$rutaimgP);
                    move_uploaded_file($imgS['tmp_name'], '../'.$rutaimgS);

                    header("refresh:15;location: ../miPanel.php?user=".$user);
                }
            }
        }
    }

    mysqli_close($conex);
?>