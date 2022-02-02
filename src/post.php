<?php
    if ($_GET['type'] == 'login'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        if ($user == 'admin' && $pass == 'admin'){
            header("location: ../login.php?logon=1");
        } else {
            header("location: ../login.php?logon=0");
        }
    }
?>