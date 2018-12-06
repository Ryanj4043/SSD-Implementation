<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 19:15
 */

session_start();
if($_SESSION['loggedin'] === true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['code'])) {
            // Could not get the data that should have been sent.
            print_r("false");
            die ('Something isnt right');
        }

        $file = simplexml_load_file("File System/file.xml") or die("trest");
        foreach ($file->coder as $x) {
            $u = $x->Email;
            $c= $x->code;
            /// sort this
            if($_SESSION['name'] === $u[0]){
                if ($_POST['code'] === $c[0]){
                    print_r("true");
                    break;
                }
                else{
                    print_r("false");
                }
            }
        }
    }
} else{
    print_r($_SESSION["loggedin"]);
}