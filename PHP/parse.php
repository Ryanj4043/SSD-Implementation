<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 29/11/2018
 * Time: 12:57
 * This PHP file will be used to parse the files for security vulnerabilities and will send a report back to the user
 */


function getCode(){
  //do this once you've figure out how to host this

}

function analyseCode($input){
    //rewrite this part toremove excess & rewrite string comparison
    $vul = file("cache.file") or die("Something went wrong: Send the server monkeys");
    $txt = file("in.file") or die("Something went wrong: Send the server grunts");
    //print_r($vul);
    //print_r($input);
    foreach ($vul as $y) {
        $count = -1;
        foreach ($input as $x){
            $count++;
            if (stripos($y, $x) !== false){
                echo "Issue itendified as ".$txt[$count];
            }
        }
    }
}


function santiseCode($input){
    $file_lines = file($input);
    foreach ($file_lines as $line) {
        $clean_line = filter_var($line, FILTER_SANITIZE_ENCODED);
        $clean_line = str_replace("%0D%0A","",$clean_line);
            //echo $clean_line;
        $sanatised_lines[] = $clean_line;
    }
    analyseCode($sanatised_lines);

}

function logReport(){

}

function deleteFile($input){
    unlink($input);
}

//santiseCode("HelloWorld.java");
santiseCode("test.txt");