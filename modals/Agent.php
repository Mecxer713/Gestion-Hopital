<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/02/2019
 * Time: 11:27
 */
class Agent
{
    private $id, $dt,$noms, $telephone, $adresse, $categorie, $qualification, $etatcivil, $nombreEnfant, $id_user;


    /**
     * Agent constructor.
     * @param $id
     * @param $noms
     * @param $telephone
     * @param $adresse
     * @param $categorie
     * @param $qualification
     * @param $etatcivil
     * @param $nombreEnfant
     * @param $id_user
     */
    public function __construct($id, $dt,$noms, $telephone, $adresse, $categorie, $qualification, $etatcivil, $nombreEnfant, $id_user)
    {
        $this->id = $id;
        $this->dt = $dt;
        $this->noms = $noms;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->categorie = $categorie;
        $this->qualification = $qualification;
        $this->etatcivil = $etatcivil;
        $this->nombreEnfant = $nombreEnfant;
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
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * @param mixed $dt
     */
    public function setDt($dt)
    {
        $this->dt = $dt;
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
    public function getEtatcivil()
    {
        return $this->etatcivil;
    }

    /**
     * @param mixed $etatcivil
     */
    public function setEtatcivil($etatcivil)
    {
        $this->etatcivil = $etatcivil;
    }

    /**
     * @return mixed
     */
    public function getNombreEnfant()
    {
        return $this->nombreEnfant;
    }

    /**
     * @param mixed $nombreEnfant
     */
    public function setNombreEnfant($nombreEnfant)
    {
        $this->nombreEnfant = $nombreEnfant;
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

    public static function addAgent(Agent $agent)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_agent`(`id`, `dateCreation`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `etatcivil`, `nombreEnfant`, `id_user`)
                    VALUES (:id,now(),:nm,:tel,:adr,:cat,:qualif,:etatciv,:nbEnf,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$agent->getId(),
            'nm'=>$agent->getNoms(),
            'tel'=>$agent->getTelephone(),
            'adr'=>$agent->getAdresse(),
            'cat'=>$agent->getCategorie(),
            'qualif'=>$agent->getQualification(),
            'etatciv'=>$agent->getEtatcivil(),
            'nbEnf'=>$agent->getNombreEnfant(),
            'idu'=>$agent->getIdUser()
        ]);
        if($pdo_insert) return true;

    }

    public static function changeAgent(Agent $agent)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_agent` SET `dateCreation`=now(),`noms`=:nm,`telephone`=:tel,`adresse`=:adr,`categorie`=:cat,`qualification`=:qualif,
                        `etatcivil`=:etatCiv,`nombreEnfant`=:nbEnf,`id_user`=:idu WHERE id=:id";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$agent->getId(),
           'nm'=>$agent-> getNoms(),
           'tel'=>$agent-> getTelephone(),
           'adr'=>$agent-> getAdresse(),
           'cat'=>$agent-> getCategorie(),
           'qualif'=>$agent-> getQualification(),
           'etatCiv'=>$agent-> getEtatcivil(),
           'nbEnf'=>$agent-> getNombreEnfant(),
           'idu'=>$agent-> getIdUser()

        ]);
        if($pdo_insert) return true;

    }

    public static function listeAgent()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_agent";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select != null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Agent(
                    $ob->id,
                    $ob->noms,
                    $ob->telephone,
                    $ob->adresse,
                    $ob->categorie,
                    $ob->qualification,
                    $ob->etatcivil,
                    $ob->nombreEnfant,
                    $ob->id_user
                );
            }
            return $tab;
        }
        
    }


}