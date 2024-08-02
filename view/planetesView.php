<?php include "include/header.php";?>


<div class="container mt-4">
        <p><a class="btn btn-secondary" href="?">Revenir à l'accueil</a></p>
        <h1 class="mb-4">
            Liste des planètes
            <?php if (!empty($_GET['categorie'])): ?>
            <!-- Si une categorie de trie a été séléctionné on l'affiche pour plus de clareté -->
               <span class="badge bg-info"><?= htmlentities($planetes[0]->getCategorie()) ?></span>
            <?php endif; ?>
        </h1>
            
            <a class="btn btn-primary mt-3" href="?page=planet&action=create">Ajouter une planète</a>
            <?php if (!empty($_GET['search'])): ?>
                <h2 class="mb-4">
                <!-- Si une recherche a été éffectuée on l'affiche pour plus de clareté -->
                    Résultat pour la recherche sur: "<em><?= htmlentities($_GET['search']) ?></em>"
                </h2>
            <?php endif; ?>

        <div class="row g-4">
            <?php foreach ($planetes as $planeteObject): ?>
                <div class="col-md-4">
                    <div class="card">
                    <img src="<?= htmlentities($planeteObject->getImgUrl()) ?>" alt="<?= htmlentities($planeteObject->getNom()) ?>" class="card-img-top img-fluid" style="min-height: 150px; max-height: 150px; object-fit: cover;">                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="?page=planet&planete_id=<?= $planeteObject->getId() ?>" class="text-decoration-none"><?= htmlentities($planeteObject->getNom()) ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</div>

<?php include "include/footer.php";?>
