<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 26/02/2019
 * Time: 09:52
 */

require_once '../globals/config.php';
require_once '../modals/Connexion.php';
require_once '../modals/EnteteCmd.php';
require_once '../modals/Proprietaire.php';
require_once '../modals/commandes.php';
require_once '../vendor/autoload.php';

$listCmd=EnteteCmd::listeEnteteValider();
if(isset($_GET['numcmd'])) {
    extract($_GET);
    $listeProp = Proprietaire::listeProp();
    $listeCmd = EnteteCmd::listeEnteteById($numcmd);
    $listeDetailcmd = commandes::listeDetailCmdById($numcmd);

}?>
<?php ob_start(); ?>
    <page backtop="5%" backbottom="5%" backleft="5%" backright="5%">
        <div class="container" style="border:1px solid black">
            <?php if((!empty($listeProp) && sizeof($listeProp)>0) &&
            (!empty($listeCmd) && sizeof($listeCmd)>0) &&
            (!empty($listeDetailcmd) && sizeof($listeDetailcmd)>0)){
            foreach ($listeProp as $item){?>
                <div class="d-sm-flex justify-content-between">
                    <img src="<?= $item->getLogo() ?>" alt="Logo de L&apos;entreprise">
                    <p class="text-black-50"><?= $item->getNomFirme() ?></p>
                    <p class="text-black-50"><?= $item->getAdresse() ?></p>
                    <p class="text-black-50"><?= $item->getTelephone() ?></p>
                </div>
            <?php }
              foreach ($listeCmd as $item){?>
            <div class="d-sm-flex justify-content-center">
                <p class="text-black-50"><?= $item->getDateCreation() ?></p>
            </div>
            <div class="d-sm-flex justify-content-around">
                <p class="text-black-50">Bon de commamde N&deg; : <?= $item->getNumCmd() ?></p>
            </div>
            <div class="d-sm-flex justify-content-center">
                <p class="text-black-50"><?= $item->getNomFournisseur() ?></p>
            </div>
        </div>
        <?php }?>

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Bons des Commandes
                Valid&eacute;s</h3>
                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                    <tr>
                        <th class="text-center">code Produit</th>
                        <th class="text-center">Designation</th>
                        <th class="text-center">Prix Unitaire</th>
                        <th class="text-center">Quantite</th>
                        <th class="text-center">Unite de Mesure</th>
                        <th class="text-center">Prix Total</th>
                        <th class="text-center">Operations</th>
                    </tr>
                    <?php foreach ($listeDetailcmd as $item) {?>
                        <tr>
                          <td><?= $item->getNumProduit()?></td>
                           <td><?= $item->getNomProduit() ?></td>
                           <td><?= $item->getPrixUnit() ?></td>
                           <td><?= $item->getQte() ?></td>
                           <td><?= $item->getUniteMesure() ?></td>
                           <td id='pt'><?= $item->getPrixTotal() ?></td>
                        </tr>
                </table>
        <?php }}?>
    </page>

<?php
$content = ob_get_clean();
$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr', true, 'UTF-8');
$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('Bon_commande_' . $numcmd.'.pdf');
?>