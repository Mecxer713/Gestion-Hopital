<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 11/01/2019
 * Time: 16:13
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Fiche.php';

try{
    $listeF=Fiche::listerFiche();
    $errors=[];
    if(isset($_POST['sauve']))
    {
        if(not_empty(['idPat','nom','age','adresse','poid','temp','tail']))
        {
            extract($_POST);
            $listeF=Fiche::listerFiche();
            $numFiche='';
            $find=false;
            foreach ($listeF as $item)
            {
                if ($idPat==$item->getIdPat())
                {
                    $find=true;
                    $numFiche=$item->getNumF();
                    break;
                }
            }
            if(!$find)
            {
                $numFiche=Fiche::NumFiche();
                foreach ($listeF as $item)
                {
                    if ($numFiche==$item->getNumF())
                    {
                        $numFiche=Fiche::NumFiche();
                    }
                }
                if($poid<0|| $poid>150)
                {
                    $errors[]='La valeur tapez dans le champs <u>Poids</u> n&apos;est pas valide(valeur entre 0 et 250)';
                }
                if($temp<34 || $temp>39)
                {
                    $errors[]='La valeur tapez dans le champs <u>Temperature</u> n&apos;est pas valide(valeur entre 34 et 39)';
                }
                if($tail<0 || $tail>2)
                {
                    $errors[]='La valeur tapez dans le champs <u>Taille</u> n&apos;est pas valide(valeur entre 0 et 2)';
                }
                if (count($errors)==0)
                {
                    $uneFiche=new Fiche($numFiche,0,$nom,$age,$adresse,$poid,$temp,$tail,$idPat,0);
                    $result=Fiche::creerFicher($uneFiche);

                }else{
                    save_input_data();
                }


            }else
            {
                if($poid<0|| $poid>150)
                {
                    $errors[]='La valeur tapez dans le champs <u>Poids</u> n&apos;est pas valide(valeur entre 0 et 250)';
                }
                if($temp<34 || $temp>39)
                {
                    $errors[]='La valeur tapez dans le champs <u>Temperature</u> n&apos;est pas valide(valeur entre 34 et 39)';
                }
                if($tail<0 || $tail>2)
                {
                    $errors[]='La valeur tapez dans le champs <u>Taille</u> n&apos;est pas valide(valeur entre 0 et 2)';
                }
                if (count($errors)==0)
                {
                    $uneFiche=new Fiche($numFiche,0,$nom,$age,$adresse,$poid,$temp,$tail,$idPat,0);
                    $result=Fiche::changeFiche($uneFiche);
                }else{
                    save_input_data();
                }
            }

            if ($result)
            {
                clear_input_data();
                header('Location: index2.php?action=Fiche');
            }

        }else{
            clear_input_data();
        }
    }elseif (isset($_POST['modif']))
    {
        //var_dump($_POST);die();
        if(not_empty(['numF','nom','age','adresse','poid','temp','tail','idPat'])) {
            extract($_POST);
            if ($poid < 0 || $poid > 150) {
                $errors[] = 'La valeur tapez dans le champs <u>Poids</u> n&apos;est pas valide(valeur entre 0 et 250)';
            }
            if ($temp < 34 || $temp > 39) {
                $errors[] = 'La valeur tapez dans le champs <u>Temperature</u> n&apos;est pas valide(valeur entre 34 et 39)';
            }
            if ($tail < 0 || $tail > 2) {
                $errors[] = 'La valeur tapez dans le champs <u>Taille</u> n&apos;est pas valide(valeur entre 0 et 2)';
            }
            if (count($errors) == 0) {
                $uneFiche = new Fiche($numF, 0, $nom, $age, $adresse, $poid, $temp, $tail, $idPat, 0);
                $result = Fiche::changeFiche($uneFiche);
            }else{save_input_data();}

            if ($result) {
                clear_input_data();
                header('Location: index2.php?action=Fiche');
            }
        }
    }else
    {
        clear_input_data();
    }


}catch (Exception $ex)
{
    die(include_once 'controls/error.control.php');
}
include_once 'views/infirmier/fiche.view.php';