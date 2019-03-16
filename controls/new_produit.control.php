<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 09:13
 */
//require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Patients.php';
require_once 'modals/Abonnement.php';
require_once 'modals/new_produit.php';




try{
    $listeProd = new_produit::listeProd();

    $num_prod=new_produit::autoNumber();
    $errors = array();

    if (isset($_POST['sauve']))
    {
        //var_dump($_POST);die();
        if (not_empty(['id_prod', 'designation', 'unite_mesure'])) {
            $idu=$_SESSION['idUser'];
            extract($_POST);
            if (count($errors) == 0) {
                $prod = new new_produit($id_prod, $designation, $unite_mesure, $idu);
                if (new_produit::addNewProduit($prod)) {
                    $_SESSION['success'];
                    header('location: index2.php?action=new_produit'); exit();
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
        if(not_empty(['id_prod','designation', 'unite_mesure'])){
            extract($_POST);
            $idu = $_SESSION['idUser'];

            if (count($errors) == 0)
            {
                $newprod = new new_produit($id_prod, $designation, $unite_mesure,$idu);
                if (new_produit::ChangeProd($newprod)) {
                    $_SESSION['success'];
                    header('location: index2.php?action=new_produit');
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
    die(include_once 'controls/erreur.control.php');
}
include_once 'views/pharmacie/new_produit.view.php';