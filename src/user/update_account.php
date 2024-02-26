<?php

require_once (__DIR__ . '/../../../config/database.php');

// Mise à jour d'un produit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs de formulaire
    $userId = $_POST['user_userId'];
    $addressId = $_POST['address_addressId'];
    $firstName = $_POST['address_firstName'];
    $lastName = $_POST['address_lastName'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $address = $_POST['address_streetAddress'];
    $city = $_POST['address_city'];
    $state = $_POST['address_state'];
    $country = $_POST['address_country'];
    $postalCode = $_POST['address_postalCode'];

    updateUser($userId, $addressId, $firstName, $lastName, $email, $password, $address, $city, $state, $country, $postalCode);
}

function updateUser($userId, $addressId, $firstName, $lastName, $email, $password, $address, $city, $state, $country, $postalCode) {
    global $access;

    $updateUserQuery = $access->prepare("UPDATE user_table SET Email = ?, Password = ? WHERE UserId = ?");
    $updateUserQuery->execute([$email, $password, $userId]); 

    // Mise à jour du produit dans la table product_table
    $updateAddressQuery = $access->prepare("UPDATE user_table SET UserId = ?, FirstName = ?, LastName = ?, StreetAddress = ?, City = ?, State = ?, Country = ?, PostalCode = ? WHERE AdressId = ?");
        
    $updateAddressQuery->execute([$userId, $firstName, $lastName, $address, $city, $state, $country, $postalCode, $addressId]);

    // Vérifier si les mises à jour ont réussi
    if ($updateAddressQuery && $updateAddressQuery) { 
        $_SESSION['status'] = "Products updated successfully";
    } else {
        $_SESSION['status'] = "Error: Products not updated";
    }

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    // Stocker le prénom dans la session
    $_SESSION['user_name'] = $firstName;
    $_SESSION['user_id'] = $userId;

    // Redirection vers la page d'accueil
    header("Location: /index.php");
    exit();
}
