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
                <strong>Enregistrement Commandes</strong>
            </h5>
            <!--Card content-->
            <div class="col-md-12 mb-4">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" method="post" name="cmd">
                    <!-- First name -->
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="numcmd" name="numcmd" class="form-control"  <?php echo get_input('numcmd')?> required >
                                <label for="numcmd">Numero commande</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="nomfss" name="nomfss" class="form-control"  <?php echo get_input('nomfss')?> required >
                                <label for="nomfss">Nom Fournisseur</label>
                            </div>
                        </div>

                        <!-- Last name -->
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="numprod" name="numprod" class="form-control"  <?php echo get_input('numprod')?> required >
                                <label for="numprod">Numero Produit</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="designation" name="designation" class="form-control"  <?php echo get_input('designation')?> required >
                                <label for="designation">Designation Produit</label>
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="qte"name="qte" class="form-control"  value="0" onkeyup="clique()" <?php echo get_input('qte')?> required >
                                <label for="qte">Quantite</label>

                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="unitmesure"name="unitmesure" class="form-control"  <?php echo get_input('unitmesure')?> required >
                                <label for="unitmesure">Unite de Mesure</label>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="pu" name="pu" class="form-control" value="0" onkeyup="clique()" <?php echo get_input('pu')?> required >
                                <label for="pu">Prix Unitaire</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="prixtot"name="prixtot" class="form-control" value="0" <?php echo get_input('prixtot')?> required >
                                <label for="prixtot">Prix Total</label>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Sign up button -->
                    <div class="col-sm-pull-3 text-center">
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="sauve">
                            Sauvegarder</button>
                    </div>
                    <!-- Social register -->
                </form>
                <!-- Form -->
            </div>

        </div>
        <!--html>
        <body>
        <form name="formulaire">
            <input type="num" onkeyup="clique()" id="qte" value="0" name="qte"/><br>
            <input type="num" onkeyup="clique()" value="0" id="num" name="num"/><br>
            <input type="text" name="total" value="0"/>
        </form-->
        <script language="JavaScript">
            var Qtes=0;
            var Pu=0;
            var Ptot=0;
            function clique (){

                Qtes=document.cmd.qte.value;
                Pu=document.cmd.pu.value;
                Ptot=parseInt(Qtes)*parseInt(Pu);
                document.cmd.prixtot.value=Ptot
            }
        </script>

    </div>
    <div class="container-fluid mt-5">
        <div class="card">

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Commandes</h3>
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center">
                        <tr>
                            <th class="text-center">Numero Commande</th>
                            <th class="text-center">Nom Fournisseur</th>
                            <th class="text-center">Numero Produit</th>
                            <th class="text-center">Designation Produit</th>
                            <th class="text-center">Prix Unitaire</th>
                            <th class="text-center">Quantite</th>
                            <th class="text-center">Unite de Mesure</th>
                            <th class="text-center">Prix Total</th>
                            <th class="text-center">Operations</th>
                        </tr>
                        <tr>
                            <?php foreach ($commandes as $k=> $commande):?>
                        <tr>

                            <td><?php echo $commande['num_cmd'];?></td>
                            <td><?php echo $commande['nom_fournisseur'];?></td>
                            <td><?php echo $commande['num_produit'];?></td>
                            <td><?php echo $commande['nom_produit'];?></td>
                            <td><?php echo $commande['prix_unit'];?></td>
                            <td><?php echo $commande['qte'];?></td>
                            <td><?php echo $commande['unite_mesure'];?></td>
                            <td><?php echo $commande['prix_total'];?></td>

                            <td> <span class="table-edit"><a href="index2.php?action=#" class="btn btn-primary btn-rounded btn-sm my-0">Modifier</a></span></td>

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