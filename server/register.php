<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 22:11
 */

require "../vendor/autoload.php";

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

    $salt ="QW4gQWN0IHRvIG1ha2UgcHJvdmlzaW9uIGZvciBzZWN1cmluZyBjb21wdXRlciBtYXRlcmlhbCBhZ2FpbnN0IHVuYXV0aG9yaXNlZCBhY2Nlc3Mgb3IgbW9kaWZpY2F0aW9uOyBhbmQgZm9yIGNvbm5lY3RlZCBwdXJwb3Nlcy4";
    $secret = $e.$salt;
    $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();


    $xml = simplexml_load_file("File System\\file.xml") or die("trest");
    $xml->addChild("Email", $e);
    $xml->addChild("password",$p);
    $xml->addChild("code",$g->getCode($secret));
    $xml->asXML("File System/file.xml");


    print_r(\Sonata\GoogleAuthenticator\GoogleQrUrl::generate($e, $secret, 'SSD CW').",true");
}

  /*  if ($g->checkCode($secret, $code)) {
        echo "YES \n";
    } else {
        echo "NO \n";
    }*/

//}
