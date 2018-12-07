<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/12/2018
 * Time: 20:43
 */

$file = simplexml_load_file("File System/admin.xml") or die("trest");

$json = json_encode($file);
$array = json_decode($json, TRUE);

print_r($json);
//echo(phpinfo());