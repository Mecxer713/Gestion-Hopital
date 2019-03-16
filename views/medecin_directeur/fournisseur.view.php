<main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">

        <!-- Material form register -->
        <div class="d-sm-flex justify-content-between">
            <?php if(isset($_SESSION['success'])):?>
                <div class="alert alert-success">
                    Nouveau Fournisseur inserer avec succes;
                </div>
                <?php unset($_SESSION['success']); endif;?>
            <div class="card col-md-4">
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Enregistrement Fournisseur</strong>
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
                        <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" value="<?= $_GET['id']?>" name="id">
                            <div class="form">
                                <label for="nom">Nom Fournisseur</label>
                                <input type="text" id="nom" name="nom" class="form-control"  value="<?= $_GET['nom'] ?>" required >
                            </div>
                            <div class="form">
                                <label for="adr">Adresse Fournisseur</label>
                                <input type="text" id="adr" name="adr" class="form-control"  value="<?= $_GET['adr'] ?>" required >

                            </div>

                            <div class="form">
                                <label for="tel">Telephone</label>
                                <input type="text" id="tel" name="tel" class="form-control"  value="<?= $_GET['tel'] ?>" required >
                            </div>

                            <hr>
                            <!-- Sign up button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="modif">
                                Modifier</button>

                        <?php }else{ ?>
                                <div class="form">
                                    <label for="nom">Nom Fournisseur</label>
                                    <input type="text" id="nom" name="nom" class="form-control"  value="<?php echo get_input('nom')?>" required >
                                </div>
                                <div class="form">
                                    <label for="adr">Adresse Fournisseur</label>
                                    <input type="text" id="adr" name="adr" class="form-control"  value="<?php echo get_input('adr')?>" required >

                                </div>

                                <div class="form">
                                    <label for="tel">Telephone</label>
                                    <input type="text" id="tel" name="tel" class="form-control"  value="<?php echo get_input('tel')?>" required >
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
            <div class="card col-md-7 d-flex justify-content-center">
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

                            <th class="text-center">Nom Fournisseur</th>
                            <th class="text-center">Adresse</th>
                            <th class="text-center">Telephone</th>
                            <th class="text-center">Operations</th>
                        </tr>
                        <tr>
                            <?php foreach ($listeFour as $item): ?>
                        <tr>
                            <!--th scope="row"></th-->
                            <td><?= $item->getNomFour() ?></td>
                            <td><?= $item->getAdresse() ?></td>
                            <td><?= $item->getTelephone() ?></td>
                            <?php
                            echo"<td>
                                <span class='table-edit'>
                                <a href='index2.php?action=Fournisseur&id=".$item->getIdFourn()
                                ."&nom=".$item->getNomFour()
                                ."&adr=".$item->getAdresse()
                                ."&tel=".$item->getTelephone()."'    
                                                            
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