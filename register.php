<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 22:11
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['un'], $_POST['ps'])) {
        // Could not get the data that should have been sent.
        die ('Username and/or password does not exist!');
        print_r("false");
    }
    $xml = simplexml_load_file("File System\\file.xml") or die("trest");
    $xml->addChild("Email", "test");
    $xml->addChild("password","hello");
    $xml->asXML("File System\\file.xml");
    print_r("true");
}

