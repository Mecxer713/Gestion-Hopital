<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 01/03/2019
 * Time: 09:45
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
try
{

}catch (Exception $ex)
{
    die(include_once 'controls/erreur.control.php');
}
include_once 'views/medecin_directeur/Online_user.view.php';

