<?php
/**
 * Created by PhpStorm.
 * User: mecxer
 * Date: 2/8/18
 * Time: 10:42 PM
 */

class Connexion
{
    private static $ressource;

    //declaration des methodes

    public static function getConnexion()
    {
        if(self::$ressource == null)
        {
            self::$ressource = new PDO(
                BD_DSN,BD_UTILISATEUR,BD_PASSWORD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            return self::$ressource;
        }
        return self::$ressource;
    }

}