<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 09:39
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Entreprise.php';
try{
    $listeEntrep=Entreprise::listeEntreprise();
    $errors=[];
    if(isset($_POST['sauve']))
    {
        $id_user=$_SESSION['idUser'];
        //var_dump($_POST);die();
        if(not_empty(['nom','adresse','tel']))
        {
            extract($_POST);
            if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
            if (!verifyPhone($tel))  $errors[]='Le numero de telephone doit contenir 10 chiffre';
            if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
            if(count($errors)==0)
            {

                if(Entreprise::addEntreprise(new Entreprise(0,$nom,$tel,$adresse,$id_user)))
                {
                    header('location: index2.php?action=New_entreprise');
                    exit();
                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                }
            }else
            {
                save_input_data();
            }
        }

    }elseif (isset($_POST['modif']))
    {
        if(not_empty(['id','nom','adresse','tel','idu']))
        {

            extract($_POST);
            var_dump($_POST); die();
            $idus=$_SESSION['idUser'];
            if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
            if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
            if(count($errors)==0)
            {

                if(Entreprise::changeEntreprise(new Entreprise($id,$nom,$tel,$adresse,$idus)))
                {
                    header('location: index2.php?action=New_entreprise');
                    exit();
                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                }
            }else
            {
                save_input_data();
            }
        }
    }

}catch (Exception $ex)
{
    die(include_once 'control/erreur.control.php');
}
include_once 'views/medecin_directeur/New_entreprise.view.php';