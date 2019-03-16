<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 13/01/2019
 * Time: 14:44
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Fiche.php';
require_once 'modals/Consultation.php';
require_once 'modals/Planning.php';
require_once 'modals/Notif_Heberg.php';
try
{

    $listeFiche=Fiche::listerFicheJour();
    $listeFicheC=null;
    $listeFiche=Fiche::listerFicheJour();
   $listePlan=Planning::listerPlanningall();
    $find=false;
    $errors=array();

    if (isset($_POST['load'])) {
        // var_dump($_POST);die();
        if (isset($_POST['choix'])) {
            extract($_POST);
            $listeFicheC = Consultation::listerFiche__NumF($choix);
            $listeF = Fiche::listerFiche_par_NumF($choix);

        }
    }elseif(isset($_POST['sauve']))
    {
        if(not_empty(['numFP','nom','age','adresse','poid','temp','tail','obs','plan','intern','motif','id']))
        {
            extract($_POST);
            $dte=strtotime($plan);
            $dt=date('Y-m-d',$dte);
            $hr=date('H:i:s',$dte);
            $hre=date('H',strtotime($hr));
            foreach ($listePlan as $item)
            {
                if($dt==date('Y-m-d',strtotime($item->getDateC())))
                {
                    $dteP=date('H:i:s',strtotime($item->getHeure()));


                    if ($hre==date('H',strtotime($dteP)))
                    {
                        $min=date('i',strtotime($hr));
                        $min1=date('i',strtotime($dteP));
                        $dif=(int)$min- (int)$min1;


                        if($dif<30)
                        {
                            $errors[]='les dates pour les planning champs <u>Prochain rendez-vous</u> est invalide(&eacute;cart des dates requis 30 minutes) ';
                            $find=true;
                            break;
                        }
                    }
                }


            }
            if ($find)
            {
                save_input_data();
                header('Location: ./index2.php?action=Consultation&error&nom='.$nom);
            }else
            {
                if($intern=='inter')
                {
                    $fiche_cons=new Consultation(0,$numFP,0,$nom,$age,$adresse,$poid,$temp,$tail,$obs,$plan,$id);
                    $result=Consultation::creerConsultation($fiche_cons);
                    $plan=new Planning(0,$numFP,$nom,$dt,$hr,0);
                    $notifheberg=new Notif_Heberg(0,$numFP,$nom,$motif,0);

                    if($result)
                    {
                        Fiche::changeFiche_numF($numFP);
                        Planning::changeFiche_numF($numFP);
                        Planning::creerPlannig($plan);
                        Notif_Heberg::addNotification($notifheberg);

                        $listeF = Fiche::listerFiche_par_NumF($numFP);
                        $listeFicheC = Consultation::listerFiche__NumF($numFP);
                        header('Location: ./index2.php?action=Consultation');
                    }
                    else{
                        save_input_data();
                        header('Location: ./index2.php?action=Consultation&error&nom='.$nom);
                    }
                }else{
                    $fiche_cons=new Consultation(0,$numFP,0,$nom,$age,$adresse,$poid,$temp,$tail,$obs,$plan,$id);
                    $result=Consultation::creerConsultation($fiche_cons);
                    $plan=new Planning(0,$numFP,$nom,$dt,$hr,0);
                    if($result)
                    {
                        Fiche::changeFiche_numF($numFP);
                        Planning::changeFiche_numF($numFP);
                        Planning::creerPlannig($plan);

                        $listeF = Fiche::listerFiche_par_NumF($numFP);
                        $listeFicheC = Consultation::listerFiche__NumF($numFP);
                        header('Location: ./index2.php?action=Consultation');
                    }
                    else{
                        save_input_data();
                        header('Location: ./index2.php?action=Consultation&error&nom='.$nom);
                    }
                }

            }


        }
    }elseif(isset($_GET['numF']))
    {
        $listeF=null;
        $listeFicheC = Consultation::listerFiche__NumF($_GET['numF']);
    }else{
        clear_input_data();
    }



}catch (Exception $ex)
{
   include_once 'controls/erreur.control.php';
}
include_once 'views/infirmier_principal/consultation.view.php';