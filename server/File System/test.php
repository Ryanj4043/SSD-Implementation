<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 05/12/2018
 * Time: 21:48
 */

$g = new \Google\Authenticator\GoogleAuthenticator();
$salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
$secret = "ryanj4043".$salt;
echo '<img src="'.$g->getURL($username, 'example.com', $secret).'" />';
