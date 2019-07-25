<?php

$ref = '/';

if(isset($_GET['ref'])){
    $ref = $_GET['ref'];
}
switch ($ref) {
    case '/':
            require_once("interface/body.php");
        break;
    case 'login':
            require_once('interface/nav.php');
        break;
}
?>