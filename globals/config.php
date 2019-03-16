<?php
/**
 * Created by PhpStorm.
 * User: mecxer
 * Date: 2/6/18
 * Time: 1:09 PM
 */

            if(!defined('BD_SERVEUR')) define('BD_SERVEUR', 'localhost');
            if(!defined('BD_UTILISATEUR')) define('BD_UTILISATEUR', 'root');
            if(!defined('BD_PASSWORD')) define('BD_PASSWORD', '');
            if(!defined('BD_NOM')) define('BD_NOM', 'bd_masterGH');
            if(!defined('BD_DSN')) define('BD_DSN', 'mysql:host='.BD_SERVEUR.';dbname='.BD_NOM);