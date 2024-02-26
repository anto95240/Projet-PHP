<!-- avec php on récupère l'header du site (la ou on a la balise body qui s'ouvre sans se fermer)-->
<?php
  $currentPage = '';
  require_once (__DIR__ . '/../../config/database.php');
  require_once (__DIR__ . '/../../includes/header.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Récupère les valeurs des champs de formulaire
      $firstName = $_POST['address_firstName'];
      $lastName = $_POST['address_lastName'];
      $email = $_POST['user_email'];
      $password = $_POST['user_password'];
      $address = $_POST['address_streetAddress'];
      $city = $_POST['address_city'];
      $state = $_POST['address_state'];
      $country = $_POST['address_country'];
      $postalCode = $_POST['address_postalCode'];
  
      addUser($firstName, $lastName, $email, $password, $address, $city, $state, $country, $postalCode);
  }
  
  // Fonction pour faire une insertion d'un utilisateur
  function addUser($firstName, $lastName, $email, $password, $address, $city, $state, $country, $postalCode) {
      global $access;
  
       // Insert la catégorie dans la table user_table
      $reqUser = $access->prepare("INSERT INTO user_table (Email, Password) VALUES (?, ?)");
      $reqUser->execute(array($email, $password));
      $userId = $access->lastInsertId(); // Récupérer l'ID de l'utilisateur insérée
  
      // Insert le produit dans la table address_Table
      $reqAddress = $access->prepare("INSERT INTO address_Table (UserId, FirstName, LastName, StreetAddress, City, State, Country, PostalCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $reqAddress->execute(array($userId, $firstName, $lastName, $address, $city, $state, $country, $postalCode));
  
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
?>
<section>

  <!-- on cree ensuite la structure de la page web ! (ici un formulaire)-->
  <div class="container mt-5 bg-light rounded mx-auto" style="width:35% !important;">
    <!-- Bootstrap permet de simplifier l'utilisation de css par le biais de raccourcis (mt pour margin top 5px/ succes est leur couleur verte, danger rouge...) -->
    <form method="post" class="d-flex flex-column gap-3 pt-3">
      <div class="form-row d-flex flex-column gap-3">
        <div class="d-flex gap-5">
          <div class="form-floating col-md-5">
            <input type="text" class="form-control" id="address_firstName" name="address_firstName" placeholder="Prenom">
            <label>Prenom</label>
          </div>
          <div class="form-floating col-md-5">
            <input type="text" class="form-control" id="address_lastName" name="address_lastName" placeholder="Nom">
            <label>Nom</label>
          </div>
        </div>
        <div class="form-floating col-md-6">
          <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
          <label>Email</label>
        </div>
        <div class="form-floating col-md-6">
          <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Mot de Passe">
          <label>Mot de Passe</label>
        </div>
      </div>
      <div class="form-floating col-md-6">
        <input type="text" class="form-control" id="address_streetAddress" name="address_streetAddress" placeholder="1 rue de l'Imposture">
        <label>Adresse</label>
      </div>
      <div class="form-row d-flex flex-column gap-3">
        <div class="d-flex gap-5">
          <div class="form-floating col-md-5">
            <input type="text" class="form-control" id="address_city" name="address_city" placeholder="Paris">
            <label>Ville</label>
          </div>
          <div class="form-floating col-md-5">
            <input type="text" class="form-control" id="address_state" name="address_state" placeholder="Île de France">
            <label>Etat / Région</label>
          </div>
        </div>
        <div class="d-flex gap-5">
          <div class="form-floating col-md-5">
            <select id="address_country" name="address_country" class="form-control">
              <option selected></option>
              <option>Afghanistan</option>
              <option>Afrique du Sud</option>
              <option>Albanie</option>
              <option>Algérie</option>
              <option>Allemagne</option>
              <option>Andorre</option>
              <option>Angola</option>
              <option>Antigua-et-Barbuda</option>
              <option>Arabie saoudite</option>
              <option>Argentine</option>
              <option>Arménie</option>
              <option>Australie</option>
              <option>Autriche</option>
              <option>Azerbaïdjan</option>
              <option>Bahamas</option>
              <option>Bahreïn</option>
              <option>Bangladesh</option>
              <option>Barbade</option>
              <option>Belgique</option>
              <option>Belize</option>
              <option>Bénin</option>
              <option>Bhoutan</option>
              <option>Biélorussie</option>
              <option>Birmanie (Myanmar)</option>
              <option>Bolivie</option>
              <option>Bosnie-Herzégovine</option>
              <option>Botswana</option>
              <option>Brésil</option>
              <option>Brunei</option>
              <option>Bulgarie</option>
              <option>Burkina Faso</option>
              <option>Burundi</option>
              <option>Cambodge</option>
              <option>Cameroun</option>
              <option>Canada</option>
              <option>Cap-Vert</option>
              <option>Chili</option>
              <option>Chine</option>
              <option>Chypre</option>
              <option>Colombie</option>
              <option>Comores</option>
              <option>Congo</option>
              <option>Corée du Nord</option>
              <option>Corée du Sud</option>
              <option>Costa Rica</option>
              <option>Côte d'Ivoire</option>
              <option>Croatie</option>
              <option>Cuba</option>
              <option>Danemark</option>
              <option>Djibouti</option>
              <option>Dominique</option>
              <option>Égypte</option>
              <option>Émirats arabes unis</option>
              <option>Équateur</option>
              <option>Érythrée</option>
              <option>Espagne</option>
              <option>Estonie</option>
              <option>États-Unis</option>
              <option>Éthiopie</option>
              <option>Fidji</option>
              <option>Finlande</option>
              <option>France</option>
              <option>Gabon</option>
              <option>Gambie</option>
              <option>Géorgie</option>
              <option>Ghana</option>
              <option>Grèce</option>
              <option>Grenade</option>
              <option>Guatemala</option>
              <option>Guinée</option>
              <option>Guinée équatoriale</option>
              <option>Guinée-Bissau</option>
              <option>Guyana</option>
              <option>Haïti</option>
              <option>Honduras</option>
              <option>Hongrie</option>
              <option>Îles Marshall</option>
              <option>Îles Salomon</option>
              <option>Inde</option>
              <option>Indonésie</option>
              <option>Irak</option>
              <option>Iran</option>
              <option>Irlande</option>
              <option>Islande</option>
              <option>Italie</option>
              <option>Jamaïque</option>
              <option>Japon</option>
              <option>Jordanie</option>
              <option>Kazakhstan</option>
              <option>Kenya</option>
              <option>Kirghizistan</option>
              <option>Kiribati</option>
              <option>Koweït</option>
              <option>Laos</option>
              <option>Lesotho</option>
              <option>Lettonie</option>
              <option>Liban</option>
              <option>Liberia</option>
              <option>Libye</option>
              <option>Liechtenstein</option>
              <option>Lituanie</option>
              <option>Luxembourg</option>
              <option>Macédoine du Nord</option>
              <option>Madagascar</option>
              <option>Malaisie</option>
              <option>Malawi</option>
              <option>Maldives</option>
              <option>Mali</option>
              <option>Malte</option>
              <option>Maroc</option>
              <option>Maurice</option>
              <option>Mauritanie</option>
              <option>Mexique</option>
              <option>Micronésie</option>
              <option>Moldavie</option>
              <option>Monaco</option>
              <option>Mongolie</option>
              <option>Monténégro</option>
              <option>Mozambique</option>
              <option>Namibie</option>
              <option>Nauru</option>
              <option>Népal</option>
              <option>Nicaragua</option>
              <option>Niger</option>
              <option>Nigeria</option>
              <option>Niue</option>
              <option>Norvège</option>
              <option>Nouvelle-Zélande</option>
              <option>Oman</option>
              <option>Ouganda</option>
              <option>Ouzbékistan</option>
              <option>Pakistan</option>
              <option>Palaos</option>
              <option>Palestine</option>
              <option>Panama</option>
              <option>Papouasie-Nouvelle-Guinée</option>
              <option>Paraguay</option>
              <option>Pays-Bas</option>
              <option>Pérou</option>
              <option>Philippines</option>
              <option>Pologne</option>
              <option>Portugal</option>
              <option>Qatar</option>
              <option>République centrafricaine</option>
              <option>République démocratique du Congo</option>
              <option>République dominicaine</option>
              <option>Roumanie</option>
              <option>Royaume-Uni</option>
              <option>Russie</option>
              <option>Rwanda</option>
              <option>Saint-Christophe-et-Niévès</option>
              <option>Saint-Marin</option>
              <option>Saint-Vincent-et-les-Grenadines</option>
              <option>Sainte-Lucie</option>
              <option>Salvador</option>
              <option>Samoa</option>
              <option>Sao Tomé-et-Principe</option>
              <option>Sénégal</option>
              <option>Serbie</option>
              <option>Seychelles</option>
              <option>Sierra Leone</option>
              <option>Singapour</option>
              <option>Slovaquie</option>
              <option>Slovénie</option>
              <option>Somalie</option>
              <option>Soudan</option>
              <option>Soudan du Sud</option>
              <option>Sri Lanka</option>
              <option>Suède</option>
              <option>Suisse</option>
              <option>Suriname</option>
              <option>Swaziland</option>
              <option>Syrie</option>
              <option>Tadjikistan</option>
              <option>Tanzanie</option>
              <option>Tchad</option>
              <option>Tchéquie</option>
              <option>Thaïlande</option>
              <option>Timor oriental</option>
              <option>Togo</option>
              <option>Tonga</option>
              <option>Trinité-et-Tobago</option>
              <option>Tunisie</option>
              <option>Turkménistan</option>
              <option>Turquie</option>
              <option>Tuvalu</option>
              <option>Ukraine</option>
              <option>Uruguay</option>
              <option>Vanuatu</option>
              <option>Vatican</option>
              <option>Venezuela</option>
              <option>Vietnam</option>
              <option>Yémen</option>
              <option>Zambie</option>
              <option>Zimbabwe</option>
            </select>
            <label>Pays</label>
          </div>
            <div class="form-floating col-md-3">
            <input type="number" class="form-control" id="address_postalCode" name="address_postalCode">
            <label>Code Postal</label>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column pt-3 pb-3 align-items-center gap-3">
          <button type="submit" class="btn btn-primary w-25">Entrer</button>
          <a href="connexion.php" >Si déjà inscrit</a>
      </div>
    </form>
  </div>
</section>

<!-- puis on ferme avec le contenu du ficher footer.php qui n'est d'autre que la fermeture des balises body et html -->

<!-- includes/inscription.php : lien vers la page inscription a toutes fins utiles -->
<?php
  require_once (__DIR__ . '/../../includes/footer.php');
?>