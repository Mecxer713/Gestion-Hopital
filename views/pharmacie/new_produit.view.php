<main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">

        <!-- Material form register -->
        <div class="d-sm-flex justify-content-between">
            <?php if(isset($_SESSION['success'])):?>
                <div class="alert alert-success">
                    Nouveau Produit inserer avec succes;
                </div>
                <?php unset($_SESSION['success']); endif;?>
            <div class="card col-md-6">
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Enregistrement Produit</strong>
                </h5>
                <!--Card content-->
                <div class="mb-4">
                    <!-- Form -->
                    <form style="color: #757575;" method="post" autocomplete="off">
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
                        <?php if(isset($_GET['id_prod'])){ ?>
                            <input type="hidden" value="<?= $_GET['id_prod']?>" name="id_prod">
                            <div class="form">
                                <label for="id_prod">Numero Produit</label>
                                <input type="hidden" name="id_prod" value="<?= $_GET['id_prod'] ?>" >
                                <input type="text" id="id_prod" name="id_prod" class="form-control"  value="<?= $_GET['id_prod'] ?>" disabled >
                            </div>
                            <div class="form">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control"  value="<?= $_GET['designation'] ?>" required >
                            </div>

                            <div class="form">
                                <label for="unite_mesure">Unite de Mesure</label>
                            <input type="text" id="unite_mesure" name="unite_mesure" class="form-control"  value="<?= $_GET['unite_mesure'] ?>" required >
                            </div>

                            <hr>
                            <!-- Sign up button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="modif">
                                Modifier</button>

                        <?php }else{ ?>
                            <div class="form">
                                <label for="id_prod">Numero Produit</label>
                                <input type="hidden" name="id_prod"  value="<?php echo $num_prod ?>" >
                                <input type="text" id="id_prod"  class="form-control"  value="<?php echo $num_prod ?>" disabled >
                            </div>
                            <div class="form">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control"  value="<?php echo get_input('designation')?>" required >

                            </div>

                            <div class="form">
                                <label for="unite_mesure">Unite de mesure</label>
                                <input type="text" id="unite_mesure" name="unite_mesure" class="form-control"  value="<?php echo get_input('unite_mesure')?>" required >
                            </div>

                            <hr>
                            <!-- Sign up button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="sauve">
                                Sauvegarder</button>
                        <?php }?>
                        <!-- Social register -->
                    </form>
                    <!-- Form -->
                </div>

            </div>
            <div class="card col-md-5 d-flex justify-content-center">
                <img src="images/logo.jpg" alt="une image" class="img-responsive">
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
                            <th class="text-center">Designation</th>
                            <th class="text-center">Unite de Mesure</th>
                            <th class="text-center">Operations</th>
                        </tr>
                        <tr>
                            <?php foreach ($listeProd as $item): ?>
                        <tr>
                            <!--th scope="row"></th-->
                            <td><?= $item->getIdProd() ?></td>
                            <td><?= $item->getDesignation() ?></td>
                            <td><?= $item->getUniteMesure() ?></td>
                            <?php
                            echo"<td>
                                <span class='table-edit'>
                                <a href='index2.php?action=new_produit&id_prod=".$item->getIdProd()
                                ."&designation=".$item->getDesignation()
                                ."&unite_mesure=".$item->getUniteMesure()."'    
                                                            
                                                            class='btn btn-success btn-rounded btn-sm my-0'>Modifier</a></span></td>"; ?>

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