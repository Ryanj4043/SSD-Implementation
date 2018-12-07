<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 22:11
 */

require "../vendor/autoload.php";


session_abort();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['un'], $_POST['ps'])) {
        // Could not get the data that should have been sent.
        print_r("false");
        die ('Username and/or password does not exist!');
    }
    if (filter_var($_POST['un'], FILTER_VALIDATE_EMAIL)){
        $e = $_POST['un'];
        $p = $_POST['ps'];
    }
    else{
        die("Not a valid email");
    }

    $tfa = new \RobThree\Auth\TwoFactorAuth("RASSDCW2");
    $secret = $tfa->createSecret();

    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['un'];
    $_SESSION['id'] = rand(10000000, 90000000);
    $_SESSION['secret'] = $secret;

    $loc = "File System\\file.xml";

    $file = simplexml_load_file($loc) or die("trest");

    $xml = $file->addChild("coder");

    $xml->addChild("Email", $e);
    $xml->addChild("password",$p);
    $xml->addChild("code",$secret);
    $file->asXML($loc);


    print_r($secret.",true");
}
