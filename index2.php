
<?php
//var_dump($_SERVER);die();
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
//require_once 'globals/init.php';
require_once 'partials/functions.php';
$title = (isset($_GET['action']))? $_GET['action']:"Home";

include_once 'partials/header.php';

if(isset($_GET['action']))
{
    $page='controls/'.$_GET['action'].'.control.php';

    if(file_exists($page))
    {
        include_once $page;
    }
    else
    {
        $page='controls/erreur.control.php';
        include_once $page;
    }
}

else
{
    $page='controls/home.control.php';
    include $page;
}
include_once 'partials/footer.php';
ob_end_flush();