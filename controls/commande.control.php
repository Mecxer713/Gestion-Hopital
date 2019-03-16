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
require_once 'modals/commandes.php';
require_once 'modals/Fournisseur.php';
require_once 'modals/EnteteCmd.php';

try{
    if(isset($_SESSION['cmd']))
    {

        $commandes=commandes::listeDetailCmdById($_SESSION['cmd']);
    }


    $listeEnten=EnteteCmd::listeEntete();
    $listeFour=Fournisseur::listeFour();


    $errors=array();

    if(isset($_POST['sauve']))
    {
       // var_dump($_POST);die();

        if(not_empty(['numcmd','descr','nomfss','dev','codeArt','desi','pu','qte','unit','pt'])) {

            extract($_POST);
            $idu = $_SESSION['idUser'];
            $_SESSION['fss'] = $nomfss;
            $_SESSION['cmd'] = $numcmd;
            $_SESSION['descr'] = $descr;
            $_SESSION['dev'] = $dev;
            $_SESSION['url'] = '';
            $url = '';
            $ext = false;
            /*---------------UPLOAD FICHIER-------------------------*/

            /*---------------UPLOAD FICHIER-------------------------*/
       // var_dump($ext);die();
            $_SESSION['url']=$url;

            $find = false;
            foreach ($listeEnten as $item) {
                if ($item->getNumCmd() == $numcmd) {
                    $find = true;
                    break;
                }
            }


                if ($find)
                {
                    $cmd = new commandes($numcmd, $codeArt, $desi, $pu, $qte, $unit, $pt, $idu);
                    $done = commandes::addCommande($cmd);
                    if ($done) {
                        header('location: index2.php?action=Commande');
                        exit();

                    } else {
                        $errors[] = "Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                        save_input_data();
                    }
                } else
                    {
                        if (!empty($_FILES)) {
                            //var_dump($_FILES);die();
                            $valide = array('.jpg', '.png', '.gif', '.jpeg', '.docx', '.pdf', '.PDF');
                            $file_name = $_FILES['fichier']['name'];
                            $file_tmp_name = $_FILES['fichier']['tmp_name'];
                            $file_ext = strchr($file_name, '.');
                            $file_type = $_FILES['fichier']['type'];
                            $destinat = 'contents/' . $file_name;
                            $url = 'contents/' . $file_name;

                            if (in_array($file_ext, $valide))
                            {
                                if (move_uploaded_file($file_tmp_name, $destinat)) {
                                    $ext = true;
                                }
                            }
                        }

                        $entetecmd = new EnteteCmd($numcmd, '', $descr, $nomfss, $dev, $url, $idu);
                      if($ext)
                      {
                          if (EnteteCmd::addEntete($entetecmd) ) {

                              $cmd = new commandes($numcmd, $codeArt, $desi, $pu, $qte, $unit, $pt, $idu);
                              $done = commandes::addCommande($cmd);
                              if ($done) {
                                  //$commandes=commandes::listeDetailCmdById($numcmd);
                                  header('location: index2.php?action=Commande');
                                  exit();

                              } else {
                                  $errors[] = "Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                                  save_input_data();
                              }
                          }
                      }
                      else
                      {
                          $errors[] = 'erreurs lors de l&apos;enregistrement verifier tout les champs svp(action sauve)!!!!';
                          save_input_data();
                    }

                }
        }else
        {
            $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
            save_input_data();
        }

    }elseif (isset($_POST['modif']))
    {
        if(not_empty(array('numcmd','descr','nomfss','fichier','codeArt','desi','pu','qte','unit','pt')))
        {
            extract($_POST);
            $cmd=new commandes($numcmd,$codeArt,$desi,$pu,$qte,$unit,$pt,$idu);
            $done=commandes::changeComande($cmd);
            if($done)
            {
                header('location: index2.php?action=Commande');
                exit();

            }else{
                $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
                save_input_data();
            }

        }else{
            $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
            save_input_data();
        }

    }elseif (isset($_POST['load']))
    {

        clear_input_data();
        unset($_SESSION['fss'], $_SESSION['cmd'], $_SESSION['descr'], $_SESSION['dev']);
        header('location: index2.php?action=Commande');
        exit();
    }

}catch (Exception $ex)
{
   die(include'controls/erreur.control.php');
}
include_once 'views/pharmacie/commande.view.php';