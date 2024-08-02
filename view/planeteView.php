<?php include "include/header.php";?>

<div class="container my-5">
  <a href="?page=planet" class="btn btn-secondary mb-3">Revenir à la liste des planètes</a>
  <h1 class="mb-4"><?= htmlentities($planete->getNom()) ?></h1>
  <div class="row">
    
    <div class="col-md-6">
      <p><strong>Catégorie</strong> : <?= htmlentities($planete->getCategorie()) ?></p>
      <p><strong>Diamètre</strong> : <?= htmlentities($planete->getDiametre()) ?> km</p>
      <p><strong>Gravité</strong> : <?= htmlentities($planete->getGravite()) ?> m/s²</p>
      <a href="<?=htmlentities($planete->getLienNasa())?>" class="btn btn-primary">Lien vers le site de la Nasa</a>
    </div>

    <div class="col-md-6">
      <img src="<?= htmlentities($planete->getImgUrl()) ?>" alt="<?= htmlentities($planete->getNom()) ?>" class="img-fluid">
    </div>
  </div>

  <div class="d-flex justify-content-end mt-4">
    <a href="?page=planet&action=update&planete_id=<?= $planete->getId() ?>" class="btn btn-primary me-2">Modifier la planète</a>
    <a href="?page=planet&action=delete&planete_id=<?= $planete->getId() ?>" class="btn btn-danger">Supprimer la planète</a>
  </div>
</div>

<?php include "include/footer.php";?>