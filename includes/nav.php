  <header id="navbar">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="logo">
          <img src="/assets/images/logo.png" class="img-fluid" alt="logo">
        </a>  
        <div class="input-group justify-content-center ms-5">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
            </div>
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>   
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
          <ul class="nav-tabs navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-light text-uppercase <?php echo ($currentPage === 'accueil') ? 'active' : ''; ?>" href="/index.php">accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light text-uppercase <?php echo ($currentPage === 'monpanier') ? 'active' : ''; ?>" href="/src/panier/panier.php">mon panier</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light text-uppercase <?php echo ($currentPage === 'moncompte') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                mon compte
              </a>  
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="">Se connecter</a></li>
                <li><a class="dropdown-item" href="/src/user/inscription.php">Voir mon profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Se déconnecter</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light text-uppercase <?php echo ($currentPage === 'commandes') ? 'active' : ''; ?>" href="#">mes commandes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light text-uppercase <?php echo ($currentPage === 'factures') ? 'active' : ''; ?>" href="/src/facture/factures.php">mes factures</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>
