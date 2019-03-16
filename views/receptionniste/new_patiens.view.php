<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
    <!-- Material form register -->
        <?php
            if(!isset($_GET['id'])){


                echo "
                <div class='card'>
                    <h5 class='card-header info-color white-text text-center py-4'>
                        <strong>Enregistrement Patients</strong>
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
                                        <label for='nom'>Nom </label>
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class='md-form'>
                                        <input type='text' id='postn' name='postn' class='form-control'  value="<?= get_input('postn')?>" required >
                                        <label for='postn'>PostNom & Pr&eacute;nom</label>
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class='md-form'>
                                        <input type='number' id='age' name='age' class='form-control'  value="<?= get_input('age')?>" required >
                                        <label for='age'>Age</label>
                                    </div>
                                </div>
                                    <div class='col'>
                                        <div class='md-form'>
                                            <input type='text' id='adresse' name='adresse' class='form-control'  value="<?= get_input('adresse')?>" required >
                                            <label for='adresse'>Adresse</label>
                                        </div>
                                    </div>
                            </div>
                            <div class='form-row'>
                                <div class='col'>
                                    <div class='md-form'>
                                        <input type='text' id='tel'name='tel' class='form-control'  value="<?= get_input('tel')?>" required >
                                        <label for='tel'>Telephone</label>

                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="mdb-select md-form">
                                        <select name="type_pat" class="form-control type_pat">
                                            <option value="ah">Selectionnez un Type</option>
                                            <option value="prive">Particulier</option>
                                            <option value="abonne">Abonn&eacute;</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col entrep">
                                    <div class="mdb-select md-form">
                                        <select name="entrep" class="form-control ">
                                            <option value="aucune">Selectionnez une Entreprise</option>
                                            <?php
                                            foreach ($listeAb as $item) {
                                                echo '<option value="' . $item->getId() . '">' . $item->getNom() . '</option>';
                                            }
                                            ?>
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
                echo "
                                <div class='card'>
                                    <h5 class='card-header info-color white-text text-center py-4'>
                                        <strong>Modification Patients : <u class='text-primary'> ".$_GET['nom']."</u></strong>
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
                                <input type='text' id='age' name='age' class='form-control'  value='<?= $_GET['age'] ?>' >
                                <label for='age'>Age</label>
                            </div>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col'>
                            <div class='md-form'>
                                <input type='text' id='adresse' name='adresse' class='form-control' value='<?= $_GET['adresse'] ?>' >
                                <label for='adresse'>Adresse</label>
                            </div>
                        </div>
                        <div class='col'>
                            <div class='md-form'>
                                <input type='text' id='tel'name='tel' class='form-control'  value='<?= $_GET['tel'] ?>' >
                                <label for='tel'>Telephone</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class='md-form'>
                                <input type='text' id='typ'name='typ' class='form-control'  value='<?= $_GET['typ'] ?>' >
                                <label for='typ'>Type Patient</label>
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
                            <a class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" href="index2.php?action=New_patients" >Annuler</a>
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
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Patients</h3>
                <div class="card-body">

                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                        <tr>
                            <th class="text-center">Nom Complet</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Adresse</th>
                            <th class="text-center">Telephone</th>
                            <th class="text-center">Type Patient</th>
                            <th class="text-center">Contr&ocirc;les</th>
                        </tr>
                        <?php
                        if($listepat!=null && sizeof($listepat)>0)
                            foreach ($listepat as $item) {
                                echo"
                            <input type='hidden' name='id' value='".$item->getId()."'/>
                        <tr>
                            <td class='pt-3-half' >".$item->getNom()."</td>
                            <td class='pt-3-half' >".$item->getAge()."</td>
                            <td class='pt-3-half' >".$item->getAdresse()."</td>
                            <td class='pt-3-half' >".$item->getTel()."</td>
                            <td class='pt-3-half' >".$item->getTypePat()."</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Fiche&idF=".$item->getId()
                                    ."&nom=".$item->getNom()
                                    ."&age=".$item->getAge()
                                    ."&adresse=".$item->getAdresse()
                                    ."&tel=".$item->getTel()
                                    ."&typ=".$item->getTypePat()."
                                                    ' class='btn btn-success btn-rounded btn-sm my-0' name='fiche'> Fiche</a>
                                </span>
                                <span class='table-remove'>
                                    <a href='index2.php?action=New_patients&id=".$item->getId()
                                    ."&nom=".$item->getNom()
                                    ."&age=".$item->getAge()
                                    ."&adresse=".$item->getAdresse()
                                    ."&tel=".$item->getTel()
                                    ."&typ=".$item->getTypePat()."'
                                     
                                     class='btn btn-primary btn-rounded btn-sm my-0'>Editer</a>
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
