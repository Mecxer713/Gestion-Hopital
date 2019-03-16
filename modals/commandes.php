<?php

/**
 * Created by PhpStorm.
 * User: Kamungu
 * Date: 11/01/2019
 * Time: 16:51
 */
class commandes
{
    private $num_cmd, $num_produit, $nom_produit, $prix_unit, $qte, $unite_mesure, $prix_total, $id_user;
    private $bdd;

    /**
     * commandes constructor.
     * @param $num_cmd
     * @param $num_produit
     * @param $nom_produit
     * @param $prix_unit
     * @param $qte
     * @param $unite_mesure
     * @param $prix_total
     * @param $id_user
     * @param $bdd
     */
    public function __construct($num_cmd, $num_produit, $nom_produit, $prix_unit, $qte, $unite_mesure, $prix_total, $id_user)
    {
        $this->num_cmd = $num_cmd;
        $this->num_produit = $num_produit;
        $this->nom_produit = $nom_produit;
        $this->prix_unit = $prix_unit;
        $this->qte = $qte;
        $this->unite_mesure = $unite_mesure;
        $this->prix_total = $prix_total;
        $this->id_user = $id_user;

    }


    /**
     * @return string
     */
    public function getNumCmd()
    {
        return $this->num_cmd;
    }

    /**
     * @param string $num_cmd
     */
    public function setNumCmd($num_cmd)
    {
        $this->num_cmd = $num_cmd;
    }


    /**
     * @return string
     */
    public function getNumProduit()
    {
        return $this->num_produit;
    }

    /**
     * @param string $num_produit
     */
    public function setNumProduit($num_produit)
    {
        $this->num_produit = $num_produit;
    }

    /**
     * @return string
     */
    public function getNomProduit()
    {
        return $this->nom_produit;
    }

    /**
     * @param string $nom_produit
     */
    public function setNomProduit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }

    /**
     * @return string
     */
    public function getPrixUnit()
    {
        return $this->prix_unit;
    }

    /**
     * @param string $prix_unit
     */
    public function setPrixUnit($prix_unit)
    {
        $this->prix_unit = $prix_unit;
    }

    /**
     * @return string
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param string $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
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
    public function getPrixTotal()
    {
        return $this->prix_total;
    }

    /**
     * @param string $prix_total
     */
    public function setPrixTotal($prix_total)
    {
        $this->prix_total = $prix_total;
    }

    /**
     * @return string
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param string $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }



    public static function addCommande(commandes $commandes)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_commande`(`num_cmd`, `date_creation`, `num_produit`, `nom_produit`, `prix_unit`, `qte`, `unite_mesure`, `prix_total`, `id_user`)
          VALUES (:nmcmd,now(),:np,:desi,:pu,:qte,:unit,:pt,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'nmcmd'=>$commandes->getNumCmd(),
            'np'=>$commandes->getNumProduit(),
            'desi'=>$commandes->getNomProduit(),
            'pu'=>$commandes->getPrixUnit(),
            'qte'=>$commandes->getQte(),
            'unit'=>$commandes->getUniteMesure(),
            'pt'=>$commandes->getPrixTotal(),
            'idu'=>$commandes->getIdUser()
        ]);
        if ($pdo_insert) return true;

    }

    public static function changeComande(commandes $commandes)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_commande` SET `date_creation`=now(),`num_cmd`=:nmcmd,`nom_produit`=:desi,`prix_unit`=:pu,
                    `qte`=:qte,`unite_mesure`=:unit,`prix_total`=:pt,`id_user`=:idu WHERE `num_produit`=:np";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'nmcmd'=>$commandes->getNumCmd(),
            'np'=>$commandes->getNumProduit(),
            'desi'=>$commandes->getNomProduit(),
            'pu'=>$commandes->getPrixUnit(),
            'qte'=>$commandes->getQte(),
            'unit'=>$commandes->getUniteMesure(),
            'pt'=>$commandes->getPrixTotal(),
            'idu'=>$commandes->getIdUser()
        ]);
        if ($pdo_insert) return true;


    }


    public static function listeDetailCmd()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query='select * from t_commande';
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new commandes(
                    $ob->num_cmd,
                    $ob->num_produit,
                    $ob->nom_produit,
                    $ob->prix_unit,
                    $ob->qte,
                    $ob->unite_mesure,
                    $ob->prix_total,
                    $ob->id_user
                );
            }
            return $tab;
        }
    }
    public static function listeDetailCmdById($num_cmd)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_commande WHERE num_cmd='$num_cmd'";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new commandes(
                    $ob->num_cmd,
                    $ob->num_produit,
                    $ob->nom_produit,
                    $ob->prix_unit,
                    $ob->qte,
                    $ob->unite_mesure,
                    $ob->prix_total,
                    $ob->id_user
                );
            }
            return $tab;
        }
    }

}