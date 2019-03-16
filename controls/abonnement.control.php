<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/01/2019
 * Time: 20:47
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Abonnement.php';
try{
    $listeAbon=Abonnement::allAbonnment();
    $errors=[];
    if(isset($_POST['sauve']))
    {
        $id_user=$_SESSION['idUser'];
        //var_dump($_POST);die();
        if(not_empty(['nom','adresse','tel','cap','dat','typ','period']))
        {
            extract($_POST);
            $dt=date('Y-m-d',$dat);
            if(mb_strlen($nom)<3) $errors[]='Le Nom est trop court (minimum 3 caracteres)';
            if(mb_strlen($adresse)<5) $errors[]='Veuillez saisir l&apos;adresse complet svp';
            if(!verifyPhone($tel)) $errors[]='Le numero de telephone doit contenir 10 chiffre';
           if(count($errors)==0)
           {
               $abon=new Abonnement(0,0,$nom,$adresse,$tel,$cap,$dt,$typ,$period,0);
               $done=Abonnement::addAbonnement($abon);
               if($done)
               {
                   header('location: index2.php?action=Abonnement');
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
        if(not_empty(['nom','adresse','tel','cap','dat','typ','per']))
        {
            extract($_POST);
            if(mb_strlen($nom)<3) $errors[]='Le Nom est trop court (minimum 3 caracteres)';
            if(mb_strlen($adresse)<5) $errors[]='Veuillez saisir l&apos;adresse complet svp';
            if(! verifyPhone($tel)) $errors[]='Le numero de telephone doit contenir 10 chiffre et appartenir a un reseau local';
            if(count($errors)==0)
            {
                $abon=new Abonnement($id,0,$nom,$adresse,$tel,$cap,$dat,$typ,$per,0);
                $done=Abonnement::changeAbonnment($abon);
                if($done)
                {
                    header('location: index2.php?action=Abonnement');
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
include_once 'views/medecin_directeur/abonnement.view.php';