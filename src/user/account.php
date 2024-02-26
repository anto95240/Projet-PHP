<!-- avec php on récupère l'header du site (la ou on a la balise body qui s'ouvre sans se fermer)-->
<?php
  $currentPage = 'moncompte';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/../admin/affichage.php');
  require_once (__DIR__ . '/../../config/database.php');

  $userId = $_SESSION['user_id'];
  $query = "SELECT a.*, u.*
            FROM user_table u
            INNER JOIN address_table a ON u.UserId = a.UserId
            WHERE u.UserId = :userId"; // Requête SQL pour récupérer les informations de l'utilisateur et de son adresse
  
  $stmt = $access->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer les résultats de la requête
    

// Mise à jour d'un user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
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

  // Mise à jour du user dans la table user_table

  $updateUserQuery = $access->prepare("UPDATE user_table SET Email = ?, Password = ? WHERE UserId = ?");
  $updateUserQuery->execute([$email, $password, $userId]); 

  // Mise à jour du user dans la table address_table
  $updateAddressQuery = $access->prepare("UPDATE address_table SET UserId = ?, FirstName = ?, LastName = ?, StreetAddress = ?, City = ?, State = ?, Country = ?, PostalCode = ? WHERE AddressId = ?");
  $updateAddressQuery->execute([$userId, $firstName, $lastName, $address, $city, $state, $country, $postalCode, $addressId]);

  // Vérifier si les mises à jour ont réussi
  if ($updateAddressQuery && $updateAddressQuery) { 
      $_SESSION['status'] = "Products updated successfully";
  } else {
      $_SESSION['status'] = "Error: Products not updated";
  }

}

?>
<section class="ps-3" >
  <h5 class="mt-4"> Mon Compte </h5>
  <!-- on cree ensuite la structure de la page web ! (ici un formulaire)-->
  <div class="container mt-3 mx-auto mb-5 bg-success rounded p-2" style="background-color: mediumseagreen !important;">
  <!-- Bootstrap permet de simplifier l'utilisation de css par le biais de raccourcis (mt pour margin top 5px/ succes est leur couleur verte, danger rouge...) -->
    <form method="post" class="d-flex flex-column gap-3 ps-5">
      <div class="row d-flex justify-content-beetwen">
        <div class="col-md-6">
          <div class="d-flex gap-5 flex-column">
            <div class="form-group col-md-6">
              <label>Prenom</label>
              <input type="text" class="form-control" name="address_firstName" placeholder="Prenom" value="<?php echo $user['FirstName']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label>Nom</label>
              <input type="text" class="form-control" name="address_lastName" placeholder="Nom" value="<?php echo $user['LastName']; ?>">
            </div>
             <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" name="user_email" placeholder="CoUrRiEl" value="<?php echo $user['Email']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label>Mot de Passe</label>
              <input type="password" class="form-control" name="user_password" placeholder="Mot de Passe" value="<?php echo $user['Password']; ?>">
            </div>
          </div>
        </div>

        <div class="col-md-6 pe-5">
          <div class="d-flex gap-5 flex-column align-items-end">
              <div class="form-group col-md-6">
                <label>Adresse</label>
                <input type="text" class="form-control" name="address_streetAddress" placeholder="1 rue de l'Imposture" value="<?php echo $user['StreetAddress']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label>Ville</label>
                <input type="text" class="form-control" name="address_city"  value="<?php echo $user['City']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label>Etat / Région</label>
                <input type="text" class="form-control" name="address_state"  value="<?php echo $user['State']; ?>" placeholder="Etat / Région">
              </div>
              <div class="form-group col-md-6">
                <label>Pays</label>
                <select name="address_country" class="form-control">
                  <option selected><?php echo $user['Country']; ?></option>
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
              </div>
              <div class="form-group col-md-3">
                <label>Code Postal</label>
                <input type="text" class="form-control" name="address_postalCode" value="<?php echo $user['PostalCode']; ?>">
              </div>
          </div>
        </div>
      </div>
      <button type="submit" name="update_user" class="btn btn-primary w-25 flex-end">Modifier</button>
      <input type="hidden" name="user_userId" value="<?= $user['UserId']; ?>">
      <input type="hidden" name="address_addressId" value="<?= $user['AddressId']; ?>">
    </form>
  </div>
</section>

<!-- puis on ferme avec le contenu du ficher footer.php qui n'est d'autre que la fermeture des balises body et html -->

<!-- includes/inscription.php : lien vers la page inscription a toutes fins utiles -->
<?php
  require_once (__DIR__ . '/../../includes/footer.php');
?>