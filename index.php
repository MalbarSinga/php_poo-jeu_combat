<?php
include 'lib/autoload.php';
include 'lib/pdo.php';

session_start();

// Quitter le jeu -> au clic sur "fermer"
if (isset($_GET['fermer'])) {
    session_destroy();
    setcookie(session_name(), session_id(), time() - 10, '/', null, null, true);
    header('Location: index.php');
    exit();
}


if (!isset($_SESSION['current'])) {
    $pm = new PersonnageManager($bdd);
    $allpersos = $pm->getAllPersonnages();

    if (isset($_POST['newperso'])) {
        $personnage = new Personnage($_POST);


        if ($pm->personnageExists($personnage) !== false) {
            $personnage->setErreur('Nom déjà pris');
        }

        if ($personnage->getErreur())
            $erreur = implode(', ', $personnage->getErreur());
        else {
            $personnage = $pm->addPersonnage($personnage);
            $_SESSION['current'] = $personnage;
            header('Location: index.php');
            exit();
        }
    } else if (isset($_POST['oldperso'])) {
        $personnage = $pm->getPersonnageById($_POST['select']);
        if ($_POST['select'] === '')
            $personnage->setErreur('Veuillez choisir un personnage');

        if ($personnage->getErreur()) {
            $erreur2 = implode(', ', $personnage->getErreur());
        } else {
            $_SESSION['current'] = $personnage;
            header('Location: index.php');
            exit();
        }


    }

    include 'Vue/creation.html.php';


} else {
    $personnage = $_SESSION['current'];
    $pm = new PersonnageManager($bdd);

    if (($pm->countPersonnages()) != 1) {
        $adversaires = $pm->getAllPersonnages();
        if (isset($_POST['fight'])) {
            if (($adversaire = $pm->getPersonnageById($_POST['id'])) !== false) {
                $kick = $personnage->frapper($adversaire);
                if ($kick === Personnage::PERSONNAGE_TUE) {
                    $message = 'Ca y est, il est mort. RIP ' . $adversaire->getNom() . '! Qui sera le prochain ?';
                    $pm->deletePersonnage($adversaire);
                    $adversaires = $pm->getAllPersonnages();
                } else {
                    $message = $adversaire->getNom() . ' a ' . $kick . ' points de dégats';
                    $pm->personnageUpdate($adversaire);
                }
            }
        }
        } else {
        $erreur = 'Plus d\'adversaires... Tu es déclaré Maitre des Pokemons';
    }
    include 'Vue/fight.html.php';
}



