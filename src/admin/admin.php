<?php
  require_once (__DIR__ . '/../../includes/header.php');
?>

<main>

        <div class="py-4">
            <div class="container-fluid d-flex">
                <div class="container create col-4">
                    <div class="row d-flex flex-column">
                        <h5>Création de produit</h5>
                        <div class="form-column">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Nom</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Prenom</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Prenom">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="CoUrRiEl">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Mot de Passe</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Mot de Passe">
                          </div>
                        </div>
                    </div>
                </div>
                <div class="container cat col-2 py-5">
                    <div class="row">
                        <h5>Liste des catégories</h5>
                    </div>
                </div>

                <div class="container product col-6 text-center py-5">
                    <div class="row">
                        <div class="col-6 my-1">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-5 my-1">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-5 my-1">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>

    </main>

<?php
  require_once (__DIR__ . '/../../includes/footer.php');
?>