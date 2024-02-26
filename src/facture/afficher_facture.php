<?php
require_once (__DIR__ . '/../../config/database.php');

// Permet de récupérer toute les informations pour les produits et les catégories
function afficherFacture() {
    global $access;

    $req = $access->prepare("SELECT i.*, c.*
                            FROM invoices_table i
                            INNER JOIN command_table c ON i.CommandId = c.CommandId
                            ORDER BY i.InvoiceId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}