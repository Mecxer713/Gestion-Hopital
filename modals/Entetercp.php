<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/02/2019
 * Time: 17:33
 */
class Entetercp
{
    private $num_reception, $numcmd, $datecommande, $nomfss, $iduser;

    /**
     * Entetercp constructor.
     * @param $num_reception
     * @param $numcmd
     * @param $datecommande
     * @param $nomfss
     * @param $iduser
     */
    public function __construct($num_reception, $numcmd, $datecommande, $nomfss, $iduser)
    {
        $this->num_reception = $num_reception;
        $this->numcmd = $numcmd;
        $this->datecommande = $datecommande;
        $this->nomfss = $nomfss;
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getNumReception()
    {
        return $this->num_reception;
    }

    /**
     * @param mixed $num_reception
     */
    public function setNumReception($num_reception)
    {
        $this->num_reception = $num_reception;
    }

    /**
     * @return mixed
     */
    public function getNumcmd()
    {
        return $this->numcmd;
    }

    /**
     * @param mixed $numcmd
     */
    public function setNumcmd($numcmd)
    {
        $this->numcmd = $numcmd;
    }

    /**
     * @return mixed
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * @param mixed $datecommande
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;
    }

    /**
     * @return mixed
     */
    public function getNomfss()
    {
        return $this->nomfss;
    }

    /**
     * @param mixed $nomfss
     */
    public function setNomfss($nomfss)
    {
        $this->nomfss = $nomfss;
    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }
    public static function addEntetercp(Entetercp $rcp)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_entetercp`(`num_reception`,`numcmd`, `datecommande`, `nomfss`, `iduser`) VALUES 
        (:nmrcp,:nmcmd,:dtcmd,:nmfsr,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'nmrcp'=>$rcp->getNumReception(),
            'nmcmd'=>$rcp->getNumCmd(),
            'dtcmd'=>$rcp->getDatecommande(),
            'nmfsr'=>$rcp->getNomfss(),
            'idu'=>$rcp->getIdUser()
        ]);
        if ($pdo_insert) return true;

    }

    public static function listeEntetercp()
    {
        /*$pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetercp";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Entetercp(
                    $ob->num_reception,
                    $ob->numcmd,
                    $ob->datecommande,
                    $ob->nomfss,
                    $ob->iduser

                );
            }
            return $tab;
        }*/

    }



}