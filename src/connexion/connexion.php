<?php
$currentPage = '';
require_once (__DIR__ . '/../../includes/header.php');
require_once (__DIR__ . '/../../config/database.php');

// Vérifier si une session est déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM user_table WHERE Email = :Email";
    $stmt = $access->prepare($sql);
    $stmt->execute(['Email' => $email]);
    $user = $stmt->fetch();
    
    if ($user && $password === $user['Password']) {
        // L'utilisateur existe et le mot de passe est correct
        $_SESSION['user_id'] = $user['UserId'];

        if ($email === 'admin' && $password === 'admin') {
            $_SESSION['admin_logged_in'] = true; // Marquer l'utilisateur comme administrateur
        }

        // Requête pour récupérer le nom d'utilisateur
        $sql = "SELECT FirstName FROM address_table WHERE UserId = :userId";
        $stmt = $access->prepare($sql);
        $stmt->execute(['userId' => $user['UserId']]);
        $userData = $stmt->fetch();

        $_SESSION['user_name'] = $userData['FirstName']; // Stocke le nom d'utilisateur dans la session pour le réutilier plus tard

        header('Location: /index.php'); // Redirige vers la page d'accueil après la connexion
        exit();
    } else {
        // L'utilisateur n'existe pas ou le mot de passe est incorrect
        echo  'Email ou mot de passe incorrect';
        
    }
}

?>
<section id="form">
  <!-- on crée ensuite la structure de la page web ! (ici un formulaire)-->
  <div class="container mx-auto w-25 mt-5">
    <!-- Bootstrap permet de simplifier l'utilisation de CSS par le biais de raccourcis (mt pour margin top 5px/ succès est leur couleur verte, danger rouge...) -->
    <div class="form-row ">      
        <div class="container">
            <div class="row d-flex flex-column">
                <h5 class="pb-2 text-center">Connexion</h5>
                <div class="form-column bg-light">
                    <form method="post">
                        <div class="form-floating p-2">
                            <input type="text" class="form-control bg-white" name="Email" placeholder="Email">
                            <label class="bg-transparent">Email</label>
                        </div>
                        <div class="form-floating p-2">
                            <input type="password" class="form-control bg-white" name="Password" placeholder="Password">
                            <label for="bg-transparent">Mot de Passe</label>
                        </div>
                        <div class="form-group ms-1">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                              Se souvenir
                            </label>
                          </div>
                        </div>
                        <div class="d-flex flex-column pt-3 pb-3 align-items-center gap-4">
                            <button type="submit" class="btn btn-primary w-25">Entrer</button>
                            <a href="inscription.php" >Ou inscrivez-vous</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<?php
require_once (__DIR__ . '/../../includes/footer.php');
?>
