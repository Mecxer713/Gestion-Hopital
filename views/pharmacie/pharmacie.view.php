<main class="pt-5 mx-lg-5">
    <?php if(isset($_SESSION['success'])):?>
        <div class="alert alert-success">
            Nouveau patient inserer avec succes;
        </div>
        <?php unset($_SESSION['success']); endif;?>
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <div class="card ">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Enregistrement Produits</strong>
            </h5>
            <!--Card content-->
            <div class="col-md-12 mb-4">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" method="post">
                    <!-- First name -->
            <div class="row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="numprod" name="numprod" class="form-control"  <?php echo get_input('numprod')?> required >
                        <label for="numprod">Numero produit</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="catprod" name="catprod" class="form-control"  <?php echo get_input('catprod')?> required >
                        <label for="catprod">Designation Produit</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <input type="text" id="qte" name="qte" class="form-control"  <?php echo get_input('qte')?> required >
                        <label for="qte">Quantite</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="prixunit" name="prixunit" class="form-control"  <?php echo get_input('prixunit')?> required >
                        <label for="prixunit">Prix Unitaire</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="unitmes" name="unitmes" class="form-control"  <?php echo get_input('unitmes')?> required >
                        <label for="unitmes">Unite de mesure</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="nomfss" name="nomfss" class="form-control"  <?php echo get_input('nomfss')?> required >
                        <label for="nomfss">Nom Fournisseur</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="loc" name="loc" class="form-control"  <?php echo get_input('loc')?> required >
                        <label for="loc">Localisation</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <input type="text" id="dateExp" name="dateExp" class="form-control"  <?php echo get_input('dateExp')?> required >
                        <label for="dateExp">Date Expiration</label>

                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="seuilmin" name="seuilmin" class="form-control"  <?php echo get_input('seuilmin')?> required >
                                <label for="seuilmin">Seuil Min</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="seuilmax" name="seuilmax" class="form-control"  <?php echo get_input('seuilmax')?> required >
                                <label for="seuilmax">Seuil Max</label>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <!-- Sign up button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="sauve">
                        Sauvegarder</button>

                    <!-- Social register -->
            </form>
                <!-- Form -->
            </div>

        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="card">

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Produits</h3>
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center">
                        <tr>
                            <th class="text-center">Numero Produit</th>
                            <th class="text-center">Designation Produit</th>
                            <th class="text-center">Unite de mesure</th>
                            <th class="text-center">Prix Unitaire</th>
                            <th class="text-center">Quantite</th>
                            <th class="text-center">Date Expiration</th>
                            <th class="text-center">Nom Fournisseur</th>
                            <th class="text-center">Localisation</th>
                            <th class="text-center">Seuil Min</th>
                            <th class="text-center">Seuil Max</th>
                            <th class="text-center">Operations</th>
                        </tr>
                        <tr>
                            <?php foreach ($produits as $k=> $produit): ?>
                        <tr>

                            <!--th scope="row"></th-->
                            <td><?php echo $produit['id_prod'];?></td>
                            <td><?php echo $produit['designation_prod'];?></td>
                            <td><?php echo $produit['unite_mesure'];?></td>
                            <td><?php echo $produit['prix_unitaire'];?></td>
                            <td><?php echo $produit['quantite'];?></td>
                            <td><?php echo $produit['date_expiration'];?></td>
                            <td><?php echo $produit['nom_fournisseur'];?></td>
                            <td><?php echo $produit['localisation'];?></td>
                            <td><?php echo $produit['seuil_min'];?></td>
                            <td><?php echo $produit['seuil_max'];?></td>

                            <td><span class="table-edit"><a href="index2.php?action=#" class="btn btn-success btn-rounded btn-sm my-0">Modifier</a></span></td>

                        </tr>
                        <?php endforeach;?>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- Editable table -->
    </div>
    </div>
    <p></p>
    <!-- Material form register -->
</main>
<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 23/12/2018
 * Time: 15:25
 */