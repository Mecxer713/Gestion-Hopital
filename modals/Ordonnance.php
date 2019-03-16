<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 09:24
 */
class Ordonnance
{
    private $num_ordonnance, $nom_malade, $age, $sexe, $poids, $datedes, $nom_medecin, $medicaments, $prix_tot, $id_user;

    /**
     * Ordonnance constructor.
     * @param $num_ordonnance
     * @param $nom_malade
     * @param $age
     * @param $sexe
     * @param $poids
     * @param $datedes
     * @param $nom_medecin
     * @param $medicaments
     * @param $prix_tot
     * @param $id_user
     */
    public function __construct($num_ordonnance, $nom_malade, $age, $sexe, $poids, $datedes, $nom_medecin, $medicaments, $prix_tot, $id_user)
    {
        $this->num_ordonnance = $num_ordonnance;
        $this->nom_malade = $nom_malade;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->poids = $poids;
        $this->datedes = $datedes;
        $this->nom_medecin = $nom_medecin;
        $this->medicaments = $medicaments;
        $this->prix_tot = $prix_tot;
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getNumOrdonnance()
    {
        return $this->num_ordonnance;
    }

    /**
     * @param mixed $num_ordonnance
     */
    public function setNumOrdonnance($num_ordonnance)
    {
        $this->num_ordonnance = $num_ordonnance;
    }

    /**
     * @return mixed
     */
    public function getNomMalade()
    {
        return $this->nom_malade;
    }

    /**
     * @param mixed $nom_malade
     */
    public function setNomMalade($nom_malade)
    {
        $this->nom_malade = $nom_malade;
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
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
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
    public function getDatedes()
    {
        return $this->datedes;
    }

    /**
     * @param mixed $datedes
     */
    public function setDatedes($datedes)
    {
        $this->datedes = $datedes;
    }

    /**
     * @return mixed
     */
    public function getNomMedecin()
    {
        return $this->nom_medecin;
    }

    /**
     * @param mixed $nom_medecin
     */
    public function setNomMedecin($nom_medecin)
    {
        $this->nom_medecin = $nom_medecin;
    }

    /**
     * @return mixed
     */
    public function getMedicaments()
    {
        return $this->medicaments;
    }

    /**
     * @param mixed $medicaments
     */
    public function setMedicaments($medicaments)
    {
        $this->medicaments = $medicaments;
    }

    /**
     * @return mixed
     */
    public function getPrixTot()
    {
        return $this->prix_tot;
    }

    /**
     * @param mixed $prix_tot
     */
    public function setPrixTot($prix_tot)
    {
        $this->prix_tot = $prix_tot;
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