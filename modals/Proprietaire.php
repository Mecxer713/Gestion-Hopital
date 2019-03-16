<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 25/02/2019
 * Time: 10:55
 */
class Proprietaire
{
    private $id, $dateCreation, $nom_firme, $adresse, $telephone, $logo;

    /**
     * Proprietaire constructor.
     * @param $id
     * @param $dateCreation
     * @param $nom_firme
     * @param $adresse
     * @param $telephone
     * @param $logo
     */
    public function __construct($id, $dateCreation, $nom_firme, $adresse, $telephone, $logo)
    {
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->nom_firme = $nom_firme;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->logo = $logo;
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
    public function getNomFirme()
    {
        return $this->nom_firme;
    }

    /**
     * @param mixed $nom_firme
     */
    public function setNomFirme($nom_firme)
    {
        $this->nom_firme = $nom_firme;
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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public static function addProp(Proprietaire $prop)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_proprietaite`(`id`, `dateCreation`, `nom_firme`, `adresse`, `telephone`, `logo`) 
                    VALUES (:id,now(),:nm,:adr,:tel,:logo)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$prop->getId(),
           'nm'=>$prop->getNomFirme(),
           'adr'=>$prop->getAdresse(),
           'tel'=>$prop->getTelephone(),
           'logo'=>$prop->getLogo()
        ]);
    }

    public static function listeProp()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query='select * from t_proprietaite';
        $pdo_selct=$pdo_con->prepare($pdo_query);
        $pdo_selct->execute();
        $tab=[];
        if($pdo_selct!=null)
        {
            while ($ob=$pdo_selct->fetch(PDO::FETCH_OBJ))
            {
                $tab=new Proprietaire(
                    $ob->id,
                    $ob->dateCreation,
                    $ob->nom_firme,
                    $ob->adresse,
                    $ob->telephone,
                    $ob->logo
                );
            }
            return $tab;
        }


    }


}