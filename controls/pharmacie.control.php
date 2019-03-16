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
require_once 'modals/produit.php';



try{
    //var_dump($_POST); die();
    $produit=new Produit();
    $prod=new Produit();
    $produits=$prod->getallproduit();

    $errors=array();

    if(isset($_POST['sauve']))
    {

        if(not_empty(array('numprod','catprod','unitmes','prixunit','qte','dateExp','nomfss','loc','seuilmin','seuilmax')))
        {
            extract($_POST);
            $produits=new Produit($numprod,$catprod,$unitmes,$prixunit,$qte,$dateExp,$nomfss,$loc,$seuilmin,$seuilmax);
            $done=$produits->AddProduits();
            if($done)
            {
                header('location: index2.php?action=pharmacie');
            }else{
                $errors[]="Une erreur s'est produite lors de l'enregistrement\n veuillez contacter l'administrateur du site";
            }

    }

    else
    {
        $errors[]="Veuillez remplir tous les champs s'il vous plait";
    }
    save_input_data();

    }elseif (isset($_POST['modif'])){

    }
    else {
    clear_input_data();
}
}catch (Exception $ex)
{
    //echo "Error : ".$ex->getMessage();
    include'controls/erreur.control.php';
}
include_once 'views/pharmacie/pharmacie.view.php';