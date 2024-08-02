<?php 

try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=exam_pdo','php', 'PHPcestSuper!');
    
} catch (PDOException $e) {
    die ('Erreur de connexion à la bdd : ' . $e->getMessage()); 
}

