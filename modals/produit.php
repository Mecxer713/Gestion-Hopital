<?php

/**
 * Created by PhpStorm.
 * User: Kamungu
 * Date: 13/01/2019
 * Time: 12:02
 */
class produit
{
    private $id_prod, $designation_prod, $unite_mesure, $prix_unitaire, $quantite, $date_expiration,
        $nom_fournisseur, $localisation, $seuil_min, $seuil_max ;
    private $bdd;
    /**
     * produit constructor.
     * @param $id_prod
     * @param $designation_prod
     * @param $unite_mesure
     * @param $prix_unitaire
     * @param $quantite
     * @param $date_expiration
     * @param $nom_fournisseur
     * @param $localisation
     * @param $seuil_min
     * @param $seuil_max
     */
    public function __construct($id_prod='', $designation_prod='', $unite_mesure='', $prix_unitaire='', $quantite=''
        , $date_expiration='', $nom_fournisseur='', $localisation='', $seuil_min='', $seuil_max='')
    {
        $this->id_prod = $id_prod;
        $this->designation_prod = $designation_prod;
        $this->unite_mesure = $unite_mesure;
        $this->prix_unitaire = $prix_unitaire;
        $this->quantite = $quantite;
        $this->date_expiration = $date_expiration;
        $this->nom_fournisseur = $nom_fournisseur;
        $this->localisation = $localisation;
        $this->seuil_min = $seuil_min;
        $this->seuil_max = $seuil_max;
        $this->bdd=Connexion::getConnexion();

    }

    /**
     * @return string
     */
    public function getIdProd()
    {
        return $this->id_prod;
    }

    /**
     * @param string $id_prod
     */
    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }

    /**
     * @return string
     */
    public function getDesignationProd()
    {
        return $this->designation_prod;
    }

    /**
     * @param string $designation_prod
     */
    public function setDesignationProd($designation_prod)
    {
        $this->designation_prod = $designation_prod;
    }

    /**
     * @return string
     */
    public function getUniteMesure()
    {
        return $this->unite_mesure;
    }







    /**
     * @param string $unite_mesure
     */
    public function setUniteMesure($unite_mesure)
    {
        $this->unite_mesure = $unite_mesure;
    }

    /**
     * @return string
     */
    public function getPrixUnitaire()
    {
        return $this->prix_unitaire;
    }

    /**
     * @param string $prix_unitaire
     */
    public function setPrixUnitaire($prix_unitaire)
    {
        $this->prix_unitaire = $prix_unitaire;
    }

    /**
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param string $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return string
     */
    public function getDateExpiration()
    {
        return $this->date_expiration;
    }

    /**
     * @param string $date_expiration
     */
    public function setDateExpiration($date_expiration)
    {
        $this->date_expiration = $date_expiration;
    }

    /**
     * @return string
     */
    public function getNomFournisseur()
    {
        return $this->nom_fournisseur;
    }

    /**
     * @param string $nom_fournisseur
     */
    public function setNomFournisseur($nom_fournisseur)
    {
        $this->nom_fournisseur = $nom_fournisseur;
    }

    /**
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return string
     */
    public function getSeuilMin()
    {
        return $this->seuil_min;
    }

    /**
     * @param string $seuil_min
     */
    public function setSeuilMin($seuil_min)
    {
        $this->seuil_min = $seuil_min;
    }

    /**
     * @return string
     */
    public function getSeuilMax()
    {
        return $this->seuil_max;
    }

    /**
     * @param string $seuil_max
     */
    public function setSeuilMax($seuil_max)
    {
        $this->seuil_max = $seuil_max;
    }

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
    }
    public function AddProduits()
    {
        // $this->bdd=Connexion::getConnexion();
        $req=$this->bdd->prepare('INSERT INTO t_produits SET id_prod=?, designation_prod=?, unite_mesure=?, prix_unitaire=?, 
        quantite=?, date_expiration=?, nom_fournisseur=?, localisation=?, seuil_min=?, seuil_max=?');
        $req->execute(array(
            $this->id_prod,
            $this->designation_prod,
            $this->unite_mesure,
            $this->prix_unitaire,
            $this->quantite,
            $this->date_expiration,
            $this->nom_fournisseur,
            $this->localisation,
            $this->seuil_min,
            $this->seuil_max

        ));
        if($req){
            return true;
        }


    }
    public function getallproduit(){
        $req=$this->bdd->prepare('SELECT * FROM t_produits');
        $req->execute();
        return $req->fetchAll();
    }

    public static function getProductById($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_produits where id_prod='$id'";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if($pdo_select->rowCount()==1)
        {
            foreach ($pdo_select->fetchAll() as $r) {
               $desi = $r['designation_prod'];
            }
            return $desi;
        }else
            return '';

    }

}