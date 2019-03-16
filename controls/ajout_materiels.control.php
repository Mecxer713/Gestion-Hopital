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
require_once 'modals/ajout_materiels.php';



try{

    //var_dump($_POST); die();
    $commandes=commandes::listeDetailCmd();

    $errors=array();

    if(isset($_POST['sauve']))
    {
        //var_dump($_POST);die();

        if(not_empty(array('numcmd','nomfss','numprod','designation','pu','qte','unitmesure','prixtot')))
        {
            extract($_POST);
            $commandes=new Commandes($numcmd,$nomfss,$numprod,$designation,$pu,$qte,$unitmesure,$prixtot);
            $done=$commandes->AddCommandes();
            if($done)
            {
                header('location: index2.php?action=Materiels');
            }else{
                $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
            }

        }

        else
        {
            $errors[]="Veuillez remplir tous les champs s'il vous plait";
        }
        save_input_data();

    }elseif (isset($_POST['modif'])){

    }
    else {
        clear_input_data();
    }
}catch (Exception $ex)
{
    echo "Error : ".$ex->getMessage();
    //include'control/erreur.control.php';
}
include_once 'views/magasinier/ajout_materiel.view.php';