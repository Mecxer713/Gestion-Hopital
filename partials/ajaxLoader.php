<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 24/02/2019
 * Time: 10:21
 */
require_once '../globals/config.php';
require_once '../modals/Connexion.php';
require_once '../modals/produit.php';
require_once '../modals/EnteteCmd.php';
require_once '../partials/functions.php';
try
{
    $send=[];
    if(isset($_POST['codeArt']))
    {
        extract($_POST);
        $prod=produit::getProductById($codeArt);
        if($prod != null)
        {
            echo $prod;

        }else
        {
            echo 'Aucun Produit';
        }

    }elseif (isset($_POST['descr']))
    {
        extract($_POST);
        $data=EnteteCmd::Recherche($descr);

        foreach ($data as $item)
        {
            $index['numcmd']=$item->getNumCmd();
            $index['datecmd']=$item->getDateCreation();
            $index['descr']=$item->getDescr();
            $index['nomfss']=$item->getNomFournisseur();
            $index['dev']=$item->getDevise();
            array_push($send,$index);
        }
        echo json_encode($send);

    }elseif(isset($_POST['numcmd']))
    {
        extract($_POST);
        $done=EnteteCmd::valideBonCaissier($numcmd);
        if($done) echo 'done';
    }elseif(isset($_POST['nmcmd']))
    {
        extract($_POST);
        $done=EnteteCmd::valideBonMed($nmcmd);
        if($done) echo 'done';
    }elseif(isset($_POST['nmcmdrejt']))
    {
        extract($_POST);
        $done=EnteteCmd::RejeterBon($nmcmdrejt);
        if($done) echo 'done';
    }

}
catch (Exception $ex)
{
    echo $ex;
  // die(include_once 'controls/erreur.control.php');
}