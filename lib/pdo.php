<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=combat;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);
   // echo 'Vous etes bien connecte a la base de donnees';
}
catch(Exception $erreur_de_co){
   echo 'VOUS avez un Soucis de '.' '.$erreur_de_co->getMessage().'Avec le code erreur :'.' '.$erreur_de_co->getCode();
}
