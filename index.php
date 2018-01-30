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
            $erreur2 = 'Veuillez choisir un personnage';
        else {
            if ($personnage->getErreur()) {
                $erreur2 = implode(', ', $personnage->getErreur());
            } else {
                $_SESSION['current'] = $personnage;
                header('Location: index.php');
                exit();
            }
        }
    }

    include 'Vue/creation.html.php';


} else {
    $personnage = $_SESSION['current'];
    $pm = new PersonnageManager($bdd);
    $attack = new AttackManager($bdd);
    if (($attacks = $attack->getAllAttacks($personnage)) === [])
        $erreur = 'Ton personnage n\'a aucune technique de combat, il est juste là pour prendre des coups!';
    if (($pm->countPersonnages()) != 1) {
        $adversaires = $pm->getAllPersonnages();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //isset($_POST['fight'])) {
            foreach ($attacks as $atk) {

                if ($_POST['attack'] === $atk->getNom()) {
                    if (($adversaire = $pm->getPersonnageById($_POST['id'])) !== false) {
                        $kick = $personnage->frapper($adversaire, $atk);
                        if ($kick === Personnage::PERSONNAGE_TUE) {
                            $message = 'Ca y est, il est mort. RIP ' . $adversaire->getNom() . '! Qui sera le prochain ?';
                            $pm->deletePersonnage($adversaire);
                            $adversaires = $pm->getAllPersonnages();
                        } else {
                            $message = 'Oooooohhh, Joli '.$atk->getNom().'!<br>'.$adversaire->getNom() . ' a ' . $kick . ' points de dégats';
                            $pm->personnageUpdate($adversaire);
                        }
                        /*                $kick2 = $adversaire->frapper($personnage);
                                        $message2 = 'Au tour de '.$adversaire->getNom().' de lancer une attaque';
                                        if ($kick2 === Personnage::PERSONNAGE_TUE) {
                                            $message2 = 'Ca y est, tu est mort. RIP ' . $personnage->getNom() . '! Qui sera le prochain ?';
                                            $pm->deletePersonnage($personnage);
                                        } else {
                                            $message2 = $personnage->getNom() . ' a ' . $kick2 . ' points de dégats';
                                            $pm->personnageUpdate($personnage);
                                        }*/
                    }
                    break;
                }

            }

        }
    } else {
        $erreur = 'Plus d\'adversaires... Tu es déclaré Maitre des Pokemons';
    }
    include 'Vue/fight.html.php';
}



