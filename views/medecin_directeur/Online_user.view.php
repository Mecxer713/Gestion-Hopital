<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card">

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Details Commandes</h3>
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>


                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center" id="tabProd">
                        <tr>
                            <th class="text-center">Pseudo</th>
                            <th class="text-center"></th>
                            <th class="text-center">Prix Unitaire</th>
                            <th class="text-center">Quantite</th>
                            <th class="text-center">Unite de Mesure</th>
                            <th class="text-center">Prix Total</th>
                            <th class="text-center">Operations</th>
                        </tr>


                        <?php if(!empty($commandes) and sizeof($commandes)>=0)
                        {
                            foreach ($commandes as $item)
                            {
                                echo " <tr>
                                        <td>".$item->getNumProduit()."</td>
                                        <td>".$item->getNomProduit()."</td>
                                        <td>".$item->getPrixUnit()."</td>
                                        <td>".$item->getQte()."</td>
                                        <td>".$item->getUniteMesure()."</td>
                                        <td id='pt'>".$item->getPrixTotal()."</td>
                                        
                                       <td> <span class='table-edit'>
                                        <a href='index2.php?action=Commande&codeArt=".$item->getNumProduit()
                                    ."&desi=".$item->getNomProduit()
                                    ."&pu=".$item->getPrixUnit()
                                    ."&qte=".$item->getQte()
                                    ."&unit=".$item->getUniteMesure()
                                    ."&pt=".$item->getPrixTotal()."'
                                               class='btn btn-primary btn-rounded btn-sm my-0'>Modifier</a></span></td></tr>
                                       ";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 01/03/2019
 * Time: 09:59
 */