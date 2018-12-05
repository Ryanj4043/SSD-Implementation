<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 00:25
 */

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ( !isset($_POST['un'], $_POST['ps']) ) {
        // Could not get the data that should have been sent.
        die ('Username and/or password does not exist!');
    }
    $file = simplexml_load_file("File System\\file.xml") or die("trest");
    foreach($file->coder as $x) {
        $U = $x->Email;
        $P = $x->password;
        if(strcmp($_POST['un'],$U[0]) == 0){
            if (strcmp($_POST['ps'],$P[0]) == 0){
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                //header('Location: 2factor.html');
                print_r("true");
                break;
            }
            else{
                print_r("incorrect combination");
            }
        }
    }




}
