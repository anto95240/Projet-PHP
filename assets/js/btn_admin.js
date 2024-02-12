// Déclarez et initialisez le tableau pour stocker les produits
let products = [];

document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si nous sommes sur la page admin.php
    const isAdminPage = window.location.pathname.includes('admin.php');

    // Récupérer les produits depuis le stockage local
    const savedProducts = localStorage.getItem('products');
    
    if (savedProducts) {
        try {
            products = JSON.parse(savedProducts);
        } catch (error) {
            console.error('Erreur lors de la récupération des produits depuis le stockage local :', error);
        }
    }

    const productList = document.getElementById('productList');

    // Afficher les produits récupérés
    renderProducts();

    // Ajoutez un écouteur d'événements pour le clic sur le bouton "Ajouter"
    document.getElementById('btnAjouter').addEventListener('click', function() {
        // Récupère les valeurs des champs de formulaire
        const productName = document.getElementById('productName').value;
        const productCat = document.getElementById('productCat').value;
        const productPrice = document.getElementById('productPrice').value;
        const productDescription = document.getElementById('productDescription').value;
        const productQuantity = document.getElementById('productQuantity').value;

        // Ajoutez le nouveau produit au tableau
        products.push({
            id: products.length, // Utilisez la longueur du tableau comme identifiant unique
            name: productName,
            category: productCat,
            price: productPrice,
            description: productDescription,
            quantity: productQuantity
        });

        // Mettez à jour l'affichage des produits sur la page
        renderProducts();

        // Enregistre les produits dans le stockage local
        localStorage.setItem('products', JSON.stringify(products));
    });

    function renderProducts() {
        // Videz la liste des produits affichée sur la page
        productList.innerHTML = '';

        // Parcourez tous les produits dans le tableau et ajoutez-les à la liste des produits sur la page
        products.forEach(product => {
            let productCard = `
                <div class="col-md-2 my-1">
                    <div class="card" style="width: 16rem !important;">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">${product.category}</p>
                            <p class="card-text">${product.price}</p>
                            <a href="/src/produit/produit.php?product=${product.id}&image=image${product.id}.jpg" class="btn btn-primary">Voir plus</a>`;

            // Ajouter la checkbox et le bouton "Supprimer" si nous sommes sur la page admin.php
            if (isAdminPage) {
                productCard += `
                            <button class="btn btn-danger delete-product">Supprimer</button>
                            <input class="form-check-input product-checkbox" type="checkbox" value="${product.id}">`;
            }

            productCard += `
                        </div>
                    </div>
                </div>`;

            // Ajoutez la carte du produit à la liste des produits sur la page
            productList.innerHTML += productCard;
        });
    }

    // Gestionnaire d'événements pour la suppression de produit
    productList.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-product')) {
            const productId = parseInt(event.target.closest('.col-md-4').querySelector('.product-checkbox').value);
            const productIndex = products.findIndex(product => product.id === productId);
            products.splice(productIndex, 1);
            renderProducts();
            localStorage.setItem('products', JSON.stringify(products));
        }
    });

    // Ajoutez un écouteur d'événements pour le clic sur le bouton "Supprimer tout"
    document.getElementById('btnSupprimerTout').addEventListener('click', function() {
        // Supprime tous les produits du stockage local
        localStorage.clear();

        // Vide la liste des produits affichée sur la page
        productList.innerHTML = '';
    });

    // Gestionnaire d'événements pour la modification de produit
    productList.addEventListener('change', function(event) {
        if (event.target.matches('.product-checkbox')) {
            const productId = parseInt(event.target.value);
            const selectedProduct = products.find(product => product.id === productId);

            // Remplir les champs du formulaire avec les valeurs du produit sélectionné
            document.getElementById('productName').value = selectedProduct.name;
            document.getElementById('productCat').value = selectedProduct.category;
            document.getElementById('productPrice').value = selectedProduct.price;
            document.getElementById('productDescription').value = selectedProduct.description;
            document.getElementById('productQuantity').value = selectedProduct.quantity;
        }
    });

    // Écouteur d'événements pour le bouton "Modifier"
    document.getElementById('btnModifier').addEventListener('click', function() {
        // Vérifier si une case à cocher est sélectionnée
        const checkedCheckbox = document.querySelector('.product-checkbox:checked');
        if (!checkedCheckbox) {
            alert("Veuillez sélectionner un produit à modifier.");
            return; // Sortir de la fonction si aucune case à cocher n'est sélectionnée
        }

        // Récupérer l'identifiant du produit sélectionné à modifier
        const productId = parseInt(checkedCheckbox.value);
        const selectedProductIndex = products.findIndex(product => product.id === productId);

        // Vérifier si le produit sélectionné existe dans la liste
        if (selectedProductIndex === -1) {
            alert("Le produit sélectionné n'existe pas.");
            return; // Sortir de la fonction si le produit n'est pas trouvé
        }

        // Mettre à jour les valeurs du produit sélectionné avec les valeurs des champs du formulaire
        products[selectedProductIndex].name = document.getElementById('productName').value;
        products[selectedProductIndex].category = document.getElementById('productCat').value;
        products[selectedProductIndex].price = document.getElementById('productPrice').value;
        products[selectedProductIndex].description = document.getElementById('productDescription').value;
        products[selectedProductIndex].quantity = document.getElementById('productQuantity').value;

        // Mettre à jour l'affichage des produits sur la page
        renderProducts();

        // Enregistrer les produits mis à jour dans le stockage local
        localStorage.setItem('products', JSON.stringify(products));
    });

});
