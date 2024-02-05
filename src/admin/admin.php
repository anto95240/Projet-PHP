<?php
  require_once (__DIR__ . '/../../includes/header.php');
?>

    <main>
        <div class="py-5">
            <div class="container-fluid d-flex">
                <div class="container create col-3">
                    <div class="row d-flex flex-column">
                        <h5 class="pb-2">Création de produit</h5>
                        <div class="form-column bg-light">
                          <div class="form-group p-2">
                            <label for="inputEmail4">Name</label>
                            <textarea class="form-control" id="inputEmail4" placeholder="Name" rows="1"> </textarea>
                          </div>
                          <div class="form-group p-2">
                            <label for="inputEmail4">Description</label>
                            <textarea class="form-control" id="inputEmail4" placeholder="Description" rows="3"> </textarea>
                          </div>
                          <div class="form-group p-2">
                            <label for="inputEmail4">Categorie</label>
                            <textarea class="form-control" id="inputEmail4" placeholder="Catégorie" rows="1"> </textarea>
                          </div>
                          <div class="form-group p-2">
                            <label for="inputEmail4">Prix</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Prix">
                          </div>
                          <div class="form-group p-2">
                            <label for="inputPassword4">Quantité</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Quantité">
                          </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-7 text-center">
                                <a href="#" class="btn btn-primary">Ajouter</a>
                            </div>
                            <div class="col-0 text-center">
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                            <div class="col pt-3 text-center">
                                <a href="#" class="btn btn-primary">Supprimer</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="container cat col-2 ">
                    <div class="row">
                        <h5>Liste des catégories</h5>
                    </div>
                </div>

                <div class="container product col-6 text-center">
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