<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 13/09/2018
 * Time: 08:31
 */
class Planning
{
    private $id, $numF, $nomComplet, $dateC,$heure,$id_user, $etat=false;

    /**
     * Planning constructor.
     * @param $id
     * @param $numF
     * @param $nomComplet
     * @param $dateC
     * @param $heure
     * @param $etat
     */
    public function __construct($id, $numF, $nomComplet, $dateC,$heure,$id_user, $etat)
    {
        $this->id = $id;
        $this->numF = $numF;
        $this->nomComplet = $nomComplet;
        $this->dateC = $dateC;
        $this->heure = $heure;
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
    public function getDateC()
    {
        return $this->dateC;
    }

    /**
     * @param mixed $dateC
     */
    public function setDateC($dateC)
    {
        $this->dateC = $dateC;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
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


    public static function creerPlannig(Planning $unPlan)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_planning`(`id`, `numF`, `nomComplet`, `dateC`, `heure`,`id_user` `etat`) 
                    VALUES (:id,:numf,:noms,:dt,:hr,:idu,0)";
        $pdo_select=$pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array(
            'id'=>$unPlan->getId(),
            'numf'=>$unPlan->getNumF(),
            'noms'=>$unPlan->getNomComplet(),
            'dt'=>$unPlan->getDateC(),
            'hr'=>$unPlan->getHeure(),
            'idu'=>$unPlan->getIdUser()

        ));
        $pdo_select->closeCursor();
        if($pdo_select) return true;
    }

    public static function changeFiche_numF($id)
    {
        $dt=date("Y-m-d");
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="UPDATE t_planning set etat=1 where numF=? and dateC='$dt' ";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($id));
        $pdo_select->closeCursor();
        if($pdo_select) return true;
    }
    public static function listerPlanning()
    {
        $dt=date("Y-m-d");
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_planning WHERE dateC=? and etat=0 ";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $tableau=array();
        if($pdo_select!= null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Planning(
                    $ob->id,
                    $ob->numF,
                    $ob->nomComplet,
                    $ob->dateC,
                    $ob->heure,
                    $ob->id_user,
                    $ob->etat

                );
            }
            return $tableau;
        }
    }



    public static function listerPlanningall()
    {

        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_planning ORDER by dateC DESC ";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute();
        $tableau=array();
        if($pdo_select!= null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Planning(
                    $ob->id,
                    $ob->numF,
                    $ob->nomComplet,
                    $ob->dateC,
                    $ob->heure,
                    $ob->id_user,
                    $ob->etat

                );
            }
            return $tableau;
        }
    }
    public static function listerPlanning_par_numF($numf)
    {
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_planning WHERE numF=? ";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($numf));
        $tableau=array();
        if($pdo_select!= null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Planning(
                    $ob->id,
                    $ob->numF,
                    $ob->nomComplet,
                    $ob->dateC,
                    $ob->heure,
                    $ob->id_user,
                    $ob->etat

                );
            }
            return $tableau;
        }
    }

    public static function compterPlan(){
        $dt = date('Y-m-d');
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "SELECT * FROM t_planning  WHERE dateC=?";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $cpte = $pdo_select->rowCount();
        return $cpte;
    }
    public static function PatientsCons(){
        $dt = date('Y-m-d');
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "SELECT * FROM t_planning  WHERE dateC=? and etat=1";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $cpte = $pdo_select->rowCount();
        return $cpte;
    }
    public static function compterConsultation(){
        $dt = date('Y-m-d');
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "SELECT * FROM t_planning  ";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $cpte = $pdo_select->rowCount();
        return $cpte;
    }

    //-----------------------Planning du Jour(App Mobile)----------------------------------------//


    public static function listerPlanningJour()
    {
        $dt=date("Y-m-d");
        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_planning WHERE dateC=? ORDER by heure";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($dt));
        $tableau=array();
        if($pdo_select!= null) {
            while ($ob = $pdo_select->fetch(PDO::FETCH_OBJ)) {
                $tableau [] = new Planning(
                    $ob->id,
                    $ob->numF,
                    $ob->nomComplet,
                    $ob->dateC,
                    $ob->heure,
                    $ob->id_user,
                    $ob->etat

                );
            }
            return $tableau;
        }
    }
    public static function PlanningPatiente($numF)
    {

        $pdo_con= connexion::getConnexion();
        $pdo_query= "SELECT * FROM t_planning WHERE numF=? and etat=0 ORDER by heure limit 1";
        $pdo_select=$pdo_con -> prepare($pdo_query);
        $pdo_select->execute(array($numF));
        $find=$pdo_select->rowCount();
        if($find==1) {
            foreach ($pdo_select->fetchAll() as $r) {
                $dt = $r['dateC'];
            }
            return $dt;
        }else{
            return false;
        }
    }
}