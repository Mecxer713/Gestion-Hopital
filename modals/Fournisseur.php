<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 27/02/2019
 * Time: 12:04
 */
class Fournisseur
{
    private $id_fourn, $dateCreation, $nom_four, $adresse, $telephone, $id_user;

    /**
     * Fournisseeur constructor.
     * @param $id_fourn
     * @param $dateCreation
     * @param $nom_four
     * @param $adresse
     * @param $telephone
     * @param $id_user
     */
    public function __construct($id_fourn, $dateCreation, $nom_four, $adresse, $telephone, $id_user)
    {
        $this->id_fourn = $id_fourn;
        $this->dateCreation = $dateCreation;
        $this->nom_four = $nom_four;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getIdFourn()
    {
        return $this->id_fourn;
    }

    /**
     * @param mixed $id_fourn
     */
    public function setIdFourn($id_fourn)
    {
        $this->id_fourn = $id_fourn;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getNomFour()
    {
        return $this->nom_four;
    }

    /**
     * @param mixed $nom_four
     */
    public function setNomFour($nom_four)
    {
        $this->nom_four = $nom_four;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    public static function addFourn(Fournisseur $four)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_fournisseur`(`id_fourn`, `dateCreation`, `nom_four`, `adresse`, `telephone`, `id_user`)
                    VALUES (:id,now(),:nm,:adr,:tel,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$four->getIdFourn(),
           'nm'=>$four-> getNomFour(),
           'adr'=>$four-> getAdresse(),
           'tel'=>$four-> getTelephone(),
           'idu'=>$four-> getIdUser()
        ]);
        if($pdo_insert) return true;

    }

    public static function ChangeFourn(Fournisseur $four)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_fournisseur` SET `dateCreation`=now(),
                    `nom_four`=:nm,`adresse`=:adr,`telephone`=:tel,`id_user`=:idu WHERE `id_fourn`=:id";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$four->getIdFourn(),
           'nm'=>$four-> getNomFour(),
           'adr'=>$four-> getAdresse(),
           'tel'=>$four-> getTelephone(),
           'idu'=>$four-> getIdUser()
        ]);
        if($pdo_insert) return true;

    }

    public static function listeFour()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_fournisseur";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $tab=[];
        $pdo_select->execute();
        if($pdo_select != null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Fournisseur(
                    $ob->id_fourn,
                    $ob->dateCreation,
                    $ob->nom_four,
                    $ob->adresse,
                    $ob->telephone,
                    $ob->id_user
                );
            }
            return $tab;
        }

    }


}