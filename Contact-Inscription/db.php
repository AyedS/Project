<?php

function getDB(){
    $database = new PDO('mysql:host=localhost;dbname=ayj;charset=utf8','root','');
    return $database;
}

?>