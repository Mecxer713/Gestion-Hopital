<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 10:03
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Corps_medical.php';
require_once 'modals/Agent.php';
require_once 'modals/Utilisateurs.php';

try{
    $listeAg=Corps_medical::listeAgent();
    $errors=[];
    if(isset($_POST['sauve']))
    {
        extract($_POST);
        $idu=$_SESSION['idUser'];
        if(not_empty(['type_ag','type_med']) && $_POST['type_ag']=='celibataire' && $_POST['type_med']=='nonmedecin')
        {
           if(not_empty(['nom','tel','adresse','categ','qualif']))
           {
               if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
               if (!verifyPhone($tel))  $errors[]='Le numero de telephone doit contenir 10 chiffre';
               if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
               if((mb_strlen($categ)<7)) $errors[]="Le Categorie est trop court, la valeur minimal est de 7 carat&egrave;res";
               if((mb_strlen($qualif)<7)) $errors[]="Le Qualification est trop court, la valeur minimal est de 7 carat&egrave;res";
               if(count($errors)==0)
               {
                   $unAgent=new Agent(0,$nom,'',$tel,$adresse,$categ,$qualif,$type_ag,0,$idu);
                   if(Agent::addAgent($unAgent))
                   {
                       header('location: index2.php?action=New_user');
                       exit();
                   }else{
                       $errors[]="Une erreur s'est produite lors de l'enregistrement de l&apos;Agent $nom\n veuillez contacter l'administrateur du site";
                   }
               }else
               {
                   save_input_data();
               }
           }else
           {
               save_input_data();
           }
        }
        elseif(not_empty(['type_ag','type_med']) && ($_POST['type_ag']=='marie' || $_POST['type_ag']=='celibataire2') && $_POST['type_med']=='nonmedecin')
        {
            if(not_empty(['nom','tel','adresse','categ','nbEnf','qualif']))
            {
                if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
                if (!verifyPhone($tel))  $errors[]='Le numero de telephone doit contenir 10 chiffre';
                if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
                if((mb_strlen($categ)<7)) $errors[]="Le Categorie est trop court, la valeur minimal est de 7 carat&egrave;res";
                if((mb_strlen($qualif)<7)) $errors[]="Le Qualification est trop court, la valeur minimal est de 7 carat&egrave;res";
                if(count($errors)==0)
                {
                    $unAgent=new Agent(0,$nom,'',$tel,$adresse,$categ,$qualif,$type_ag,$nbEnf,$idu);
                    if(Agent::addAgent($unAgent))
                    {
                        header('location: index2.php?action=New_user');
                        exit();
                    }else{
                        $errors[]="Une erreur s'est produite lors de l'enregistrement de l&apso;Agent $nom\n veuillez contacter l'administrateur du site";
                    }
                }else {
                    save_input_data();
                }
            }else
                save_input_data();

        }
        elseif (not_empty(['type_ag','type_med']) && ($_POST['type_ag']=='marie' || $_POST['type_ag']=='celibataire2') && ($_POST['type_med']=='medecin' || $_POST['type_med']=='adminis'))
        {
            if(not_empty(['nom','tel','adresse','categ','qualif','type_ag','nbEnf','type_med','pseudo','pass']))
            {
                // var_dump($_POST);die();


                    if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
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
                    if(count($errors)==0)
                    {
                        $unAgent=new Agent(0,$nom,'',$tel,$adresse,$categ,$qualif,$type_ag,$nbEnf,$idu);
                        $agent=new Corps_medical(0,$nom,$tel,$adresse,$categ,$qualif,$idu);
                        if(Corps_medical::addCorpMedical($agent))
                        {
                            if(Agent::addAgent($unAgent))
                            {
                                if(Utilisateurs::ajouterUtilisateur(new Utilisateurs(0,$pseudo,$pass,$categ,0)))
                                {
                                    header('location: index2.php?action=New_user');
                                    exit();
                                }else{
                                    $errors[]="Une erreur s'est produite lors de l'enregistrement de l'utilisateur $pseudo \n veuillez contacter l'administrateur du site";
                                }
                            }else{
                                $errors[]="Une erreur s'est produite lors de l'enregistrement de l'Agent $nom \n veuillez contacter l'administrateur du site";
                            }

                        }else{
                            $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                        }
                    }else{
                        save_input_data();
                    }
            }
            else
            {
                save_input_data();
            }
        }
        elseif (not_empty(['type_ag','type_med']) &&  $_POST['type_ag']=='celibataire' && ($_POST['type_med']=='medecin' || $_POST['type_med']=='adminis'))
        {

            if(not_empty(['nom','tel','adresse','categ','qualif','type_ag','type_med','pseudo','pass']))
            {
                //var_dump($_POST);die();



                    if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
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
                    if(count($errors)==0)
                    {
                        $unAgent=new Agent(0,'',$nom,$tel,$adresse,$categ,$qualif,$type_ag,'',$idu);
                        $agent=new Corps_medical(0,$nom,$tel,$adresse,$categ,$qualif,$idu);
                        if(Corps_medical::addCorpMedical($agent))
                        {

                            if(Agent::addAgent($unAgent))
                            {
                                if(Utilisateurs::ajouterUtilisateur(new Utilisateurs(0,$pseudo,$pass,$categ,0)))
                                {
                                    header('location: index2.php?action=New_user');
                                    exit();
                                }else{
                                    $errors[]="Une erreur s'est produite lors de l'enregistrement de l'utilisateur $pseudo \n veuillez contacter l'administrateur du site";
                                }
                            }else{
                                $errors[]="Une erreur s'est produite lors de l'enregistrement de l'Agent $nom \n veuillez contacter l'administrateur du site";
                            }

                        }else{
                            $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                        }
                    }else{
                        save_input_data();
                    }
            }
            else
            {
                save_input_data();
            }
        }


    }elseif (isset($_POST['modif']))
    {
       // var_dump($_POST);die();
        if(not_empty(['id','nom','tel','adresse','categ','qualif','idu']))
        {
            extract($_POST);
            if((mb_strlen($nom)<7)) $errors[]="Le Nom Complet est trop court, la valeur minimal est de 7 carat&egrave;res";
            if((mb_strlen($adresse)<7)) $errors[]="L&aposAdresse est trop court, la valeur minimal est de 7 carat&egrave;res";
            if((mb_strlen($categ)<7)) $errors[]="Le Categorie est trop court, la valeur minimal est de 7 carat&egrave;res";
            if((mb_strlen($qualif)<7)) $errors[]="Le Qualification est trop court, la valeur minimal est de 7 carat&egrave;res";

            if(count($errors)==0)
            {
                $agent=new Corps_medical($id,$nom,$tel,$adresse,$categ,$qualif,$idu);

                $done=Corps_medical::changeAgent($agent);
                if($done)
                {
                    //
                    header('location: index2.php?action=New_user');
                    exit();
                }else{
                    $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                }
            }else{
                echo '
                    <script>alert("Erreur de modification")</script>
                ';
                save_input_data();
            }
        }else{
            save_input_data();
        }

    }
    else
    {
        clear_input_data();
    }

}catch (Exception $ex)
{
    die(include_once 'controls/erreur.control.php');
}
include_once 'views/medecin_directeur/New_user.view.php';