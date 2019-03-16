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
require_once 'modals/Patients.php';
require_once 'modals/Planning.php';

$nbreP = Planning::compterPlan();
$consult = Planning::compterConsultation();
$gestCons = Planning::PatientsCons();
$compte = Patients::compterPatients();
$listeplan=Planning::listerPlanning();
$listeplan2=Planning::listerPlanningall();


try{
    if(isset($_SESSION['typeUser']))
    {
        if($_SESSION['typeUser']=='admin')
        {
            include_once 'views/admin/home_adm.view.php';

        }elseif ($_SESSION['typeUser']=='caissier')
        {
            include_once 'views/caissier/home_caissier.view.php';

        }elseif ($_SESSION['typeUser']=='infirmier')
        {
            include_once 'views/infirmier/home_inf.view.php';

        }elseif ($_SESSION['typeUser']=='infirmier principal')
        {
            include_once 'views/infirmier_principal/home_inf_prin.view.php';

        }elseif ($_SESSION['typeUser']=='magasinier')
        {
            include_once 'views/magasinier/home_mag.view.php';

        }elseif ($_SESSION['typeUser']=='pharmacien')
        {
            include_once 'views/pharmacie/home_pharm.view.php';

        }elseif ($_SESSION['typeUser']=='receptionniste')
        {
            include_once 'views/receptionniste/home_recep.view.php';

        }elseif ($_SESSION['typeUser']=='medecin directeur')
        {
            include_once 'views/medecin_directeur/home_med.view.php';

        }
    }

}catch (Exception $ex)
{
    die(include_once 'control/erreur.control.php');
}
