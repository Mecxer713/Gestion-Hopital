<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 01/03/2019
 * Time: 18:07
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Utilisateurs.php';
try
{
    $all=Utilisateurs::get_all_users_blocked();
    if(isset($_GET['id']))
    {
        extract($_GET);
        $done=Utilisateurs::UnblocquerUtilisateur($id);
        if ($done)
        {
            header('location: index2.php?action=Lock_user');
        }
    }

}catch (Exception $ex)
{
    die(include_once 'controls/erreur.control.php');
}
include_once 'views/medecin_directeur/Lock_user.view.php';