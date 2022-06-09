<?php

try {
    $Bdd = new PDO('mysql:host=127.0.0.1;dbname=certif', 'root', '');
} catch (Exception $e) {

    die('Erreur' . $e->getMessage());
}
