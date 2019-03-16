<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 19/02/2019
 * Time: 12:00
 */
class EnteteCmd
{
    private $num_cmd,$descr, $date_creation, $nom_fournisseur,$devise,$fproforma_url, $id_user;

    /**
     * EnteteCmd constructor.
     * @param $num_cmd
     * @param $descr
     * @param $date_creation
     * @param $nom_fournisseur
     * @param $devise
     * @param $id_user
     */
    public function __construct($num_cmd,  $date_creation, $descr,$nom_fournisseur, $devise,$fproforma_url, $id_user)
    {
        $this->num_cmd = $num_cmd;
        $this->date_creation = $date_creation;
        $this->descr = $descr;
        $this->nom_fournisseur = $nom_fournisseur;
        $this->devise = $devise;
        $this->fproforma_url = $fproforma_url;
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getNumCmd()
    {
        return $this->num_cmd;
    }

    /**
     * @param mixed $num_cmd
     */
    public function setNumCmd($num_cmd)
    {
        $this->num_cmd = $num_cmd;
    }

    /**
     * @return mixed
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @param mixed $descr
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getNomFournisseur()
    {
        return $this->nom_fournisseur;
    }

    /**
     * @param mixed $nom_fournisseur
     */
    public function setNomFournisseur($nom_fournisseur)
    {
        $this->nom_fournisseur = $nom_fournisseur;
    }

    /**
     * @return mixed
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * @param mixed $devise
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;
    }

    /**
     * @return mixed
     */
    public function getFproformaUrl()
    {
        return $this->fproforma_url;
    }

    /**
     * @param mixed $fproforma_url
     */
    public function setFproformaUrl($fproforma_url)
    {
        $this->fproforma_url = $fproforma_url;
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



    public static function addEntete(EnteteCmd $cmd)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_entetecmd`(`num_cmd`, `date_creation`, `description`, `nom_fournisseur`, `valid_caisse`, `valid_med_dir`, `devise`, `fproforma_url`,`id_user`) 
                    VALUES (:nm,now(),:descr,:four,0,0,:dev,:url,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
           'nm'=>$cmd->getNumCmd(),
           'descr'=>$cmd->getDescr(),
           'four'=>$cmd->getNomFournisseur(),
           'dev'=>$cmd->getDevise(),
           'url'=>$cmd->getFproformaUrl(),
           'idu'=>$cmd->getIdUser()
        ]);
        if ($pdo_insert) return true;

    }

    public static function listeEntete()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                  $ob->num_cmd,
                  $ob->date_creation,
                  $ob->description,
                  $ob->nom_fournisseur,
                  $ob->devise,
                  $ob->fproforma_url,
                  $ob->id_user
                );
            }
            return $tab;
        }

    }

    public static function listeEnteteValider()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd where valid_caisse=1 and valid_med_dir=1";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                  $ob->num_cmd,
                  $ob->date_creation,
                  $ob->description,
                  $ob->nom_fournisseur,
                  $ob->devise,
                  $ob->fproforma_url,
                  $ob->id_user
                );
            }
            return $tab;
        }

    }

    public static function listeEnteteAValiderCaissier()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd where valid_caisse=0 and valid_med_dir=0";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                  $ob->num_cmd,
                  $ob->date_creation,
                  $ob->description,
                  $ob->nom_fournisseur,
                  $ob->devise,
                  $ob->fproforma_url,
                  $ob->id_user
                );
            }
            return $tab;
        }

    }
    public static function listeEnteteAValiderMed()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd where valid_caisse=1 and valid_med_dir=0";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                  $ob->num_cmd,
                  $ob->date_creation,
                  $ob->description,
                  $ob->nom_fournisseur,
                  $ob->devise,
                  $ob->fproforma_url,
                  $ob->id_user
                );
            }
            return $tab;
        }

    }

    public static function listeEnteteById($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd where num_cmd='$id'";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                    $ob->num_cmd,
                    $ob->date_creation,
                    $ob->description,
                    $ob->nom_fournisseur,
                    $ob->devise,
                    $ob->fproforma_url,
                    $ob->id_user
                );
            }
            return $tab;
        }

    }

    public static function Recherche($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select * from t_entetecmd where description LIKE '%".$id."%' ";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new EnteteCmd(
                    $ob->num_cmd,
                    $ob->date_creation,
                    $ob->description,
                    $ob->nom_fournisseur,
                    $ob->devise,
                    $ob->fproforma_url,
                    $ob->id_user
                );
            }
            return $tab;
        }

    }

    public static function valideBonCaissier($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="update t_entetecmd set valid_caisse=1,valid_med_dir=0 WHERE num_cmd='$id'";
        $pdo_update=$pdo_con->prepare($pdo_query);
        $pdo_update->execute();
        if ($pdo_update) return true;

    }

    public static function valideBonMed($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="update t_entetecmd set valid_med_dir=1 WHERE num_cmd='$id' and valid_caisse=1";
        $pdo_update=$pdo_con->prepare($pdo_query);
        $pdo_update->execute();
        if ($pdo_update) return true;

    }

    public static function RejeterBon($id)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="update t_entetecmd set valid_caisse=0,valid_med_dir=0 WHERE num_cmd='$id'  ";
        $pdo_update=$pdo_con->prepare($pdo_query);
        $pdo_update->execute();
        if ($pdo_update) return true;
    }

    public static function autoNumber()
    {
        $id='';
        $pdo_con=Connexion::getConnexion();
        $pdo_query='select * from t_entetecmd ORDER BY num_cmd DESC limit 1';
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if($pdo_select == null)
        {
            return 'BC00000001';
        }else
        {
            foreach ($pdo_select->fetchAll() as $item)
            {
                $id=$item['num_cmd'];
                break;
            }
            $nc=(int) substr($id,-8);
           if($nc<10)
           {
               $nc++;
               $inc='BC0000000'.$nc;
           }elseif($nc>=10 && $nc<100)
           {
               $nc++;
               $inc='BC000000'.$nc;
           }elseif ($nc>=100 && $nc<1000)
           {
               $nc++;
               $inc='BC00000'.$nc;
           }elseif ($nc>=1000 && $nc<10000)
           {
               $nc++;
               $inc='BC0000'.$nc;
           }elseif ($nc>=10000 && $nc<100000)
           {
               $nc++;
               $inc='BC000'.$nc;
           }elseif ($nc>=100000 && $nc<1000000)
           {
               $nc++;
               $inc='BC00'.$nc;
           }elseif ($nc>=1000000 && $nc<10000000)
           {
               $nc++;
               $inc='BC0'.$nc;
           }elseif ($nc>=10000000)
           {
               $nc++;
               $inc='BC'.$nc;
           }
            return $inc;
        }

    }


}