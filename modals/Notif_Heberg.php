<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 16/01/2019
 * Time: 10:17
 */
class Notif_Heberg
{
    private $id, $numF, $nomComplet, $motif,$id_user, $etat=false;

    /**
     * Notif_Heberg constructor.
     * @param $id
     * @param $numF
     * @param $nomComplet
     * @param $motif
     * @param $etat
     */
    public function __construct($id, $numF, $nomComplet, $motif,$id_user, $etat)
    {
        $this->id = $id;
        $this->numF = $numF;
        $this->nomComplet = $nomComplet;
        $this->motif = $motif;
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




    public static function addNotification(Notif_Heberg $heberg)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_notifheberg`(`id`, `numF`, `nomComplet`,`motif`,`id_user` `etat`)
                    VALUES (:id,:numf,:nom,:motif,:idu,:etat)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$heberg->getId(),
            'numf'=>$heberg->getNumF(),
            'nom'=>$heberg->getNomComplet(),
            'motif'=>$heberg->getMotif(),
            'idu'=>$heberg->getIdUser(),
            'etat'=>$heberg->isEtat()
        ]);
        $pdo_insert->closeCursor();
        if ($pdo_insert)return true;

    }
}