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
    $vul = file("cache.xml");
    foreach ($vul as $y) {
        foreach ($input as $x){

            /*echo strcmp($x, $y);

            if (strcmp($x, $y) == 0) {
                echo " It worked ";
            }*/
        }
    }
}


function santiseCode($input){
    $file_lines = file($input);
    foreach ($file_lines as $line) {
        $clean_line = filter_var($line, FILTER_SANITIZE_ENCODED);
        $sanatised_lines[] = $clean_line;
    }
    analyseCode($sanatised_lines);

}

function logReport(){

}

function deleteFile(){

}

//santiseCode("HelloWorld.java");
santiseCode("test.txt");