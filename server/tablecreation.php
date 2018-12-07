<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 07/12/2018
 * Time: 00:05
 */

/*session_start();
if($_SESSION['loggedin'] == 1 && $_) {*/
if($_SERVER['REQUEST_METHOD'] === "GET") {
    $file = simplexml_load_file("File System/admin.xml") or die("trest");
    $json = json_encode($file);
    print_r($json);
}
