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



try{
    $listepat=Patients::listePatients();
    $listeAb=Abonnement::allAbonnment();
    $errors=array();

    if(isset($_POST['sauve']))
    {
        //var_dump($_POST);die();
        if(not_empty(array('nom','postn','age','adresse','tel','type_pat','entrep')))
        {
            extract($_POST);
            $noms=$nom.' '.$postn;
            if(mb_strlen($nom)<3)
            {
                $errors[]='Le Nom est trop cours (minimum 3 carat&egrave;res)';
            }
            if(mb_strlen($postn)<3)
            {
                $errors[]='Le PostNom est trop cours (minimum 3 carat&egrave;res)';
            }

            if (!verifyPhone($tel))
            {
                $errors[]='Le numero de telephone doit contenir 10 chiffre';
            }

            if(count($errors)==0)
            {
                $patients=new Patients(0,$noms,$age,$adresse,$tel,$type_pat,$entrep);

                $done=Patients::addPatient($patients);
                if($done)
                {
                    header('location: index2.php?action=new_patients');
                    exit();
                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                }
            }else
            {
                save_input_data();
            }

        }else
        {
            $errors[]="Veuillez remplir tous les champs s'il vous plait";
            save_input_data();
        }


    }elseif (isset($_POST['modif']))
    {
        //var_dump($_POST);die();
        if(not_empty(array('id','nom','age','adresse','tel','typ','entrep')))
        {
            extract($_POST);

            if(mb_strlen($nom)<3)
            {
                $errors[]='Le Nom est trop cours (minimum 3 carat&egrave;res)';
            }
            if(mb_strlen($postn)<3)
            {
                $errors[]='Le PostNom est trop cours (minimum 3 carat&egrave;res)';
            }
            if(!is_int(age))
            {
                $errors[]='l&apos;&acirc;ge doit &ecirc;tre un entier';
            }
            if (!verifyPhone($tel))
            {
                $errors[]='Le numero de telephone doit contenir 10 chiffre';
            }

            if(count($errors)==0)
            {
                $patients=new Patients($id,$nom,$age,$adresse,$tel,$typ,$entrep);
                $done=Patients::changePatient($patients);
                if($done)
                {
                    header('location: index2.php?action=new_patients'); exit();
                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                }
            }else
            {
                save_input_data();
            }
        }

    }
    else {
        clear_input_data();
    }
}catch (Exception $ex)
{
    die(include_once 'control/erreur.control.php');
}
include_once 'views/receptionniste/new_patiens.view.php';