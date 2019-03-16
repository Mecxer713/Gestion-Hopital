<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <?php
        if(!isset($_GET['id'])){

        echo "
                <div class='card'>
                    <h5 class='card-header info-color white-text text-center py-4'>
                        <strong>Cr&eacute;ation Contrat Abonnement</strong>
                    </h5>
                    <!--Card content-->
                    <div class='card-body px-lg-5 pt-0'>
                        <form class='text-center' style='color: #757575;' method='post'>";
        if(isset($_SESSION['errors']))
        {
            echo"<p class='alert alert-danger'>".$_SESSION['errors']."</p>";
            unset($_SESSION['errors']);
        }
        if(isset($errors) && count($errors) != 0)
        {
            echo "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ";
            foreach ($errors as $error)
                echo $error.'<br>';
            echo "</div>";
        }
        ?>
        <div class='form-row'>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='nom' name='nom' class='form-control'  value="<?= get_input('nom')?>" required >
                    <label for='nom'>Nom Entreprise</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='adresse' name='adresse' class='form-control'  value="<?= get_input('adresse')?>" required >
                    <label for='adresse'>Adresse ou siege social</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='tel' name='tel' class='form-control'  value="<?= get_input('tel')?>" required >
                    <label for='tel'>T&eacute;l&eacute;phone</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='number' id='cap' name='cap' class='form-control'  value="<?= get_input('cap')?>" required >
                    <label for='cap'>Capacit&eacute;</label>
                </div>
            </div>
        </div>
        <div class='form-row'>
            <div class='col'>
                <div class='md-form'>
                    <input type='datetime-local' id='dat' name='dat' class='form-control'  value="<?= get_input('dat')?>" required >
                    <label for='dat'>Date D&eacute;but</label>

                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='typ'name='typ' class='form-control'  value="<?= get_input('typ')?>" required >
                    <label for='typ'>Type Paiement</label>

                </div>
            </div>
            <div class="col">
                <div class="mdb-select md-form colorful-select dropdown-success">
                    <select name="period" class="form-control">
                        <option value="">Selectionnez une Periode</option>
                        <option value="1">Mensuelle</option>
                        <option value="3">Trimestrielle</option>
                        <option value="6">Semestrielle</option>
                        <option value="12">Annuelle</option>
                    </select>
                </div>
            </div>

        </div>
        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="sauve">Sauvegarder</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="reset">Annuler</button>
            </div>
        </div>

        </form>
    </div>
    </div>


    <?php }else
    {
        echo "<div class='card'>
              <h5 class='card-header info-color white-text text-center py-4'>
              <strong>Modification Contrat : <u class='text-primary'> ".$_GET['nom']."</u></strong>
              </h5>
              <!--Card content-->
              <div class='card-body px-lg-5 pt-0'>
              <form class='text-center' style='color: #757575;' method='post'>";
        if(isset($_SESSION['errors']))
        {
            echo"<p class='alert alert-danger'>".$_SESSION['errors']."</p>";
            unset($_SESSION['errors']);
        }
        if(isset($errors) && count($errors) != 0)
        {
            echo "<div class='alert alert-danger'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ";
            foreach ($errors as $error)
                echo $error.'<br>';
            echo "</div>";
        }
        ?>
        <input type='hidden' name='id' value='<?= $_GET['id']?>'>
        <div class='form-row'>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='nom' name='nom' class='form-control'  value='<?= $_GET['nom'] ?>'>
                    <label for='nom'>Nom </label>
                </div>
            </div>

            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='adresse' name='adresse' class='form-control'  value='<?= $_GET['adresse'] ?>' >
                    <label for='adresse'>Adresse</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='tel' name='tel' class='form-control' value='<?= $_GET['tel'] ?>' >
                    <label for='tel'>T&eacute;l&eacute;phone</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='cap'name='cap' class='form-control'  value='<?= $_GET['cap'] ?>' >
                    <label for='cap'>Capacit&eacute;</label>
                </div>
            </div>
        </div>
        <div class='form-row'>
            <div class="col">
                <div class='md-form'>
                    <input type='text' id='dat' name='dat' class='form-control'  value='<?= $_GET['dat'] ?>' >
                    <label for='dat'>Date D&eacute;but</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='typ' name='typ' class='form-control'  value='<?= $_GET['typ'] ?>' required >
                    <label for='typ'>Type Paiement</label>

                </div>
            </div>
            <div class="col ">
                <div class='md-form'>
                    <input type='text' id='per' name='per' class='form-control'  value='<?= $_GET['per'] ?>' required >
                    <label for='per'>Periode</label>

                </div>
            </div>
        </div>
        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="submit" name="modif">Modifier</button>
            </div>
            <div class="col">
                <a class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" href="index2.php?action=Abonnement" >Annuler</a>
            </div>
        </div>

        </form>
        </div>
        </div>

    <?php } ?>
    <!-- Form -->
    <!-- Form -->

    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Contrats</h3>
            <div class="card-body">

                <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                    <tr>
                        <th class="text-center">Nom Entreprise</th>
                        <th class="text-center">Adresse</th>
                        <th class="text-center">T&eacute;l&eacute;phone</th>
                        <th class="text-center">Capacit&eacute;</th>
                        <th class="text-center">Date D&eacute;but</th>
                        <th class="text-center">Type Paiement</th>
                        <th class="text-center">P&eacute;riode(mois)</th>
                        <th class="text-center">Contr&ocirc;les</th>
                    </tr>
                    <?php
                    if($listeAbon!=null && sizeof($listeAbon)>0)
                        foreach ($listeAbon as $item) {
                            echo"
                            <input type='hidden' name='id' value='".$item->getId()."'/>
                        <tr>
                            <td class='pt-3-half' >".$item->getNom()."</td>
                            <td class='pt-3-half' >".$item->getAdresse()."</td>
                            <td class='pt-3-half' >".$item->getTel()."</td>
                            <td class='pt-3-half' >".$item->getNombreAbonne()."</td>
                            <td class='pt-3-half' >".$item->getDateDebut()."</td>
                            <td class='pt-3-half' >".$item->getTypePaiem()."</td>
                            <td class='pt-3-half' >".$item->getPeriode()."</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Abonnement&id=".$item->getId()
                                ."&nom=".$item->getNom()
                                ."&adresse=".$item->getAdresse()
                                ."&tel=".$item->getTel()
                                ."&cap=".$item->getNombreAbonne()
                                ."&dat=".$item->getDateDebut()
                                ."&typ=".$item->getTypePaiem()
                                ."&per=".$item->getPeriode()."
                                                    ' class='btn btn-success btn-rounded btn-sm my-0' > Editer</a>
                                </span>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Abonnement&id=".$item->getId()
                                ."&nom=".$item->getNom()
                                ."&adresse=".$item->getAdresse()
                                ."&tel=".$item->getTel()
                                ."&cap=".$item->getNombreAbonne()
                                ."&dat=".$item->getDateDebut()
                                ."&typ=".$item->getTypePaiem()
                                ."&per=".$item->getPeriode()."'
                                     
                                     class='btn btn-primary btn-rounded btn-sm my-0'name='facture'>Facture</a>
                                </span>
                            </td>
                        </tr>";}
                    ?>
                </table>

            </div>
        </div>
        <!-- Editable table -->
    </div>

    <!-- Material form register -->
</main>
