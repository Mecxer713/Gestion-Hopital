<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 08:45
 */
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/Utilisateurs.php';
require_once 'globals/init2.php';
try
{
    //var_dump(EnteteCmd::autoNumber());die();
    $all=Utilisateurs::get_all_users();
    if(!isset($_SESSION['ps'])) $_SESSION['ps']='';
        $errors=[];$max=3;
        if(!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;

        } else
        {
            $_SESSION['count']++;
            if($_SESSION['count']>3)
            {
                if (!empty($_SESSION['ps']))
                {
                    $ps=Utilisateurs::get_id_utilisateur_by_pseudo($_SESSION['ps']);
                    if(!empty($ps))
                    {
                        if(Utilisateurs::blocquerUtilisateur($ps))
                        {
                            unset($errors);
                            $_SESSION['errors']="Utilisateur bloqu&eacute;, Veuillez contacter l&apos;administrateur du site svp";
                            clear_input_data();
                        }
                    }

                }
            }
        }

       $find=false;

        if(isset($_POST['login'])) {

            if (not_empty(['pseudo', 'pass']))
            {
                extract($_POST);
                $bdpass='';
                $_SESSION['ps']=$pseudo;
                foreach ($all as $item)
                {
                    if($item->getPseudo()==$pseudo)
                    {
                        $bdpass=$item->getCode();
                        $find=true;
                        break;
                    }

                }
                if($find){
                    if($bdpass==sha1($pass))
                    {
                        $user = new Utilisateurs(0, $pseudo, $pass, '', '');
                        $done = Utilisateurs::getSignin($user);
                        if (!empty($done)) {
                            $_SESSION['idUser'] = Utilisateurs::get_id_utilisateur($user);
                            $_SESSION['username'] = $pseudo;
                            $_SESSION['typeUser']=$done;
                            $_SESSION['last_action']=time();
                            unset($_SESSION['count'],$_SESSION['ps']);
                            header('Location: index2.php');
                        }
                        else {
                            unset($_SESSION['count']);
                            $errors[] = $pseudo . " ";
                            $errors[] = 'Vérifiez votre pseudo ou votre mot de passe! Si la situation persiste contactez le responsable du site!';
                            save_input_data();
                        }
                    }else
                    {
                        $_SESSION['count'];
                        $errors[]="mot de passe incorrect !!!!! il ne vous reste plus que quelques tentatives(tentative max 3) " ;
                        save_input_data();
                    }
                }else{
                    $errors[]="<u>".$pseudo." </u> est inexistant veuillez consulter l&apos;administrateur du site svp!!!" ;
                    save_input_data();
                }



            } else {
                $errors[] = 'Remplir tous les champs !';
                save_input_data();
            }

        } else {
            clear_input_data();
        }


}catch (Exception $ex)
{
    die(include_once 'controls/erreur.control.php');
}
include_once 'views/login.view.php';