<?php

/**
 * Created by PhpStorm.
 * User: Kamungu
 * Date: 18/01/2019
 * Time: 19:18
 */
class receptions
{
    private $num_rcp,$num_cmd, $nom_fournisseur, $num_produit, $nom_produit, $qtecmd,$qtercp,$unitmes,$nomrcp,$prixtot, $idu;
    private $bdd;

    /**
     * reception constructor.
     * @param $num_rcp
     * @param $num_cmd
     * @param $nom_fournisseur
     * @param $num_produit
     * @param $nom_produit
     * @param $qtecmd
     * @param $qtercp
     * @param $unitmes
     * @param $nomrcp
     * @param $prixtot
     */
    public function __construct($num_rcp, $num_cmd, $nom_fournisseur, $num_produit, $nom_produit, $qtecmd, $qtercp, $unitmes, $nomrcp, $prixtot,$idu)
    {
        $this->num_rcp = $num_rcp;
        $this->num_cmd = $num_cmd;
        $this->nom_fournisseur = $nom_fournisseur;
        $this->num_produit = $num_produit;
        $this->nom_produit = $nom_produit;
        $this->qtecmd = $qtecmd;
        $this->qtercp = $qtercp;
        $this->unitmes = $unitmes;
        $this->nomrcp = $nomrcp;
        $this->prixtot = $prixtot;
        $this->idu = $idu;

    }



    /**
     * @return mixed
     */
    public function getNumRcp()
    {
        return $this->num_rcp;
    }

    /**
     * @return mixed
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * @param mixed $idu
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;
    }

    /**
     * @param mixed $num_rcp
     */
    public function setNumRcp($num_rcp)
    {
        $this->num_rcp = $num_rcp;
    }

    /**
     * @return mixed
     */
    public function getNumCmd()
    {
        return $this->num_cmd;
    }

    /**
     * @param mixed $num_cmd
     */
    public function setNumCmd($num_cmd)
    {
        $this->num_cmd = $num_cmd;
    }

    /**
     * @return mixed
     */
    public function getNomFournisseur()
    {
        return $this->nom_fournisseur;
    }

    /**
     * @param mixed $nom_fournisseur
     */
    public function setNomFournisseur($nom_fournisseur)
    {
        $this->nom_fournisseur = $nom_fournisseur;
    }

    /**
     * @return mixed
     */
    public function getNumProduit()
    {
        return $this->num_produit;
    }

    /**
     * @param mixed $num_produit
     */
    public function setNumProduit($num_produit)
    {
        $this->num_produit = $num_produit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nom_produit;
    }

    /**
     * @param mixed $nom_produit
     */
    public function setNomProduit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }

    /**
     * @return mixed
     */
    public function getQtecmd()
    {
        return $this->qtecmd;
    }

    /**
     * @param mixed $qtecmd
     */
    public function setQtecmd($qtecmd)
    {
        $this->qtecmd = $qtecmd;
    }

    /**
     * @return mixed
     */
    public function getQtercp()
    {
        return $this->qtercp;
    }

    /**
     * @param mixed $qtercp
     */
    public function setQtercp($qtercp)
    {
        $this->qtercp = $qtercp;
    }

    /**
     * @return mixed
     */
    public function getUnitmes()
    {
        return $this->unitmes;
    }

    /**
     * @param mixed $unitmes
     */
    public function setUnitmes($unitmes)
    {
        $this->unitmes = $unitmes;
    }

    /**
     * @return mixed
     */
    public function getNomrcp()
    {
        return $this->nomrcp;
    }

    /**
     * @param mixed $nomrcp
     */
    public function setNomrcp($nomrcp)
    {
        $this->nomrcp = $nomrcp;
    }

    /**
     * @return mixed
     */
    public function getPrixtot()
    {
        return $this->prixtot;
    }

    /**
     * @param mixed $prixtot
     */
    public function setPrixtot($prixtot)
    {
        $this->prixtot = $prixtot;
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


    public function AddReception(receptions $receptions)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_reception`(num_produit`, `designation`, `qte_commande`, `qte_receptionne`, `unite_mesure`, `prix_total`, `id_user`)
        VALUES (:nmrcp,:nmprod,:desi,:qtcmd,:qtrcp,:um,:pt,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
                'nmrcp'=>$receptions->getNumRcp(),
                'nmprod'=>$receptions->getNumProduit(),
                'desi'=>$receptions->getNomProduit(),
                'qtcmd'=>$receptions->getQtecmd(),
                'qtrcp'=>$receptions->getQtercp(),
                'um'=>$receptions->getUnitmes(),
                'pt'=>$receptions->getPrixtot(),
                'idu'=>$receptions->getIdu()
        ]);
        if ($pdo_insert) return true;
    }


    public function getallreception(){
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_reception";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Entetercp(
                    $ob->num_produit,
                    $ob->designation,
                    $ob->qte_commande,
                    $ob->qte_receptionne,
                    $ob->unite_mesure,
                    $ob->prix_total
                );
            }
            return $tab;
    }
    }


}