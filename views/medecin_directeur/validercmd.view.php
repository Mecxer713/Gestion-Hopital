<main class="pt-5 mx-lg-5">
    <?php if(isset($_GET['numcmd'])){?>
    <div class="container-fluid mt-5" >
        <div class="card ">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Bon de commande</strong>
            </h5>
            <!--Card content-->
            <div class="col-md-12 mb-4">
                <!-- Form -->
                <form style="color: #757575;">
                    <span class="alert alert-danger msg"></span>
                    <!-- First name -->
                    <?php
                    if(!empty($entete) && sizeof($entete)>0)

                        foreach ($entete as $item)
                        {?>

                            <div class="form-group">
                                <label for="numrcp">Num Bon de reception</label>
                                <input type="hidden" name="numcmd" class="form-control numcmd"  value="<?= $item->getNumCmd()?>"  >
                                <input type="text" id="numrcp" class="form-control"  value="<?= $item->getNumCmd()?>" disabled >

                            </div>
                            <div class="form-group">
                                <label for="dtcmd">Date de Commande</label>
                                <input type="hidden" name="dtcmd" value="<?= $item->getDateCreation() ?>"  >
                                <input type="text" id="dtcmd" name="dtcmd" class="form-control"  value="<?= $item->getDateCreation() ?>" disabled >

                            </div>

                            <div class="form-group">
                                <label for="nmfss">Nom Fournisseur</label>
                                <input type="hidden" name="nmfss" value="<?= $item->getNomFournisseur() ?>"  >
                                <input type="text" id="nmfss" name="nmfss" class="form-control"  value="<?= $item->getNomFournisseur() ?>" disabled >

                            </div>
                        <?php }?>
                    <!-- Last name -->
                </form>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="card">

                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Details Commandes</h3>
                <div class="col-md-12 mb-4">
                    <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>


                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center" id="tabProd">
                            <tr>
                                <th class="text-center">code Produit</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Prix Unitaire</th>
                                <th class="text-center">Quantite</th>
                                <th class="text-center">Unite de Mesure</th>
                                <th class="text-center">Prix Total</th>
                            </tr>
                            <?php if(!empty($receptions) and sizeof($receptions)>=0)
                            {
                                foreach ($receptions as $item)
                                {
                                    echo " <tr>
                                        <td>".$item->getNumProduit()."</td>
                                        <td>".$item->getNomProduit()."</td>
                                        <td>".$item->getPrixUnit()."</td>
                                        <td>".$item->getQte()."</td>
                                        <td>".$item->getUniteMesure()."</td>
                                        <td id='pt'>".$item->getPrixTotal()."</td>";

                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Editable table -->
        </div>
        <div class="container-fluid mt-5">
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">
                    <div class="mb-2 mb-sm-0 pt-1">
                        <form method="post">
                            <button class='btn btn-primary btn-rounded btn-sm my-0 btnValid' name='valid'>
                                Valider
                            </button>
                            <button class='btn btn-danger btn-rounded btn-sm my-0 btnrejet' name='valid'>
                                Rejeter
                            </button>
                        </form>


                    </div>
                    <form class="d-flex justify-content-center">
                        <input type="text" placeholder="Montant Total" class="form-control totaux"  disabled>
                    </form>

                </div>

            </div>
        </div>

        <?php }else{ ?>
            <div class="container-fluid mt-5 divaff">
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Bons des Commandes &agrave;
                        Valider</h3>
                    <div class="card-body">

                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                            <tr>
                                <th class="text-center">Num&eacute;ro commande</th>
                                <th class="text-center">Date Commande</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Fournisseur</th>
                                <th class="text-center">Devise commande</th>
                                <th class="text-center">Contr&ocirc;les</th>
                            </tr>
                            <?php
                            if (!empty($listCmd) && sizeof($listCmd) > 0)
                            {
                                ?>
                                <?php foreach ($listCmd as $item) {

                                echo "
                        <tr>
                            <td class='pt-3-half' >" . $item->getNumCmd() . "</td>
                            <td class='pt-3-half' >" . $item->getDateCreation() . "</td>
                            <td class='pt-3-half' >" . $item->getDescr() . "</td>
                            <td class='pt-3-half' >" . $item->getNomFournisseur() . "</td>
                            <td class='pt-3-half' >" . $item->getDevise() . "</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Validation_CMD&numcmd=".$item->getNumCmd()."    
                              ' class='btn btn-primary btn-rounded btn-sm my-0' > View Detail</a>
                                </span>
                                
                            </td>
                        </tr>";
                            }
                            }?>
                        </table>
                    </div>
                </div>

            </div>
        <?php } ?>
</main>

<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 28/02/2019
 * Time: 18:26
 */