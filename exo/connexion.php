<?php

function getResult($select){
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "base_etudiants";

        try{
          $bdd = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }
catch (PDOException $e) {
echo $e->getMessage();
}     
          $req = $bdd->query($select);
          $reponse = $req->fetchAll();

          return $reponse;
}
