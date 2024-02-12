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
    <section id="form">
    <div class="container mt-5 bg-success rounded">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="CoUrRiEl">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mot de Passe</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Mot de Passe">
                </div>
            </div>
            <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                Se souvenir
                </label>
            </div>
            </div>
            <button type="button" class="btn btn-light"><a href="/../../index.php">Retour au menu</a></button>
            <button type="submit" class="btn btn-primary">Entrer</button>
        </form>
    </div>
</body>
<?php
require_once (__DIR__ . '/../../includes/footer.php');