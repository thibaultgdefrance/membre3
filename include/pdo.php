<?php

 try {
     $bdd = new PDO('mysql:host=localhost;dbname=tuto','','');
 }

 catch ( PDOExecption $e){
     die('Erreur:' .$e->getMessage());
 }
