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
        
        if ($user == 'admin' && $pass == 'admin'){
            header('location: ../miPanel.php?user='.$user);
        } else {
            header('location: ../login.php?logon=0');
        }
    } else if ($_GET['type'] == 'file') {
        $user = $_GET['user'];
        $file = $_FILES['file'];
        $name = $file['name'];

        move_uploaded_file($file['tmp_name'], '../media/'.$user.'/'.$name);

        header("location: ../login.php?logon=1&user=".$user);
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
                    VALUES ("'.$_POST['nom'].'", 
                            "'.$_POST['apel'].'", 
                            "'.$_POST['user'].'", 
                            "'.$_POST['pass'].'", 
                            "'.$_POST['fNacim'].'"
                            );';

            if(mysqli_query($conex, $sql)){
                header("location: ../login.php?registror=-1");
            } else {
                header("location: ../login.php?registror=1");
            };

            mysqli_close($conex);
        }
    }
?>