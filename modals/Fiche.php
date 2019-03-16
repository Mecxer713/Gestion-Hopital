<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 01/09/2018
 * Time: 00:27
 */
class Fiche
{
    private $numF,$dateCreation,$nomComplet,$age,$adresse, $poids, $temperature, $taille, $idPat,$id_user,$etat=false;

    /**
     * Fiche constructor.
     * @param $numF
     * @param $dateCreation
     * @param $nomComplet
     * @param $age
     * @param $adresse
     * @param $poids
     * @param $temperature
     * @param $taille
     * @param $idPat
     * @param bool $etat
     */
    public function __construct($numF, $dateCreation, $nomComplet, $age, $adresse, $poids, $temperature, $taille, $idPat,$id_user, $etat)
    {
        $this->numF = $numF;
        $this->dateCreation = $dateCreation;
        $this->nomComplet = $nomComplet;
        $this->age = $age;
        $this->adresse = $adresse;
        $this->poids = $poids;
        $this->temperature = $temperature;
        $this->taille = $taille;
        $this->idPat = $idPat;
        $this->id_user = $id_user;
        $this->etat = $etat;
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
    public function getIdPat()
    {
        return $this->idPat;
    }

    /**
     * @param mixed $idPat
     */
    public function setIdPat($idPat)
    {
        $this->idPat = $idPat;
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


    /**
     * @return bool
     */
    public function isEtat()
    {
        return $this->etat;
    }

    /**
     * @param bool $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



    public static function creerFicher(Fiche $uneFiche)
    {
            $pdo_connex=Connexion::getConnexion();
            $pdo_query="INSERT INTO t_fiche(numF, dateCreation, nomComplet, age, adresse, poids, temperature, taille,numP,id_user,etat)           
                           VALUES (:id,now(),:noms,:dtN,:adress,:poid,:temp,:taill,:idG,:idu,0);";
            $pdo_select = $pdo_connex->prepare($pdo_query);
            $pdo_select->execute(array(
                'id'=>$uneFiche->getNumF(),
                'noms'=>$uneFiche->getNomComplet(),
                'dtN'=>$uneFiche->getAge(),
                'adress'=>$uneFiche->getAdresse(),
                'poid'=>$uneFiche->getPoids(),
                'temp'=>$uneFiche->getTemperature(),
                'taill'=>$uneFiche->getTaille(),
                'idG'=>$uneFiche->getIdPat(),
                'idu'=>$uneFiche->getIdUser()
                ));
            $pdo_select->closeCursor();
            if($pdo_select) return true;

    }

    public static function changeFiche(Fiche $uneFche)
    {
        $dt=date('Y-m-d');
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="UPDATE t_fiche set dateCreation=:dt,poids=:poid, temperature=:temp, taille=:taille,etat=0 where numF=:id ";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array(
            'id'=>$uneFche->getNumF(),
            'dt'=>$dt,
            'poid'=>$uneFche->getPoids(),
            'temp'=>$uneFche->getTemperature(),
            'taille'=>$uneFche->getTaille()
        ));
        $pdo_select->closeCursor();
        if($pdo_select) return true;
    }
    public static function changeFiche_numF($id)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="UPDATE t_fiche set etat=1 where numF=? ";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($id));
        $pdo_select->closeCursor();
        if($pdo_select) return true;
    }

    public  static  function listerFiche(){
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_fiche ORDER BY dateCreation DESC ";

        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute();
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new fiche($ob-> numF,
                    $ob->dateCreation,
                    $ob->nomComplet,
                    $ob->age,
                    $ob->adresse,
                    $ob->poids,
                    $ob->temperature,
                    $ob->taille,
                    $ob->numP,
                    $ob->id_user,
                    $ob->etat
                );
            }
            return $tableau;
        }
    }
    public  static  function listerFicheJour(){
        $dt=date("Y-m-d");
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_fiche WHERE dateCreation=? AND etat=0";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new fiche($ob-> numF,
                    $ob->dateCreation,
                    $ob->nomComplet,
                    $ob->age,
                    $ob->adresse,
                    $ob->poids,
                    $ob->temperature,
                    $ob->taille,
                    $ob->numP,
                    $ob->id_user,
                    $ob->etat
                );
            }
            return $tableau;
        }
    }
    public  static  function listerFiche_par_NumF($numF){
        $dt=date('Y-m-d');
        $pdo_con= connexion::getConnexion();
        $pdo_query="select * from t_fiche WHERE numF=? AND dateCreation='$dt'";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($numF));
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
                    $ob->numP,
                    $ob->id_user,
                    $ob->etat
                );
            }
            return $tableau;
        }
    }

    public static function NumFiche()
    {
        $charact='abcdefghijklmnopqrstuvwxyz';
        $charact .='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charact .='1234567890';
        $code='';
        for ($i=0;$i<9;$i++)
        {
            $code.=substr($charact,rand()%(strlen($charact)),1);
        }
        return $code;

    }
//--------------------------------------------Fonction Pour Application Mobile------------------------------------------------------//

    public static function Login($nom,$code)
    {
        $pdo_con= connexion::getConnexion();
        $pdo_query="select * from t_fiche WHERE numF=? AND nomComplet=?";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($code,$nom));
        $tableau=array();
        if($pdo_select!= null){
            while ($ob= $pdo_select->fetch(PDO::FETCH_OBJ)){
                $tableau []= new fiche(
                    $ob-> numF,
                    $ob->dateCreation,
                    $ob->nomComplet,
                    $ob->age,
                    $ob->adresse,
                    $ob->nomConjoint,
                    $ob->poids,
                    $ob->temperature,
                    $ob->taille,
                    $ob->numP,
                    $ob->id_user,
                    $ob->etat
                );
            }
            return $tableau;
        }
    }
}