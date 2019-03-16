<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 15/01/2019
 * Time: 22:17
 */
class Chambre
{
    private $id, $localisation, $numero, $capacite,$id_user, $etat;

    /**
     * Chambre constructor.
     * @param $id
     * @param $localisation
     * @param $numero
     * @param $capacite
     * @param $id_user
     * @param $etat
     */
    public function __construct($id, $localisation, $numero, $capacite, $id_user, $etat)
    {
        $this->id = $id;
        $this->localisation = $localisation;
        $this->numero = $numero;
        $this->capacite = $capacite;
        $this->id_user = $id_user;
        $this->etat = $etat;
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
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
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
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



}