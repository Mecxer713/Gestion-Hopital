<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 05/03/2019
 * Time: 12:01
 */
class new_produit
{
    private $id_prod,$designation,$unite_mesure,$id_user;

    /**
     * new_produit constructor.
     * @param $id_prod
     * @param $designation
     * @param $unite_mesure
     * @param $id_user
     */
    public function __construct($id_prod, $designation, $unite_mesure, $id_user)
    {
        $this->id_prod = $id_prod;
        $this->designation = $designation;
        $this->unite_mesure = $unite_mesure;
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getIdProd()
    {
        return $this->id_prod;
    }

    /**
     * @param mixed $id_prod
     */
    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getUniteMesure()
    {
        return $this->unite_mesure;
    }

    /**
     * @param mixed $unite_mesure
     */
    public function setUniteMesure($unite_mesure)
    {
        $this->unite_mesure = $unite_mesure;
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

    public static function addNewProduit(new_produit $produit)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_produit`(`id_prod`,`designation`,`unite_mesure`,`id_user`)
                    VALUES (:id_prod,:desi,:um,:idu)";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id_prod'=>$produit->getIdProd(),
            'desi'=>$produit-> getDesignation(),
            'um'=>$produit-> getUniteMesure(),
            'idu'=>$produit-> getIdUser()
        ]);
        if($pdo_insert) return true;

    }

    public static function autoNumber()
    {
        $id='';
        $pdo_con=Connexion::getConnexion();
        $pdo_query='select * from t_produit ORDER BY id_prod DESC limit 1';
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if($pdo_select == null)
        {
            return 'P000000001';
        }else
        {
            foreach ($pdo_select->fetchAll() as $item)
            {
                $id=$item['id_prod'];
                break;
            }
            $nc=(int) substr($id,-9);
            if($nc<10)
            {
                $nc++;
                $inc='P00000000'.$nc;
            }elseif($nc>=10 && $nc<100)
            {
                $nc++;
                $inc='P0000000'.$nc;
            }elseif ($nc>=100 && $nc<1000)
            {
                $nc++;
                $inc='P000000'.$nc;
            }elseif ($nc>=1000 && $nc<10000)
            {
                $nc++;
                $inc='P00000'.$nc;
            }elseif ($nc>=10000 && $nc<100000)
            {
                $nc++;
                $inc='P0000'.$nc;
            }elseif ($nc>=100000 && $nc<1000000)
            {
                $nc++;
                $inc='P000'.$nc;
            }elseif ($nc>=1000000 && $nc<10000000)
            {
                $nc++;
                $inc='P00'.$nc;
            }elseif ($nc>=10000000)
            {
                $nc++;
                $inc='P0'.$nc;
            }
            return $inc;
        }

    }


    public static function listeProd()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query='select * from t_produit';
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new new_produit(
                    $ob->id_prod,
                    $ob->designation,
                    $ob->unite_mesure,
                    $ob->id_user
                );
            }

            return $tab;
        }

    }

    public static function ChangeProd(new_produit $produit)
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="UPDATE `t_produit` SET `designation`=:desi,`unite_mesure`=:um WHERE `id_prod`=:id";
        $pdo_insert=$pdo_con->prepare($pdo_query);
        $pdo_insert->execute([
            'id'=>$produit->getIdProd(),
            'desi'=>$produit-> getDesignation(),
            'um'=>$produit-> getUniteMesure(),

        ]);
        if($pdo_insert) return true;

    }




}