<?php include "include/header.php";?>


<?php 
// Formulaire de création des planètes
if(isset($success)){
    echo "<h3 style='color: green'>$success</h3>";
    echo '<a href="?page=planet&planete_id='.$id.'">Voir la planète créee</a><br>';
    echo '<a href="?page=planet">Revenir à la liste des planètes</a>';
} else {
    if(isset($error)){
        echo '<h3 style="color: red">'.$error.'</h3>';
    }
    ?>
    <h1>Ajouter une nouvelle planète</h1>
    <form method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?=htmlentities($_POST['nom']??'')?>" >
        </div>
        <div>
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" value="<?=htmlentities($_POST['categorie']??'')?>" >
        </div>
        <div>
            <label for="diametre">Diamètre :</label>
            <input type="text" name="diametre" id="diametre" value="<?=htmlentities($_POST['diametre']??'')?>" >
        </div>
        <div>
            <label for="gravite">Gravité</label>
            <input type="text" name="gravite" id="gravite" value="<?=htmlentities($_POST['gravite']??'')?>" >
        </div>
        <div>
            <label for="lienNasa">Lien vers la page de la NASA:</label>
            <input type="text" name="lienNasa" id="lienNasa" value="<?=htmlentities($_POST['lienNasa']??'')?>" >
        </div>
        <div>
            <label for="imgUrl">URL de l'image :</label>
            <input type="text" name="imgUrl" id="imgUrl" value="<?=htmlentities($_POST['imgUrl']??'')?>" >
        </div>
        <div>
            <input type="submit" value="Envoyez">
        </div>
        <a href="?page=planet">Revenir à la liste</a>
    </form>
    <?php
}
?>


<?php include "include/footer.php";?>



