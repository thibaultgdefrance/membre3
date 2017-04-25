<?php

 try {
     $bdd = new PDO('mysql:host=localhost;dbname=tuto','root','u1wj99cv');
 }

 catch ( PDOExecption $e){
     die('Erreur:' .$e->getMessage());
 }
