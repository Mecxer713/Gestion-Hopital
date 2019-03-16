<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 28/02/2019
 * Time: 10:54
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/EnteteCmd.php';
require_once 'modals/commandes.php';
try
{
    $entete=null;
    $receptions=null;
    $listCmd=EnteteCmd::listeEnteteAValiderCaissier();
    if(isset($_GET['numcmd']))
    {
        //var_dump($_GET);die();
        extract($_GET);
        $entete=EnteteCmd::listeEnteteById($numcmd);
        $receptions=commandes::listeDetailCmdById($numcmd);
        //header('location: index2.php?action=Valider_CMD');exit();
    }

}catch (Exception $ex)
{
    die(include_once 'erreur.control.php');
}
include_once 'views/caissier/commandeliste.view.php';