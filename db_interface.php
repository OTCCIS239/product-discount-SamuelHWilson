<?php

$dsn = "mysql:host=localhost;dbname=feb12";
$user = "root";
$pswd = null;
$conn =  new PDO($dsn, $user, $pswd);

function GetMany($query, $conn, $toBind = []) {
    $statement = $conn->prepare($query);
    foreach($toBind as $bString => $bValue) {
        $statement->bindValue($bString, $bValue);        
    }
    $statement->execute();
    $toReturn = $statement->fetchAll();
    $statement->closeCursor();
    return $toReturn;
}

function GetOne($query, $conn, $toBind = []) {
    $statement = $conn->prepare($query);
    foreach($toBind as $bString => $bValue) {
        $statement->bindValue($bString, $bValue);        
    }
    $statement->execute();
    $toReturn = $statement->fetch();
    $statement->closeCursor();
    return $toReturn;
}