<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 19:15
 */
session_save_path("File System");
session_start();
//print_r($_SESSION);
require "../vendor/autoload.php";
$tfa = new \RobThree\Auth\TwoFactorAuth("RASSDCW2");
if($_SESSION['loggedin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['code'])) {
            // Could not get the data that should have been sent.
            //print_r("false");
            die ('Something isnt right');
        }
        $file = simplexml_load_file("File System/file.xml") or die("trest");
        foreach ($file->coder as $x) {
            $u = $x->Email;
            $c= $x->code;
            if($_SESSION['name'] == $u[0]){
                if ($tfa->verifyCode($_SESSION['secret'], $_POST['code'])){
                    print_r("true");
                    break;
                }
            }
        }
        foreach ($file->admin as $x) {
            $u = $x->Email;
            $c= $x->code;
            /// sort this
            if($_SESSION['name'] == $u[0]){
                if ($tfa->verifyCode($_SESSION['secret'], $_POST['code'])){
                    print_r("true");
                    break;
                }
            }
        }

    }
}