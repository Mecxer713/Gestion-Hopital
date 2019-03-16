<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 24/02/2019
 * Time: 12:48
 */
require_once 'globals/init.php';
require_once 'globals/config.php';
require_once 'modals/Connexion.php';
require_once 'modals/EnteteCmd.php';
require_once 'modals/Proprietaire.php';
require_once 'modals/commandes.php';
//require_once 'html2pdf/src/Html2Pdf.php';
require_once 'vendor/autoload.php';
try
{
    $listCmd=EnteteCmd::listeEnteteValider();
    if(isset($_GET['numcmd']))
    {
       // var_dump(Proprietaire::listeProp());die();
        extract($_GET);
        header('location: partials/monpdf.php?numcmd='.$numcmd);

        $listeProp=Proprietaire::listeProp();
        $listeCmd=EnteteCmd::listeEnteteById($numcmd);
        $listeDetailcmd=commandes::listeDetailCmdById($numcmd);
        $content=ob_get_clean();
        $pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','fr', true, 'UTF-8');
        $pdf->writeHTML($content);
        $pdf->pdf->IncludeJS('print(true)');
        $pdf->Output('Bon_commande_'.$numcmd);
        include_once 'partials/monpdf.php';
    }

}catch (Exception $ex)
{
    die(include'controls/erreur.control.php');
}
include_once 'views/pharmacie/ViewDetail.view.php';