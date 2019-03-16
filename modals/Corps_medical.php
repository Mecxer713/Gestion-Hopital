<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 13:54
 */
class Corps_medical
{
    private $id, $noms, $telephone, $adresse, $categorie, $qualification, $id_user;

    /**
     * Corps_medical constructor.
     * @param $id
     * @param $noms
     * @param $telephone
     * @param $adresse
     * @param $categorie
     * @param $qualification
     * @param $id_user
     */
    public function __construct($id, $noms, $telephone, $adresse, $categorie, $qualification, $id_user)
    {
        $this->id = $id;
        $this->noms = $noms;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->categorie = $categorie;
        $this->qualification = $qualification;
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNoms()
    {
        return $this->noms;
    }

    /**
     * @param mixed $noms
     */
    public function setNoms($noms)
    {
        $this->noms = $noms;
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
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param mixed $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
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

    public static function addCorpMedical(Corps_medical $medical)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_corp_medical`(`id`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `id_user`) 
        VALUES (:id,:nom,:tel,:adr,:cat,:quali,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$medical->getId(),
            'nom'=>$medical->getNoms(),
            'tel'=>$medical->getTelephone(),
            'adr'=>$medical->getAdresse(),
            'cat'=>$medical->getCategorie(),
            'quali'=>$medical->getQualification(),
            'idu'=>$medical->getIdUser()
        ]);
        if($pdo_insert) return true;
    }

    public static function getSignin(Corps_medical $medical)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_corp_medical`(`id`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `id_user`) 
        VALUES (:id,:nom,:tel,:adr,:cat,:quali,0)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$medical->getId(),
            'nom'=>$medical->getNoms(),
            'tel'=>$medical->getTelephone(),
            'adr'=>$medical->getAdresse(),
            'cat'=>$medical->getCategorie(),
            'quali'=>$medical->getQualification()

        ]);
        if($pdo_insert) return true;

    }

    public static function changeAgent(Corps_medical $medical)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_corp_medical` SET `noms`=:nom,
                    `telephone`=:tel,`adresse`=:adr,`categorie`=:cat,`qualification`=:quali,`id_user`=:idu where `id`=:id";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$medical->getId(),
            'nom'=>$medical->getNoms(),
            'tel'=>$medical->getTelephone(),
            'adr'=>$medical->getAdresse(),
            'cat'=>$medical->getCategorie(),
            'quali'=>$medical->getQualification(),
            'idu'=>$medical->getIdUser()
        ]);
        if($pdo_insert) return true;

    }

    public static function listeAgent()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="SELECT `id`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `id_user` FROM `t_corp_medical`";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $tab=[];
        $pdo_select->execute();
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Corps_medical(
                  $ob->id,
                  $ob->noms,
                  $ob->telephone,
                  $ob->adresse,
                  $ob->categorie,
                  $ob->qualification,
                  $ob->id_user
                );
            }
            return $tab;
        }

    }


}