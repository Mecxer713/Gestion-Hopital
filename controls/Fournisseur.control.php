<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 09:13
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Fournisseur.php';



try {
    $listeFour = Fournisseur::listeFour();


    $errors = array();

    if (isset($_POST['sauve']))
    {
        if (not_empty(['nom', 'adr', 'tel'])) {
            extract($_POST);
            $idu = $_SESSION['idUser'];
            if (mb_strlen($nom) < 3) $errors[] = 'Le nom doit contenir au moins 3 carateres';
            if (mb_strlen($adr) < 7) $errors[] = 'L&apos;adresse doit contenir au moins 7 carateres';
            if (!verifyPhone($tel)) {
                $errors[] = 'Le numero de telephone doit contenir 10 chiffres';
            }
            if (count($errors) == 0) {
                $four = new Fournisseur(0, '', $nom, $adr, $tel, $idu);
                if (Fournisseur::addFourn($four)) {
                    $_SESSION['success'];
                    header('location: index2.php?action=Fournisseur');
                } else {
                    $errors[] = "Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                    save_input_data();
                }

            } else {
                save_input_data();
            }
        } else {
            $errors[] = "Veuillez remplir tous les champs s'il vous plait";
            save_input_data();
        }


    } elseif(isset($_POST['modif']))
    {
        if(not_empty(['id','nom', 'adr', 'tel'])){
            extract($_POST);
            $idu = $_SESSION['idUser'];
            if (mb_strlen($nom) < 3) $errors[] = 'Le nom doit contenir au moins 3 carateres';
            if (mb_strlen($adr) < 7) $errors[] = 'L&apos;adresse doit contenir au moins 7 carateres';
            if (!verifyPhone($tel))
            {
                $errors[] = 'Le numero de telephone doit contenir 10 chiffres';
            }
            if (count($errors) == 0)
            {
                $four = new Fournisseur($id, '', $nom, $adr, $tel, $idu);
                if (Fournisseur::ChangeFourn($four)) {
                    $_SESSION['success'];
                    header('location: index2.php?action=Fournisseur');
                } else {
                    $errors[] = "Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                    save_input_data();
                }

            } else
            {
                save_input_data();
            }
        }else
        {
            $errors[] = "Veuillez remplir tous les champs s'il vous plait lol";
            save_input_data();
        }
    }else
    {
        clear_input_data();
    }


}catch (Exception $ex)
{
    //echo "Error : ".$ex->getMessage();
    include'controls/erreur.control.php';
}
include_once 'views/medecin_directeur/fournisseur.view.php';