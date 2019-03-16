<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 15/01/2019
 * Time: 22:17
 */
class Hebergement
{
    private $id, $dateCreation, $numF, $nomComplet, $numero, $localisation,$motif,$id_user;

    /**
     * Hebergement constructor.
     * @param $id
     * @param $dateCreation
     * @param $numF
     * @param $nomComplet
     * @param $numero
     * @param $localisation
     */
    public function __construct($id, $dateCreation, $numF, $nomComplet, $numero, $localisation,$motif,$id_user)
    {
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->numF = $numF;
        $this->nomComplet = $nomComplet;
        $this->numero = $numero;
        $this->localisation = $localisation;
        $this->motif = $motif;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return mixed
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * @param mixed $motif
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
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



}