<?php

function getDB(){
    $database = new PDO('mysql:host=localhost;dbname=contact;charset=utf8','root','');
    return $database;
}

?>