<?php
if(isset($_SESSION['username']))
{
    header('location: index2.php');
    exit();
}else
{
    if(!Utilisateurs::chercherAdmin())
    {
        header('location: index.php?action=Signup');
        exit();
    }elseif(!Utilisateurs::chercherMedecin_directeur())
        {
            header('location: index.php?action=Signup');
            exit();
        }
}