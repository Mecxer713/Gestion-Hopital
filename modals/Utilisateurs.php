<?php

/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 09:16
 */
class Utilisateurs
{
    private $id;
    private $pseudo;
    private $code;
    private $type=null;
    private $etat=false;

    /**
     * Utilisateurs constructor.
     * @param $id
     * @param $nom
     * @param $pseudo
     * @param $code
     * @param null $type
     * @param bool $etat
     */
    public function __construct($id, $pseudo, $code, $type, $etat)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->code = $code;
        $this->type = $type;
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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

    //cette methode permet de verifier si un autre utilisateur possede le meme pseudo
    public static function existedPseudo($pseudo)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="SELECT id FROM t_utilisateur WHERE pseudo=?";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($pseudo));
        $nb=$pdo_select->rowCount();
        $pdo_select->closeCursor();
        if($nb==1){
            return true;
        }
        else{
            return false;
        }
    }

    public static function ajouterUtilisateur(Utilisateurs $utilisateur)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="INSERT INTO `t_utilisateur`(`id`, `pseudo`, `code`, `type_`,`heure_connect`, `etat`) 
                      VALUES (:id,:ps,:code,:typ,now(),0)";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array(
            'id'=>$utilisateur->getId(),
            'ps'=>$utilisateur->getPseudo(),
            'code'=>sha1($utilisateur->getCode()),
            'typ'=>$utilisateur->getType()
        ));
        $pdo_select->closeCursor();
        if($pdo_select)return true;

    }

    public static function changeUtilisateur(Utilisateurs $utilisateur)
    {
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "UPDATE t_utilisateur SET pseudo=:noms,
                    code=:code,type_=:typ,etat=0 WHERE id=:id";
        $pdo_update = $pdo_connex->prepare($pdo_query);
        $pdo_update->execute(array(
            'id'=>$utilisateur->getId(),
            'noms'=>$utilisateur->getPseudo(),
            'code'=>sha1($utilisateur->getCode()),
            'typ'=>$utilisateur->getType()

        ));
        $pdo_update->closeCursor();
        if($pdo_update) return true;
    }

    //Cette methode s'occupe de la connexion des utilisateurs
    public static function getSignin(Utilisateurs $utilisateur){
        try
        {

            //Si le pseudo correspont
            $pdo_connex=Connexion::getConnexion();
            $pdo_query="SELECT id,type_ FROM t_utilisateur WHERE (pseudo=?  and code=? and etat=0 and etat_autorisation=1 )";
            $pdo_select = $pdo_connex->prepare($pdo_query);
            $pdo_select->execute(array($utilisateur->getPseudo(), sha1($utilisateur->getCode())));
            $find=$pdo_select->rowCount();
            if($find==1) {
                foreach ($pdo_select->fetchAll() as $r) {
                    $id = $r['id'];
                    $type_user = $r['type_'];
                }
                $pdo_connex->exec("update t_utilisateur set etat=1,heure_connect=now() WHERE id=" . $id);
                return $type_user;
            }else
                return '';

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }
    //Cette methode s'occupe de la deconnexion des utilisateurs
    public static function getSignout($id){
        try
        {
            $pdo_connex=Connexion::getConnexion();
            $pdo_query="update t_utilisateur set etat=0 WHERE id=" . $id;
            $pdo_select = $pdo_connex->exec($pdo_query);
            if($pdo_select==1)
            {
                return true;
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }

    //cette methode permet de trouver l'idententifiant de l'utilisateur
    public static function get_id_utilisateur(Utilisateurs $utilisateur){
        try
        {
            /*Si le pseudo correspont*/

            $pdo_connex=Connexion::getConnexion();
            $pdo_query="SELECT id FROM t_utilisateur WHERE (pseudo=?  and code=? and etat=1)";
            $pdo_select = $pdo_connex->prepare($pdo_query);
            $pdo_select->execute(array($utilisateur->getPseudo(),sha1($utilisateur->getCode())));
            $find=$pdo_select->rowCount();
            if($find==1){
                foreach ($pdo_select->fetchAll() as $r)
                {
                    return $r['id'];
                }
            }

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }

    public static function get_id_utilisateur2(Utilisateurs $utilisateur){
        try
        {
            /*Si le pseudo correspont*/

            $pdo_connex=Connexion::getConnexion();
            $pdo_query="SELECT id FROM t_utilisateur WHERE (pseudo=?  and code=?)";
            $pdo_select = $pdo_connex->prepare($pdo_query);
            $pdo_select->execute(array($utilisateur->getPseudo(),sha1($utilisateur->getCode())));
            $find=$pdo_select->rowCount();
            if($find==1){
                foreach ($pdo_select->fetchAll() as $r)
                {
                    return $r['id'];
                }
            }

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }
public static function get_id_utilisateur_by_pseudo($pseudo){
        try
        {
            /*Si le pseudo correspont*/

            $pdo_connex=Connexion::getConnexion();
            $pdo_query="SELECT id FROM t_utilisateur WHERE pseudo='$pseudo' ";
            $pdo_select = $pdo_connex->prepare($pdo_query);
            $pdo_select->execute();
            $find=$pdo_select->rowCount();
            if($find==1){
                foreach ($pdo_select->fetchAll() as $r)
                {
                    return $r['id'];
                }
            }

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }


    // cette methode revoie le pseudo d'un utilisateur grace a son identifiant
    public static function get_type_utilisateur_by_id($id)
    {
        $pdo_connex=Connexion::getConnexion();
        $pdo_query="SELECT type_ FROM t_utilisateur WHERE id=?";
        $pdo_select = $pdo_connex->prepare($pdo_query);
        $pdo_select->execute(array($id));
        foreach ($pdo_select->fetchAll() as $utilisateur)
        {
            return $utilisateur['type_'];
        }
    }

    public static function supprimerUtilisateur($pseudo){
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "DELETE FROM t_utilisateur WHERE pseudo=?";
        $pdo_delete = $pdo_connex->prepare($pdo_query);
        $pdo_delete->execute(array($pseudo));
    }

    public static function refresh($id)
    {
        $pdo_connex = Connexion::getConnexion();
        $pdo_query = "update t_utilisateur set heure_connect=TIMESTAMP WHERE id=?";
        $pdo_delete = $pdo_connex->prepare($pdo_query);
        $pdo_delete->execute(array($id));

    }

    public static function blocquerUtilisateur($id)
    {
        try
        {
            $pdo_connex=Connexion::getConnexion();
            $pdo_query="update t_utilisateur set etat=0, etat_autorisation=0 WHERE id=" . $id;
            $pdo_select = $pdo_connex->exec($pdo_query);
            if($pdo_select==1) return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }
    public static function UnblocquerUtilisateur($id)
    {
        try
        {
            $pdo_connex=Connexion::getConnexion();
            $pdo_query="update t_utilisateur set etat=0, etat_autorisation=1 WHERE id=" . $id;
            $pdo_select = $pdo_connex->exec($pdo_query);
            if($pdo_select==1) return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

    }

    public static function chercherAdmin()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select id from t_utilisateur where type_='admin'";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if ($pdo_select->rowCount()==1) return true;
        return false;
    }
    public static function chercherMedecin_directeur()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="select id from t_utilisateur where type_='medecin directeur'";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        if ($pdo_select->rowCount()==1) return true;
        return false;
    }


    public static function get_all_users()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="Select * from t_utilisateur";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Utilisateurs(
                    $ob->id,
                    $ob->pseudo,
                    $ob->code,
                    $ob->type_,
                    $ob->etat
                );
            }
            return $tab;
        }

    }

     public static function get_all_users_blocked()
    {
        $pdo_con=Connexion::getConnexion();
        $pdo_query="Select * from t_utilisateur WHERE etat_autorisation=0";
        $pdo_select=$pdo_con->prepare($pdo_query);
        $pdo_select->execute();
        $tab=[];
        if($pdo_select!=null)
        {
            while ($ob=$pdo_select->fetch(PDO::FETCH_OBJ))
            {
                $tab[]=new Utilisateurs(
                    $ob->id,
                    $ob->pseudo,
                    $ob->code,
                    $ob->type_,
                    $ob->etat
                );
            }
            return $tab;
        }

    }

}
