<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 29/11/2018
 * Time: 12:57
 * This PHP file will be used to parse the files for security vulnerabilities and will send a report back to the user
 */


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['files'])) {
        $errors = [];
        $path = 'File System/Upload/';
        $extensions = ['java', 'txt'];
        $all_files = count($_FILES['files']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {
            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_type = $_FILES['files']['type'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));

            $file = $path . $file_name;

            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }
            if (empty($errors)) {
                move_uploaded_file($file_tmp, $file);
                santiseCode($file);
                deleteFile($file);
            }
            if ($errors) print_r($errors);
        }
    }
}



function analyseCode($input){
    $vul = file("File System/cache.file") or die("Something went wrong: Send the server monkeys");
    $txt = file("File System/in.file") or die("Something went wrong: Send the server grunts");
    $response = [];
    foreach ($vul as $y) {
        $count = -1;
        $count++;
        foreach ($input as $x){
            //echo $count;
            if (stripos($y, $x) !== false){
                $response = "Issue itendified as \"".$txt[$count]." \"";
            }
        }
    }
    return $response;
}


function santiseCode($input){
    $file_lines = file($input);
    foreach ($file_lines as $line) {
        $clean_line = filter_var($line, FILTER_SANITIZE_ENCODED);
        //print_r($clean_line);
        $clean_line = str_replace("%0D%0A","",$clean_line);
        $clean_line = str_replace("%20","",$clean_line);
        //print_r($clean_line);
        $sanatised_lines[] = $clean_line;

    }
    print_r(analyseCode($sanatised_lines));

}

function logReport(){

}

function deleteFile($input){
    unlink($input);
}
