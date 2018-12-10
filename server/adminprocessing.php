<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 07/12/2018
 * Time: 23:39
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $count = 0;
    foreach($_POST as $x) {
        $x = str_replace('"',"",$x);
        if($count == 0){
            $job = $x;
        } elseif($count == 1){
            $source = $x;
        } elseif($count == 2){
            $date = $x;
        } elseif($count == 3){
            $body = $x;
        }
        $count++;
    }


    if (strcmp($job, "Update Preferences") == 0){
        //print_r("works");
        $loc = "File System\\cache.file";
        $loc1 = "File System\\in.file";
        $array = explode(";", $body);


        $file = fopen($loc,"a");
        $file1 = fopen($loc1,"a");

        /*fwrite($file, "\n".$array[0]);
        fclose($file);

        fwrite($file1, "\n". $array[1]);
        fclose($file1);*/
        updateadmin($job,$source,$body);

    } elseif (strcmp($job, "Elevate User")== 0){
        //print_r("works");
        $loc = "File System\\file.xml";
        $file = simplexml_load_file($loc) or die("trest");
        $p ="";
        $secret ="";
        foreach($file->coder as $coders){
            if($coders->Email == $body){
                $p = $coders-> password;
                $secret = $coders->code;
                $dom = dom_import_simplexml($coders);
                $dom->parentNode->removeChild($dom);
            }
        }
        $xml = $file->addChild("Admin");

        $xml->addChild("Email", $body);
        $xml->addChild("password",$p);
        $xml->addChild("code",$secret);
        $file->asXML($loc);
        updateadmin("Elevate User",$source,$body);
    }
}

function updateadmin($job,$admins,$body){
    $loca = "File System\\admin.xml";
    $locb = "File System\\adminlog.txt";

    $string = "Admins: ".$admins.". Job: ".$job." Body: ".$body." Date: ".date("d/m/Y")."\n";
    file_put_contents($locb,$string);


}