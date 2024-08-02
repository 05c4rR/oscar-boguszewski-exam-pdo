<?php
// --------------------------------
// Contrôleur des planètes
// --------------------------------
use App\Model\Planete;
use App\Model\PlaneteManager;


if (!empty($_GET['action'])) {
    // GESTION DES FORMULAIRES CREATE // UPDATE // DELETE
    if ($_GET['action'] == 'create') {
        if (!empty($_POST)) {
            if (!empty($_POST['imgUrl']) && !empty($_POST['nom']) && !empty($_POST['categorie']) && !empty($_POST['diametre']) && $_POST['gravite'] !='' && !empty($_POST['lienNasa'])) {
                try {
                    $planete = new Planete; 
                    $planete->hydrate($_POST['imgUrl'], $_POST['nom'], $_POST['categorie'], intval($_POST['diametre']), floatval($_POST['gravite']), $_POST['lienNasa']); 
                    $id = PlaneteManager::createOne($planete);
                    $success = 'La planète a bien été ajoutée !';

                } catch (Exception $e) {
                    $error = $e->getMessage();
                }

            } else {
                $error = 'Tous les champs sont obligatoires';
            }
        } 
        require_once 'view/form/createPlaneteView.php';
    // UPDATE
    } elseif ($_GET['action'] == 'update') {
        
        if (!empty($_GET['planete_id'])) {
            $planete = PlaneteManager::getOne(intval($_GET['planete_id'])); 
            if (!empty($_POST)) { 
                if (!empty($_POST['imgUrl']) && !empty($_POST['nom']) && !empty($_POST['categorie']) && !empty($_POST['diametre']) && $_POST['gravite'] !='' && !empty($_POST['lienNasa'])) {

                    try {
                        $planete->hydrate($_POST['imgUrl'], $_POST['nom'], $_POST['categorie'], intval($_POST['diametre']), floatval($_POST['gravite']), $_POST['lienNasa']);
                        PlaneteManager::update($planete);
                        $success = "La planète a bien été mise à jour";
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    }

                } else {
                    $error = 'Tous les champs sont obligatoires';
                }

            } require_once "view/form/updatePlaneteView.php";
        } else {
            require_once 'view/404View.php';
        }
    // DELETE
    } elseif ($_GET['action'] == 'delete') { 
        if (!empty($_GET['planete_id'])) { 
            try {
                $planete = PlaneteManager::getOne(intval($_GET['planete_id'])); 
                if (!empty($_POST['confirm'])) {
                    if ($_POST['confirm'] == "OUI") { 
                        try {
                            PlaneteManager::delete($planete); 
                            $success = "La planète a bien été supprimée";

                        } catch (Exception $e) {
                            $error = $e->getMessage();
                        }
                        
                    } else {
                        header('Location: ?page=planet&planete_id='.$planete->getId()); 
                    }

                } require_once 'view/form/deletePlaneteView.php';

            } catch (Exception $e) {
                require_once 'view/404View.php';
            }

        } 
    }

} elseif (!empty($_GET['planete_id'])) {

    try {
        $planete = PlaneteManager::getOne(intval($_GET['planete_id']));
        require_once 'view/planeteView.php';
    } catch (Exception $error) {
        require_once 'view/404View.php';
    }
    
} elseif (!empty($_GET['categorie'])) {
    if ($_GET['categorie']) {
        $planetes = PlaneteManager::getByCategorie($_GET['categorie']);
        require_once 'view/planetesView.php';
    }else {
        $planetes = PlaneteManager::getAll();
        require_once 'view/planetesView.php';
    }
} else {
    if (!empty($_GET['search'])) {
        try {
            $planetes = PlaneteManager::getAllBy($_GET['search']);
        } catch (Exception $e) {
            require_once 'view/404View.php';
        }
    } else {
        $planetes = PlaneteManager::getAll();
    }
    require_once 'view/planetesView.php';
}
