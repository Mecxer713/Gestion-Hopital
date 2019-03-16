<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 31/12/2018
 * Time: 08:06
 */
class Patients
{
    private $id, $nom, $age, $adresse, $tel,$type_pat,$entreprise,$id_user;

    /**
     * Patients constructor.
     * @param $id
     * @param $nom
     * @param $age
     * @param $adresse
     * @param $tel
     * @param $type_pat
     * @param $entreprise
     */
    public function __construct($id, $nom, $age, $adresse, $tel, $type_pat, $entreprise,$id_user)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->age = $age;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->type_pat = $type_pat;
        $this->entreprise = $entreprise;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getTypePat()
    {
        return $this->type_pat;
    }

    /**
     * @param mixed $type_pat
     */
    public function setTypePat($type_pat)
    {
        $this->type_pat = $type_pat;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
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




    public static function addPatient(Patients $patients)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query='INSERT INTO `t_patients`(`id_pat`, `nom_pat`, `age_pat`, `adresse_pat`, `tel_pat`, `type_pat`,`entreprise`,`id_user`) 
                    VALUES (:id,:nom,:age,:adr,:tel,:typ,:entr,:idu)';
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute(array(
           'id'=>$patients->getId(),
           'nom'=>$patients->getNom(),
           'age'=>$patients->getAge(),
           'adr'=>$patients->getAdresse(),
           'tel'=>$patients->getTel(),
           'typ'=>$patients->getTypePat(),
           'entr'=>$patients->getEntreprise(),
           'idu'=>$patients->getIdUser()
        ));
        $pdo_insert->closeCursor();
        if ($pdo_insert) {
            return true;
        }

    }


    public static function changePatient(Patients $patients)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_patients` SET `nom_pat`=:nom,`age_pat`=:age,
                      `adresse_pat`=:adress,`tel_pat`=:tel,`type_pat`=:typ, `entreprise`=:entr `id_user`=:idu WHERE `id_pat`=:id";
        $pdo_update=$pdo_con->prepare($pdo_query);
        $pdo_update->execute(array(
            'id'=>$patients->getId(),
            'nom'=>$patients->getNom(),
            'age'=>$patients->getAge(),
            'adress'=>$patients->getAdresse(),
            'tel'=>$patients->getTel(),
            'typ'=>$patients->getTypePat(),
            'entr'=>$patients->getEntreprise(),
            'idu'=>$patients->getIdUser()
        ));
        $pdo_update->closeCursor();
        if ($pdo_update) {
            return true;
        }

    }



    public static function listePatients()
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="SELECT * FROM `t_patients` ORDER by id_pat DESC ";
        $pdo_select=$pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array());
        $tab=array();
        if ($pdo_select != null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tab [] = new Patients(
                    $ob->id_pat,
                    $ob->nom_pat,
                    $ob->age_pat,
                    $ob->adresse_pat,
                    $ob->tel_pat,
                    $ob->type_pat,
                    $ob->entreprise,
                    $ob->id_user
                );
            }
            return $tab;
        }
    }

    public static function compterPatients(){

        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "SELECT * FROM t_patients";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array());
        $cpte = $pdo_select->rowCount();
        return $cpte;
    }


}