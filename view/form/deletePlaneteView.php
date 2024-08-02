<?php include "include/header.php";?>

<?php 
// Formulaire de suppresion des planètes
if(isset($success)){
    echo "<h3 style='color: green'>$success</h3>";
    echo '<a href="?page=planet">Revenir à la liste des planètes</a>';
} else {
    if(isset($e)){
        echo '<h3 style="color: red">' . $e->getMessage() . '</h3>';
    }
    ?>
        <h2>Êtes-vous sûr de vouloir supprimer cette planète?</h2>
        <form method="post">
            <input type="submit" name="confirm" value="OUI">
            <input type="submit" name="confirm" value="NON">    
        </form>
    <?php
}
?>



<?php include "include/footer.php";?>