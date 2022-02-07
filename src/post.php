<?php
    if ($_GET['type'] == 'login'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        if ($user == 'admin' && $pass == 'admin'){
            header("location: ../miPanel.php?user=".$user);
        } else {
            header("location: ../login.php?logon=0");
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
            
        }
    }
?>