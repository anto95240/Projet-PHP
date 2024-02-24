<?php
  $currentPage = '';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/../../config/database.php');

  // Inclue les fonctions de gestion des produits
  require_once (__DIR__ . '/btn_admin/btn_add.php');
  require_once (__DIR__ . '/btn_admin/btn_mod.php');
  require_once (__DIR__ . '/btn_admin/btn_suppr.php');
  require_once (__DIR__ . '/affichage.php');

  // Récupère le nombre de produits par catégorie
  $countProductsByCategory = countProductsByCategory();

  // Récupère les informations du produit depuis la DB  
  $Produits = afficherProduit();

    // Vérifie si une catégorie est sélectionnée
    if (isset($_GET['category'])) {
        // Récupère les produits de la catégorie sélectionnée
        $selectedCategory = $_GET['category'];
        $Produits = afficherProduitParCategorie($selectedCategory);
        $numFilters = 1; // Il y a 1 seul filtre  appliqué
    } else {
        $numFilters = 0; // Il n'y a aucun filtre 
    }

    // Vérifie si le lien "Supprimer le filtre" a été cliqué
    if (isset($_GET['clear_filter'])) {
        $Produits = afficherProduit();
        unset($_GET['category']); // Supprime la variable de catégorie de l'URL
        $numFilters = 0; // Réinitialise le nombre de filtres à 0
    }

?>

<!-- <body> -->

<style>
    .tab-registers { 
        font-size: 20px;
    }
    .tabs .tab-registers {
        display: flex;
        background-color: RGB(255, 255, 255);
    }
    .tabs .btn_onglet {
        padding: 0.5em;
        background-color: RGB(255, 255, 255);
        border: none;
        font: inherit;
    }
    .tabs .tab-bodies {
        padding: 0.5em;
        background-color: RGB(235, 235, 235);
        flex-grow: 1;
        overflow-y: auto;
    }
    .tab-bodies{
        width: 100%;
    }
    .tabs button.active-tab {
        background-color: rgb(235, 235, 235);
    }
</style>

<main id="admin">
    <div class="py-5 tabs d-flex flex-column align-items-center">
        <div class="d-flex gap-5 tab-registers">
            <button class="btn_onglet active-tab text-decoration-underline">AJOUTER</button>
            <button class="btn_onglet text-decoration-underline">MODIFIER</button>
            <button class="btn_onglet text-decoration-underline">SUPPRIMER</button>
        </div>
        <div class="tab-bodies">
            <!-- start Tab creation -->
            <?php
                require_once (__DIR__ . '/tab_bodies/creation.php');
            ?>
            <!--end Tab creation -->

            <!--start Tab modification -->
            <?php
                require_once (__DIR__ . '/tab_bodies/modif.php');
            ?>
            <!--end Tab modification -->

            <!--start Tab suppresssion -->
            <?php
                require_once (__DIR__ . '/tab_bodies/suppr.php');
            ?>
            <!--end Tab suppresssion -->
        </div>
    </div>
</main>

<!-- Permet de faire la gestion des différent onglet (Ajouter, Modifier, Supprimer) -->
<script>
    Array.from(document.querySelectorAll('.tabs')).forEach((tab_container, TabID) => {
        const registers = tab_container.querySelector('.tab-registers');
        const bodies = tab_container.querySelector('.tab-bodies');

        Array.from(registers.children).forEach((el, i) => {
          el.setAttribute('aria-controls', `${TabID}_${i}`)
          bodies.children[i]?.setAttribute('id', `${TabID}_${i}`)
        
          el.addEventListener('click', (ev) => {
            let activeRegister = registers.querySelector('.active-tab');
            activeRegister.classList.remove('active-tab')
            activeRegister = el;
            activeRegister.classList.add('active-tab')
            changeBody(registers, bodies, activeRegister)
          })
      })
    })


    function changeBody(registers, bodies, activeRegister) {
        Array.from(registers.children).forEach((el, i) => {
            if (bodies.children[i]) {
                bodies.children[i].style.display = el == activeRegister ? 'block' : 'none'
            }
        
            el.setAttribute('aria-expanded', el == activeRegister ? 'true' : 'false')
        })
    }
</script>

<?php
require_once (__DIR__ . '/../../includes/footer.php');
?>
