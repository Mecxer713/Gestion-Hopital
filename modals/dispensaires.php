<?php

/**
 * Created by PhpStorm.
 * User: Kamungu
 * Date: 22/01/2019
 * Time: 09:21
 */
class dispensaires
{
    private $num_ord, $nom_malade,$age,$sexe,$poids,$date,$nom_med,$medicaments,$prix_tot;
    private $bdd;
    /**
     * dispensaire constructor.
     * @param $num_ord
     * @param $nom_malade
     * @param $age
     * @param $sexe
     * @param $poids
     * @param $date
     * @param $nom_med
     * @param $medicaments
     * @param $prix_tot
     */
    public function __construct($num_ord='', $nom_malade='', $age='', $sexe='', $poids='', $date='', $nom_med='', $medicaments='', $prix_tot='')
    {
        $this->num_ord = $num_ord;
        $this->nom_malade = $nom_malade;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->poids = $poids;
        $this->date = $date;
        $this->nom_med = $nom_med;
        $this->medicaments = $medicaments;
        $this->prix_tot = $prix_tot;
        $this->bdd=Connexion::getConnexion();
    }

    /**
     * @return mixed
     */
    public function getNumOrd()
    {
        return $this->num_ord;
    }

    /**
     * @param mixed $num_ord
     */
    public function setNumOrd($num_ord)
    {
        $this->num_ord = $num_ord;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getNomMed()
    {
        return $this->nom_med;
    }

    /**
     * @param mixed $nom_med
     */
    public function setNomMed($nom_med)
    {
        $this->nom_med = $nom_med;
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
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
    }

    public function AddDispensaire()
    {
        $req=$this->bdd->prepare('INSERT INTO t_ordonnance SET num_ordonnance=?, nom_malade=?, age=?, sexe=?, poids=?, datedes=?, nom_medecin=?, medicaments=?, prix_tot=?');
        $req->execute(array(
        $this->num_ord,
        $this->nom_malade,
        $this->age,
        $this->sexe,
        $this->poids,
        $this->date,
        $this->nom_med,
        $this->medicaments,
        $this->prix_tot

        ));
        if($req){
            return true;
        }


    }
    public function getalldisp(){
        $req=$this->bdd->prepare('SELECT * FROM t_ordonnance');
        $req->execute();
        return $req->fetchAll();
    }


}