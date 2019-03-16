<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="card mb-4 wow fadeIn">
                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1"></h4>
                    <form class="d-flex justify-content-center" method="post">
                        <!-- Default input -->
                        <select name="choix" class="form-control-sm">
                            <option selected>Selectionnez une commande</option>

                            <?php
                            foreach ($listeCmd as $item) {
                                echo '<option value="' . $item->getNumCmd() . '">' . $item->getNumCmd() . '</option>';
                            }
                            ?>
                        </select>
                        <button class='btn btn-primary btn-rounded btn-sm my-0' name='load' type="submit">
                            Charger
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <div class="card ">

            <!--Card content-->
            <div class="col-md-12 mb-4">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" method="post" name="cmd">
                    <!-- First name -->

                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="numrcp" name="numrcp" class="form-control"  value="<?php echo get_input('numrcp')?>" required >
                            <label for="numrcp">Num Bon de reception</label>
                        </div>
                    </div>
                    <?php
                    if(!empty($entete) && sizeof($entete)>0)

                        foreach ($entete as $item)
                    {?>
                    <div class="col">
                        <div class="md-form">
                            <input type="hidden" name="dtcmd" value="<?= $item->getDateCreation() ?>"  >
                            <input type="text" id="dtcmd" name="dtcmd" class="form-control"  value="<?= $item->getDateCreation() ?>" disabled >
                            <label for="dtcmd">Date de Commande</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <input type="hidden" name="nmfss" value="<?= $item->getNomFournisseur() ?>"  >
                            <input type="text" id="nmfss" name="nmfss" class="form-control"  value="<?= $item->getNomFournisseur() ?>" disabled >
                            <label for="nmfss">Nom Fournisseur</label>
                        </div>
                    </div>
                           <?php }else {?>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="dtcmd" name="dtcmd" class="form-control" disabled >
                                <label for="dtcmd">Date de Commande</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="nmfss" name="nmfss" class="form-control"  disabled >
                                <label for="nmfss">Nom Fournisseur</label>
                            </div>
                        </div>
                    <?php }?>
                    <!-- Last name -->
                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="numprod" name="numprod" class="form-control" disabled value="<?= $_SESSION['username']?> "required >
                            <label for="numprod">Operateurs</label>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                  aria-hidden="true"></i></a></span>
                    <form method="post" id="tabRecp">
                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center">

                        <tbody>

                            <?php
                                    if(!empty($receptions) && sizeof($receptions)>0)
                            {
                                foreach ($receptions as $item){
                            ?>
                        <tr>
                            <input type="hidden" name="numcmd" value="<?= $item->getNumCmd()?>">
                            <td>
                                <div class="md-form">
                                <input type="hidden" name="numprod" value="<?= $item->getNumProduit()?>">
                                <input type='text' id='numprod' name='numprod' class='form-control' value="<?= $item->getNumProduit()?>" disabled>
                                <label for='nom'>Code Produit</label></td>
                                </div>
                            <td>
                                <div class="md-form">
                                <input type="hidden" name="desi" value="<?= $item->getNomProduit()?>">
                                <input type='text' id='desi' name='desi' class='form-control' value="<?= $item->getNomProduit()?>" disabled>
                                <label for='nom'>Designation Produit </label></td>
                                </div>
                            <td>
                                <div class="md-form">
                                <input type="hidden" name="qtecmd" value="<?= $item->getQte()?>">
                                <input type='text' id='qtecmd' name='qtecmd' class='form-control qtecmd' value="<?= $item->getQte()?>" disabled>
                                <label for='nom'>Quantite Commande </label></td>
                                </div>
                            <td>
                            <td>
                                <div class="md-form">
                                <input type="hidden" name="pu" class="pur" value="<?= $item->getPrixUnit()?>">
                                <input type='text' id='pu' name='pu' class='form-control' value="<?= $item->getPrixUnit()?>" disabled>
                                <label for='pu'>Prix Unitaire</label></td>
                                </div>
                            <td>

                                <td>

                                    <div class="md-form">
                                        <input type='text' id='qtercp' name='qtercp' class='form-control qtercp' value="<?= get_input('qtercp')?>" required>
                                        <label for='qtercp'>Qte Re&ccedil;ue</label></td>
                                </div>
                            <td>
                                <div class="md-form">
                                <input type="hidden" name="um" value="<?= $item->getUniteMesure()?>">
                                <input type='text' id='um' name='um' class='form-control' value="<?= $item->getUniteMesure()?>" disabled>
                                <label for='um'>Unite de Mesure</label></td>
                                </div>
                            <td>
                                <div class="md-form">
                                <input type='hidden' id='ptr' name='pt' class='form-control'>
                                <input type='text' id='pt' name='pt' class='form-control ptr' value="<?= get_input('pt') ?>" disabled>
                                <label for='pt'>Prix Total</label>
                                </div>
                            </td>
                        </tr>
                        </tbody>

                        <?php }}?>

                        </tr>
                    </table>

    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <div class="mb-2 mb-sm-0 pt-1">
                    <form method="post">
                        <button class='btn btn-primary btn-rounded btn-sm my-0' name='load' type="submit">
                            Sauvegarder
                        </button>
                    </form>


                </div>
                <form class="d-flex justify-content-center">
                    <input type="text" placeholder="Montant Total" class="form-control totauxr"  disabled>
                </form>

            </div>

        </div>
    </div>
    </div>

</main>
<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 23/12/2018
 * Time: 15:25
 */