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
require_once 'modals/receptions.php';
require_once 'modals/Entetercp.php';
require_once 'modals/EnteteCmd.php';
require_once 'modals/commandes.php';


try{

    //var_dump($_POST); die();
        $listeEnten=Entetercp::listeEntetercp();
        $listeCmd = EnteteCmd::listeEntete();
        $errors=array();
    if(isset($_POST['sauve']))
    {
        //var_dump($_POST);die();

        if(not_empty(array('numrcp','dtcmd','nmfss','numcmd','numprod','desi','qtecmd','qtercp','um','pt')))
        {
            var_dump($_POST);die();
            extract($_POST);
            $idu=$_SESSION['idUser'];
            $entetercp=new Entetercp($numrcp,$datecmd,$nomfss,$idu);
            $find=false;
            foreach ($listeEnten as $item)
            {
                if($item->getNumRcp()==$numrcp)
                {
                    $find=true;
                    break;
                }
            }

            if($find)
            {

                $rcp = new receptions($numprod, $desi, $qtecmd, $qtercp, $um, $pt,$idu);
                $done = receptions::addReception($rcp);
                if($done)
                {
                    save_input_data();
                    header('location: index2.php?action=reception');
                    exit();

                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                    save_input_data();
                }
            }else
            {
                if(EnteteCmd::addEntetercp($entetercp))
                {

                    $rcp = new receptions($num_rcp, $num_cmd, $nom_fournisseur, $num_produit, $nom_produit, $qtecmd, $qtercp, $unitmes, $nomrcp, $prixtot,$idu);
                    $done = receptions::addReception($rcp);
                    if ($done)
                    {
                        save_input_data();
                        header('location: index2.php?action=reception');
                        exit();

                    }else{
                        $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                        save_input_data();
                    }
                }

            }

        }else
        {
            clear_input_data();
        }


    }elseif (isset($_POST['modif'])){

    }elseif (isset($_POST['load']))
    {
        if (isset($_POST['choix'])) {
            extract($_POST);
            $entete=EnteteCmd::listeEnteteById($choix);
            $receptions=commandes::listeDetailCmdById($choix);
        }
    }
    else {
        clear_input_data();
    }
}catch (Exception $ex)
{
    die(include'controls/erreur.control.php');
}
include_once 'views/pharmacie/reception.view.php';
