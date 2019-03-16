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
require_once 'modals/dispensaires.php';


try{

    //var_dump($_POST); die();
    $dispendaire=new Dispensaires();
    $dis=new Dispensaires();
    $dispensaires=$dis->getalldisp();


    $errors=array();

    if(isset($_POST['sauve']))
    {
        //var_dump($_POST);die();

        if(not_empty(array('numord','nommal','age','sexe','poids','datepres','nommed','medpres','prixtot')))
        {
            extract($_POST);
            $dispensaires=new Dispensaires($numord,$nommal,$age,$sexe,$poids,$datepres,$nommed,$medpres,$prixtot);
            $done=$dispensaires->AddDispensaire();
            if($done)
            {
                header('location: index2.php?action=dispensaire');
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
include_once 'views/infirmier_principal/dispensaire.view.php';