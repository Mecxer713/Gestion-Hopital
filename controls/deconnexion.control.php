<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 23/12/2018
 * Time: 10:49
 */
session_start();
require_once '../globals/config.php';
require_once '../modals/Connexion.php';
require_once '../modals/Utilisateurs.php';
require_once '../partials/functions.php';
try
{
    //var_dump($_GET);die();
    if(isset($_GET['id']))
    {
        extract($_GET);
        $userId=Utilisateurs::getSignout($id);
        if($userId)
        {
            unset($_SESSION['idUser'],$_SESSION['username'],$_SESSION['last_action'],$_SESSION['typeUser']);
            header('location: ../');

        }else
        {
            echo "
                <script> 
                 window.reload(true);
                alert('Deconnexion automatique &eacute;chou&eacute;e')
                   
                </script>            
            ";
        }
    }

}catch (Exception $ex)
{
    die (include 'controls/erreur.control.php');
}