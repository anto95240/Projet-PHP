<?php
require_once (__DIR__ . '/../../config/database.php');

// Permet de récupérer toute les informations pour les produits et les catégories
function afficherCommand() {
    global $access;

    $req = $access->prepare("SELECT c.*
                            FROM command_table c
                            ORDER BY c.CommandId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}