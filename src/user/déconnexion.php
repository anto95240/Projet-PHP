<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exemple</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/assets/css/nav.css"> -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- <link rel="stylesheet" href="/assets/css/admin.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/inscription.css"> -->
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
</head>
<body>
    <div class="flex-column align-items-center mt-5 bg-success rounded">
        <div>Vous avez été déconnecté!</div>
        <button type="button" class="btn btn-light"><a href="connexion.php">Se connecter</a></button>
    </div>
<?php
require_once (__DIR__ . '/../../includes/footer.php');