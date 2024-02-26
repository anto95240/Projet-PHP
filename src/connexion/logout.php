<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_unset(); // Détruit toute les valeurs d'une session (plus aucune information, ou panier sur un utilisateur)
session_destroy(); // Détruit la session (se déconnecte)
header("Location: /index.php"); // Rediriger vers la page d'accueil après que la déconnexion ait réussi
exit();
