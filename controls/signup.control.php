<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 10:35
 */
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Utilisateurs.php';
require_once 'modals/Corps_medical.php';

try
{
    $errors=[];

    if(!Utilisateurs::chercherAdmin())
    {
        if(isset($_POST['signup']))
        {
            if(not_empty(['pseudo','pass']))
            {
                extract($_POST);
                if((mb_strlen($pseudo)<3)) $errors[]="Le pseudo est trop court, la valeur minimal pour un pseudonyme est de 3 carat&egrave;res";
                if(mb_strlen($pass)<6) $errors[]="Le mot de passe est tres court, la valeur minimal pour un mot de mot de passe est de 6 carat&egrave;res";
                if(count($errors)==0)
                {
                    $user=new Utilisateurs(0,$pseudo,$pass,'admin','',0);
                    $done=Utilisateurs::ajouterUtilisateur($user);
                    if($done)
                    {
                        $logged=Utilisateurs::getSignin($user);
                        if (!empty($logged)) {
                            $_SESSION['idUser'] = Utilisateurs::get_id_utilisateur($user);
                            $_SESSION['username'] = $pseudo;
                            $_SESSION['typeUser']=$logged;
                            $_SESSION['last_action']=time();
                            header('Location: index2.php');
                        }
                        else {
                            $errors[] = $pseudo . " ";
                            $errors[] = 'Vérifiez bien vos informations! Si la situation persiste contactez le responsable du site!';
                            save_input_data();
                        }
                    }else{
                        save_input_data();
                    }
                }else
                {
                    save_input_data();
                }

            }
        }else
        {
            clear_input_data();
        }
        include_once 'views/admin_signup.view.php';

    }
    elseif(!Utilisateurs::chercherMedecin_directeur())
    {
        if(isset($_POST['signupMed']))
        {
            if(not_empty(['noms','tel','adresse','categ','qualif','pseudo','pass']))
            {
                extract($_POST);
                if((mb_strlen($noms)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
                if (!verifyPhone($tel))  $errors[]='Le numero de telephone doit contenir 10 chiffre';
                if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
                if((mb_strlen($categ)<7)) $errors[]="Le Categorie est trop court, la valeur minimal est de 7 carat&egrave;res";
                if((mb_strlen($qualif)<7)) $errors[]="Le Qualification est trop court, la valeur minimal est de 7 carat&egrave;res";
                if((mb_strlen($pseudo)<3))
                {
                    $errors[]="Le Pseudo est trop court, la valeur minimal est de 3 carat&egrave;res";
                }elseif (Utilisateurs::existedPseudo($pseudo))
                {
                    $errors[]="Le Pseudo est d&eacute;j&agrave; utilis&eacute; veuillez choizir un autre";
                }
                if((mb_strlen($pass)<7)) $errors[]="Le mot de pass est trop court, la valeur minimal est de 7 carat&egrave;res";
                if(count($errors)==0)
                {
                    $med=new Corps_medical(0,$noms,$tel,$adresse,$categ,$qualif,0);
                    $user=new Utilisateurs(0,$pseudo,$pass,'medecin directeur',0);
                    $doneMed=Corps_medical::getSignin($med);
                    $doneUser=Utilisateurs::ajouterUtilisateur($user);
                    if($doneMed && $doneUser)
                    {
                        $logged=Utilisateurs::getSignin($user);
                        if (!empty($logged)) {
                            $_SESSION['idUser'] = Utilisateurs::get_id_utilisateur($user);
                            $_SESSION['username'] = $pseudo;
                            $_SESSION['typeUser']=$logged;
                            $_SESSION['last_action']=time();
                            header('Location: index2.php');
                            exit();
                        }
                        else {
                            $errors[] = $noms . " ";
                            $errors[] = 'Vérifiez bien vos informations! Si la situation persiste contactez le responsable du site!';
                            save_input_data();
                        }

                    }
                }else
                {
                    save_input_data();
                }

            }
        }
        else{
            clear_input_data();
        }
        include_once 'views/medecin_dir.view.php';
    }


}catch (Exception $ex)
{
    die(include_once 'controls/erreur.control.php');
}
