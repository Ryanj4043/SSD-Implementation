<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 00:25
 */
session_save_path("File System");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ( !isset($_POST['un'], $_POST['ps']) ) {
        die ('Username and/or password does not exist!');
    }
    //print_r($_POST);
    $file = simplexml_load_file("File System/file.xml") or die("trest");
    foreach($file->coder as $x) {
        $U = $x->Email;
        $P = $x->password;
        $c = $x->code;
        if(strcmp($_POST['un'],$U[0]) == 0){
            if (strcmp($_POST['ps'],$P[0]) == 0){
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['un'];
                $_SESSION['id'] = rand(10000000, 90000000);
                $_SESSION['secret'] = (string)$c[0];
                //header('Location: 2factor.html');
                print_r("true");
                //print_r($_SESSION);
                break;
            }
            else{
                print_r("incorrect combination");
            }
        }
    }
}
else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SSD CW2</title>
    </head>
    <body>
    <h1> Hello there </h1>
    <P>You seem to be viewing this as a web-page which isn't quiet correct, try using index.html giving in the zip file. However, if you've found this by chance,
        this is a server for some coursework and is nothing of note.</P>
    </body>
    </html>
<?php
}
