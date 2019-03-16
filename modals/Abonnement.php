<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/01/2019
 * Time: 21:01
 */
class Abonnement
{
    private $id, $dateCreation, $nombreAbonne, $mode_paiem, $taux_reduc, $id_entrep, $id_user,$etat=false;

    /**
     * Abonnement constructor.
     * @param $id
     * @param $dateCreation
     * @param $nombreAbonne
     * @param $mode_paiem
     * @param $taux_reduc
     * @param $id_entrep
     * @param $id_user
     * @param bool $etat
     */
    public function __construct($id, $dateCreation, $nombreAbonne, $mode_paiem, $taux_reduc, $id_entrep, $id_user, $etat)
    {
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->nombreAbonne = $nombreAbonne;
        $this->mode_paiem = $mode_paiem;
        $this->taux_reduc = $taux_reduc;
        $this->id_entrep = $id_entrep;
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
    public function getNombreAbonne()
    {
        return $this->nombreAbonne;
    }

    /**
     * @param mixed $nombreAbonne
     */
    public function setNombreAbonne($nombreAbonne)
    {
        $this->nombreAbonne = $nombreAbonne;
    }

    /**
     * @return mixed
     */
    public function getModePaiem()
    {
        return $this->mode_paiem;
    }

    /**
     * @param mixed $mode_paiem
     */
    public function setModePaiem($mode_paiem)
    {
        $this->mode_paiem = $mode_paiem;
    }

    /**
     * @return mixed
     */
    public function getTauxReduc()
    {
        return $this->taux_reduc;
    }

    /**
     * @param mixed $taux_reduc
     */
    public function setTauxReduc($taux_reduc)
    {
        $this->taux_reduc = $taux_reduc;
    }

    /**
     * @return mixed
     */
    public function getIdEntrep()
    {
        return $this->id_entrep;
    }

    /**
     * @param mixed $id_entrep
     */
    public function setIdEntrep($id_entrep)
    {
        $this->id_entrep = $id_entrep;
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



    public static function addAbonnement(Abonnement $abonnement)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_abonne`(`id`, `dateCreation`, `nombreAbonne`, `mode_paiem`, `taux_reduc`, `id_entrep`, `id_user`, `etat`)  
                    VALUES (:id,now(),:nbAb,:mdePaim,:tx,:ide,:idu,0)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'id'=>$abonnement->getId(),
           'nbAb'=>$abonnement->getNombreAbonne(),
           'mdePaim'=>$abonnement->getModePaiem(),
           'tx'=>$abonnement->getTauxReduc(),
           'ide'=>$abonnement->getIdEntrep(),
           'idu'=>$abonnement->getIdUser()
           ]);
        $pdo_insert->closeCursor();
        if($pdo_insert) return true;

    }

    public static function changeAbonnment(Abonnement $abonnement)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_abonne` SET dateCreation`=now(),`nombreAbonne`=:nbAb,`mode_paiem`=:mdePaim,`taux_reduc`=:tx,`id_entrep`=:ide,`id_user`=:idu,`etat`=:etat WHERE id=:id" ;
        $pdo_update=$pdo_con->prepare($pdo_query);
        $pdo_update->execute([
            'id'=>$abonnement->getId(),
            'nbAb'=>$abonnement->getNombreAbonne(),
            'mdePaim'=>$abonnement->getModePaiem(),
            'tx'=>$abonnement->getTauxReduc(),
            'ide'=>$abonnement->getIdEntrep(),
            'idu'=>$abonnement->getIdUser(),
            'etat'=>$abonnement->isEtat()
    ]);
        $pdo_update->closeCursor();
        if($pdo_update) return true;
    }

    public static function allAbonnment()
    {
        $pdo_con = Connexion::getConnexion();
        $pdo_query = "SELECT * FROM `t_abonne` ORDER  by id DESC ";
        $pdo_select = $pdo_con->prepare($pdo_query);
        $pdo_select->execute([]);
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[] =new Abonnement(
                  $ob->id,
                  $ob->dateCreation,
                  $ob->nombreAbonne,
                  $ob->mode_paiem,
                  $ob->taux_reduc,
                  $ob->id_entrep,
                  $ob->id_user,
                  $ob->etat
                );
            }
            return $tab;
        }

    }

}