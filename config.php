<?php
define("HOST","localhost");
define("USERNAME","root");
define("PASS",'');
define("DB","crud");
$con =new mysqli(HOST,USERNAME,PASS,DB);
if($con->connect_error)
    die($con->connect_error);
    