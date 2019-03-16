<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 28/02/2019
 * Time: 18:27
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/EnteteCmd.php';
require_once 'modals/commandes.php';
try
{

    $listCmd=EnteteCmd::listeEnteteAValiderMed();
    if(isset($_GET['numcmd']))
    {
        //var_dump($_GET);die();
        extract($_GET);
        $entete=EnteteCmd::listeEnteteById($numcmd);
        $receptions=commandes::listeDetailCmdById($numcmd);
    }

}catch (Exception $ex)
{
    die(include_once 'erreur.control.php');
}
include_once 'views/medecin_directeur/validercmd.view.php';