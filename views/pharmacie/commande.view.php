<main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                Nouveau patient inserer avec succes;
            </div>
            <?php unset($_SESSION['success']); endif;?>


        <div class="d-sm-flex justify-content-between">
            <div class="card col-md-4">
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Bon de commande</strong>
                </h5>
                <!--Card content-->
                <div class="col-md-12 mb-4">
                    <!-- Form -->
                    <form style="color: #757575;" method="post" name="cmd" autocomplete="off"  enctype="multipart/form-data">
                        <?php if(isset($_SESSION['errors'])):?>
                            <p class="alert alert-danger"><?=$_SESSION['errors'];?>.</p>
                            <?php unset($_SESSION['errors']); endif;?>
                        <?php
                        if(isset($errors) && count($errors) != 0)
                        {
                            echo "<div class=\"alert alert-danger\">
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ";
                            foreach ($errors as $error)
                                echo $error.'<br>';
                            echo "</div>";
                        }
                        ?>
                        <!-- First name -->
                        <?php if (isset($_SESSION['fss'])){?>
                             <div class="form-group">
                                    <input type="hidden" name="numcmd"  value="<?= $_SESSION['cmd']?>"  >
                                    <label for="numcmd">Numero commande</label>
                                    <input type="text" id="numcmd" name="numcmd" class="form-control"  value="<?= $_SESSION['cmd']?>" disabled >

                             </div>
                                <div class="form-group">
                                    <label for="descr">Description Commande</label>
                                    <input type="hidden" name="descr"  value="<?= $_SESSION['descr']?>" >
                                    <input type="text" id="descr" name="descr" class="form-control"  value="<?= $_SESSION['descr']?>" disabled >

                                </div>
                                <div class="form-group">
                                    <label for="nomfss">Nom Fournisseur</label>
                                    <input type="hidden"  name="nomfss"  value="<?= $_SESSION['fss']?>" >
                                    <input type="text" id="nomfss" name="nomfss" class="form-control"  value="<?= $_SESSION['fss']?>" disabled >
                                </div>
                            <div class="form-group">
                                    <label for="dev">Devise</label>
                                    <input type="hidden"  name="dev" value="<?= $_SESSION['dev']?>"  >
                                    <input type="text" id="dev" name="dev" class="form-control"  value="<?= $_SESSION['dev']?>" disabled >
                                </div>
                        <?php }else{ ?>
                                <div class="form-group">
                                    <label for="numcmd">Numero commande</label>
                                    <input type="text" id="numcmd" name="numcmd" class="form-control"  value="<?= get_input('numcmd')?>" required >
                                </div>
                                <div class="form-group">
                                    <label for="descr">Description Commande</label>
                                    <input type="text" id="descr" name="descr" class="form-control"  value="<?= get_input('descr')?>" required >
                                </div>
                                <div class="form-group">
                                <select name="nomfss" class="form-control">
                                    <option selected>Selectionnez un Fournisseur</option>

                                    <?php
                                    foreach ($listeFour as $item) {
                                        echo '<option value="' . $item->getIdFourn() . '">' . $item->getNomFour() . '</option>';
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <select name="dev" class="form-control ">
                                        <option value="ah">Selectionnez une Devise</option>
                                        <option value="fc">Franc Congolais (FC)</option>
                                        <option value="usd">Dollar Am&eacute;ricain (USD) </option>
                                        <option value="euro">Euro (&Element;)</option>
                                    </select>
                                </div>
                            </div>
                        <?php }?>
                        <!-- Last name -->
                            <div class="form-group">
                                <input type="file" name="fichier" value="<?= get_input('fich') ?>" >
                            </div>
                </div>
            <div class="card col-md-7 d-flex justify-content-center">
                <img src="images/logo.jpg" alt="une image" class="img-responsive">
            </div>
        </div>
        <!-- Material form register -->

    </div>


                <?php
                    if(isset($_GET['codeArt'])){
                ?>
                        <div class="container-fluid mt-5">
                            <div class="card">
                                <table class="ble table-bordered table-responsive-md table-striped table-sm text-center">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="codeArt">Code Article</label>
                                                <input type="text" id="codeArt" name="codeArt" class="form-control"  value="<?= $_GET['codeArt'] ?>" required >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="desi">Designation</label>
                                                <input type="text" id="desi" name="desi" class="form-control"  value="<?= $_GET['desi'] ?>" required >

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="pu">Prix Unitaire</label>
                                                <input type="number" id="pu" name="pu" class="form-control pu"  value="<?= $_GET['pu'] ?>" required >

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="qte">Quantite</label>
                                                <input type="number" id="qte" name="qte" class="form-control qte"  value="<?= $_GET['qte'] ?>" required >

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="unit">Unite de Mesure</label>
                                                <input type="text" id="unit" name="unit" class="form-control"  value="<?= $_GET['unit'] ?>" required >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="pt">Prix Total</label>
                                                <input type="number" id="pt" name="pt" class="form-control pt"  value="<?= $_GET['pt'] ?>" required >
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-success " type="submit" name="modif">
                                                Modifier</button>
                                        </td>

                                    </tr>
                                    </tbody>

                                </table>
                                </form>
                            </div>
                        </div>
                 <?php }else{ ?>

                <div class="container-fluid mt-5">
                    <div class="card">
                        <table class="ble table-bordered table-responsive-md table-striped table-sm text-center">
                            <tbody>
                            <tr>
                                <td>
                                    <!-- span class="text-success message"></span -->
                                    <div class="form-group">
                                        <input type="text" placeholder="codeArt" name="codeArt" class="form-control codeArt"  value="<?= get_input('codeArt')?>" required >

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden"  name="desi" class="form-control desi"  value="<?= get_input('desi')?>" >
                                        <input type="text" placeholder="Designation" class="form-control desi"  value="<?= get_input('desi')?>" disabled >

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" placeholder="pu" name="pu" class="form-control pu"  value="<?= get_input('pu')?>" required >
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" placeholder="Quantite" name="qte" class="form-control qte"  value="<?= get_input('qte')?>" required >
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" placeholder="Unite de Mesure" name="unit" class="form-control"  value="<?= get_input('unit')?>" required >
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" name="pt" class="form-control pt" >
                                        <input type="number" placeholder="Prix Total" class="form-control pt"  value="<?= get_input('pt')?>" disabled >
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="sauve">
                                        Ajouter</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

            </form>
        </div>
        </div>
                <?php }?>
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

            <!-- Editable table -->
        </div>
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
                <input type="text" placeholder="Montant Total" class="form-control totaux"  disabled>
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