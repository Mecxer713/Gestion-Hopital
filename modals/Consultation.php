<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 04/09/2018
 * Time: 18:19
 */
class Consultation
{
private $id, $numF, $dateCreation, $nomComplet, $age, $adresse, $poids, $temperature, $taille, $observation, $dateProchaine, $numP,$id_user;

    /**
     * Consultation constructor.
     * @param $id
     * @param $numF
     * @param $dateCreation
     * @param $nomComplet
     * @param $age
     * @param $adresse
     * @param $poids
     * @param $temperature
     * @param $taille
     * @param $observation
     * @param $dateProchaine
     * @param $numP
     */
    public function __construct($id, $numF, $dateCreation, $nomComplet, $age, $adresse, $poids, $temperature, $taille, $observation, $dateProchaine, $numP,$id_user)
    {
        $this->id = $id;
        $this->numF = $numF;
        $this->dateCreation = $dateCreation;
        $this->nomComplet = $nomComplet;
        $this->age = $age;
        $this->adresse = $adresse;
        $this->poids = $poids;
        $this->temperature = $temperature;
        $this->taille = $taille;
        $this->observation = $observation;
        $this->dateProchaine = $dateProchaine;
        $this->numP = $numP;
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
    public function getNumF()
    {
        return $this->numF;
    }

    /**
     * @param mixed $numF
     */
    public function setNumF($numF)
    {
        $this->numF = $numF;
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
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * @param mixed $nomComplet
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
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
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param mixed $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @param mixed $taille
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @param mixed $observation
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    }

    /**
     * @return mixed
     */
    public function getDateProchaine()
    {
        return $this->dateProchaine;
    }

    /**
     * @param mixed $dateProchaine
     */
    public function setDateProchaine($dateProchaine)
    {
        $this->dateProchaine = $dateProchaine;
    }

    /**
     * @return mixed
     */
    public function getNumP()
    {
        return $this->numP;
    }

    /**
     * @param mixed $numP
     */
    public function setNumP($numP)
    {
        $this->numP = $numP;
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



    public static function creerConsultation(Consultation $uneConsult)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_consultation`(`id`, `numF`, `dateCreation`, `nomComplet`, `age`, `adresse`,`poids`, `temperature`, `taille`,`observation`, `dateProchaine`, `numP`, `id_user`)
                    VALUES (:id,:numF,now(),:noms,:dtN,:adress,:poid,:temp,:taill,:obs,:dtPro,:idG,:idu)";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array(
            'id'=>$uneConsult->getId(),
            'numF'=>$uneConsult->getNumF(),
            'noms'=>$uneConsult->getNomComplet(),
            'dtN'=>$uneConsult->getAge(),
            'adress'=>$uneConsult->getAdresse(),
            'poid'=>$uneConsult->getPoids(),
            'temp'=>$uneConsult->getTemperature(),
            'taill'=>$uneConsult->getTaille(),
            'obs'=>$uneConsult->getObservation(),
            'dtPro'=>$uneConsult->getDateProchaine(),
            'dtG'=>$uneConsult->getNumP(),
            'idu'=>$uneConsult->getIdUser()
        ));
        $pdo_select->closeCursor();
        if($pdo_select) return true;
    }

    public  static  function listerFiche__NumF($numF){
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_consultation WHERE numF=? ORDER BY dateCreation DESC ";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($numF));
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new Consultation(
                    $ob-> id,
                    $ob-> numF,
                    $ob->dateCreation,
                    $ob->nomComplet,
                    $ob->age,
                    $ob->adresse,
                    $ob->poids,
                    $ob->temperature,
                    $ob->taille,
                    $ob->observation,
                    $ob->dateProchaine,
                    $ob->numP,
                    $ob->id_user
                );
            }
            return $tableau;
        }
    } public  static  function listerFicheConsultation(){
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_consultation ORDER BY dateCreation DESC";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute();
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new fiche(
                    $ob-> numF,
                    $ob->dateCreation,
                    $ob->nomComplet,
                    $ob->age,
                    $ob->adresse,
                    $ob->poids,
                    $ob->temperature,
                    $ob->taille,
                    $ob->observation,
                    $ob->dateProchaine,
                    $ob->numP,
                    $ob->id_user
                );
            }
            return $tableau;
        }
    }


}