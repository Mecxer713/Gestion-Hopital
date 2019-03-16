<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 09:05
 */
class Entreprise
{
    private $id, $nom_entrep, $telephone, $adresse, $id_user;

    /**
     * Entreprise constructor.
     * @param $id
     * @param $nom_entrep
     * @param $telephone
     * @param $adresse
     * @param $id_user
     */
    public function __construct($id, $nom_entrep, $telephone, $adresse, $id_user)
    {
        $this->id = $id;
        $this->nom_entrep = $nom_entrep;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
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
    public function getNomEntrep()
    {
        return $this->nom_entrep;
    }

    /**
     * @param mixed $nom_entrep
     */
    public function setNomEntrep($nom_entrep)
    {
        $this->nom_entrep = $nom_entrep;
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

    public static function addEntreprise(Entreprise $entreprise)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_entreprise`(`id`, `nom_entrep`, `telephone`, `adresse`, `id_user`) 
                    VALUES (:id,:nom,:tel,:adr,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$entreprise->getId(),
           'nom'=>$entreprise->getNomEntrep(),
           'tel'=>$entreprise->getTelephone(),
           'adr'=>$entreprise->getAdresse(),
           'idu'=>$entreprise->getIdUser()
        ]);
        if ($pdo_insert) return true;

    }

    public static function changeEntreprise(Entreprise $entreprise)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_entreprise` SET `nom_entrep`=:nom ,`telephone`=:tel,
                      `adresse`=:adr,`id_user`=:idu WHERE `id`=:id";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$entreprise->getId(),
            'nom'=>$entreprise->getNomEntrep(),
            'tel'=>$entreprise->getTelephone(),
            'adr'=>$entreprise->getAdresse(),
            'idu'=>$entreprise->getIdUser()
        ]);
        if ($pdo_insert) return true;


    }


    public static function listeEntreprise()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="SELECT * FROM `t_entreprise`";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Entreprise(
                    $ob->id,
                    $ob->nom_entrep,
                    $ob->telephone,
                    $ob->adresse,
                    $ob->id_user
                );
            }
            return $tab;
        }

    }

}