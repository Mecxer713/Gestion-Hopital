<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1"></h4>
                <form class="d-flex justify-content-center" method="post">
                    <!-- Default input -->
                    <select name="choix" class="form-control-sm">
                        <option selected>Selectionnez une fiche</option>

                        <?php
                        foreach ($listeFiche as $item) {
                            echo '<option value="' . $item->getNumF() . '">' . $item->getNomComplet() . '</option>';
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

    <?php
    if (isset($_GET['numFP'])) {
        echo "<div class='container-fluid mt-5'>
                        <div class='card'>
                            <h5 class='card-header info-color white-text text-center py-4'>
                                <strong>Fiche Consultation du Patient : <span class='text-danger text-uppercase'>" . $_GET['nom'] . "</span> </strong>
                            </h5>
                            <!--Card content-->
                            <div class='card-body px-lg-5 pt-0'>
                                <form class='text-center' style='color: #757575;' method='post'>";
        if (isset($_SESSION['errors'])) {
            echo "<p class='alert alert-danger'>" . $_SESSION['errors'] . "</p>";
            unset($_SESSION['errors']);
        }
        if (isset($errors) && count($errors) != 0) {
            echo "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ";
            foreach ($errors as $error)
                echo $error . '<br>';
            echo "</div>";
        }
        ?>
        <input type="hidden" name="numFP" value="<?= $_GET['numFP'] ?>">
        <div class='md-form'>
            <input type="hidden" name="nom" value="<?= $_GET['nom'] ?>">
            <input type='text' id='nom' name='nom' class='form-control' value="<?= $_GET['nom'] ?>" disabled>
            <label for='nom'>Nom </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="age" value="<?= $_GET['age'] ?>">
            <input type='text' id='age' name='age' class='form-control' value="<?= $_GET['age'] ?>" disabled>
            <label for='age'>Age </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="adresse" value="<?= $_GET['adresse'] ?>">
            <input type='text' id='adresse' name='adresse' class='form-control' value="<?= $_GET['adresse'] ?>"
                   disabled>
            <label for='adresse'>Adresse </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="poid" value="<?= $_GET['poid'] ?>">
            <input type='text' id='poid' name='poid' class='form-control' value="<?= $_GET['poid'] ?>" disabled>
            <label for='poid'>Poid </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="temp" value="<?= $_GET['temp'] ?>">
            <input type='text' id='temp' name='temp' class='form-control' value="<?= $_GET['temp'] ?>" disabled>
            <label for='temp'>Temperature </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="tail" value="<?= $_GET['tail'] ?>">
            <input type='text' id='tail' name='tail' class='form-control' value="<?= $_GET['tail'] ?>" disabled>
            <label for='tail'>Taille </label>
        </div>
        <div class='md-form'>
            <input type='text' id='obs' name='obs' class='form-control' required>
            <label for='obs'>Observation </label>
        </div>
        <div class='md-form'>
            <input type='datetime-local' id='plan' name='plan' class='form-control' required>
            <label for='plan'>Prochain Rendez-vous </label>
        </div>
        <div class="select-dropdown">
            <select name="intern" class="form-control intern">
                <option value="" selected>Selectionnez un cas</option>
                <option value="inter">Intern&eacute;</option>
                <option value="ninter">Pas intern&eacute;</option>
            </select>
        </div>
        <div class='md-form motif'>
            <input type='text' id='motif' name='motif' class='form-control' required value="<?= get_input('motif') ?>">
            <label for='motif'>Motif Internement</label>
        </div>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 " type="submit"
                        name="sauve">Sauvegarder
                </button>
            </div>
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 " type="reset">
                    Annuler
                </button>
            </div>
        </div>
        </form>
        </div></div>
    <?php } elseif (isset($_GET['error'])) {
        echo "<div class='container-fluid mt-5'>
                        <div class='card'>
                            <h5 class='card-header info-color white-text text-center py-4'>
                                <strong>Fiche Consultation du Patient : <span class='text-danger text-uppercase'>" . $_GET['nom'] . "</span> </strong>
                            </h5>
                            <!--Card content-->
                            <div class='card-body px-lg-5 pt-0'>
                                <form class='text-center' style='color: #757575;' method='post' >";
        if (isset($_SESSION['errors'])) {
            echo "<p class='alert alert-danger'>" . $_SESSION['errors'] . "</p>";
            unset($_SESSION['errors']);
        }
        if (isset($errors) && count($errors) != 0) {
            echo "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ";
            foreach ($errors as $error)
                echo $error . '<br>';
            echo "</div>";
        }
        ?>
        <input type="hidden" name="numFP" value="<?= get_input('numFP') ?>">
        <div class='md-form'>
            <input type="hidden" name="nom" value="<?= get_input('nom') ?>">
            <input type='text' id='nom' name='nom' class='form-control' value="<?= get_input('nom') ?>" disabled>
            <label for='nom'>Nom </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="age" value="<?= get_input('age') ?>">
            <input type='text' id='age' name='age' class='form-control' value="<?= get_input('age') ?>" disabled>
            <label for='age'>Age </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="adresse" value="<?= get_input('adresse') ?>">
            <input type='text' id='adresse' name='adresse' class='form-control' value="<?= get_input('adresse') ?>"
                   disabled>
            <label for='adresse'>Adresse </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="poid" value="<?= get_input('poid') ?>">
            <input type='text' id='poid' name='poid' class='form-control' value="<?= get_input('poid') ?>" disabled>
            <label for='poid'>Poid </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="temp" value="<?= get_input('temp') ?>">
            <input type='text' id='temp' name='temp' class='form-control' value="<?= get_input('temp') ?>" disabled>
            <label for='temp'>Temperature </label>
        </div>
        <div class='md-form'>
            <input type="hidden" name="tail" value="<?= get_input('tail') ?>">
            <input type='text' id='tail' name='tail' class='form-control' value="<?= get_input('tail') ?>" disabled>
            <label for='tail'>Taille </label>
        </div>
        <div class='md-form'>
            <input type='text' id='obs' name='obs' class='form-control' value="<?= get_input('obs') ?>" required>
            <label for='obs'>Observation </label>
        </div>
        <div class='md-form'>
            <input type='datetime-local' id='plan' name='plan' class='form-control' value="<?= get_input('plan') ?>"
                   required>
            <label for='plan'>Prochain Rendez-vous </label>
        </div>
        <div class="select-dropdown">
            <select name="intern" class="form-control intern">
                <option value="" selected>Selectionnez un cas</option>
                <option value="inter">Intern&eacute;</option>
                <option value="ninter">Pas intern&eacute;</option>
            </select>
        </div>
        <div class='md-form motif'>
            <input type='text' id='motif' name='motif' class='form-control ' required value="<?= get_input('motif') ?>">
            <label for='motif'>Motif Internement</label>
        </div>
        <input type="hidden" name="id" value="<?= get_input('id') ?>">
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 " type="submit"
                        name="sauve">Sauvegarder
                </button>
            </div>
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 " type="reset">
                    Annuler
                </button>
            </div>
        </div>
        </form>
        </div>
        </div>
        <?php
    } elseif ((empty($listeFicheC) && sizeof($listeFicheC) <= 0)) {
        echo '
                    <div class="container-fluid mt-2">
                     <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Fiches</h3>
                    <div class="card-body">

                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                            <tr>
                                <th class="text-center">Nom Complet</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">Poid(Kg)</th>
                                <th class="text-center">Temperature(&deg;C)</th>
                                <th class="text-center">Taille(metre)</th>
                                <th class="text-center">Observation</th>
                                <th class="text-center">Contr&ocirc;les</th>
                            </tr>
                        ';
        if ((!empty($listeF) && sizeof($listeF) > 0)) {
            foreach ($listeF as $item) {
                /** @noinspection PhpUndefinedMethodInspection */
                echo "
                               
                            <input type='hidden' name='id' value='" . $item->getNumF() . "'/>
                        <tr>                            
                            <td class='pt-3-half' >" . $item->getNomComplet() . "</td>
                            <td class='pt-3-half' >" . $item->getAge() . "</td>
                            <td class='pt-3-half' >" . $item->getAdresse() . "</td>
                            <td class='pt-3-half' >" . $item->getPoids() . "</td>
                            <td class='pt-3-half' >" . $item->getTemperature() . "</td>
                            <td class='pt-3-half' >" . $item->getTaille() . "</td>
                            <td class='pt-3-half text-danger' >non affect&eacute;</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Consultation&numFP=" . $item->getNumF()
                    . "&nom=" . $item->getNomComplet()
                    . "&age=" . $item->getAge()
                    . "&adresse=" . $item->getAdresse()
                    . "&poid=" . $item->getPoids()
                    . "&temp=" . $item->getTemperature()
                    . "&tail=" . $item->getTaille()
                    . "&id=" . $item->getIdPat() . "'                                   
                                     class='btn btn-primary btn-rounded btn-sm my-0'>Editer</a>
                                </span>
                            </td>
                        </tr>
                        </table>
                        </div>
                    </div>
                </div>
                        ";
            }
        }
    } elseif ((!empty($listeFicheC) && sizeof($listeFicheC) > 0)) {
        if (isset($_GET['numF'])) {
            echo '
                    <div class="container-fluid mt-2">
                     <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Fiches</h3>
                    <div class="card-body">

                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                            <tr>
                                <th class="text-center">Nom Complet</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">Poid(Kg)</th>
                                <th class="text-center">Temperature(&deg;C)</th>
                                <th class="text-center">Taille(metre)</th>
                                <th class="text-center">Observation</th>
                                <th class="text-center">Contr&ocirc;les</th>
                            </tr>
                        ';


            foreach ($listeFicheC as $item) {
                echo "
                               
                            <input type='hidden' name='id' value='" . $item->getNumF() . "'/>
                        <tr>                            
                            <td class='pt-3-half' >" . $item->getNomComplet() . "</td>
                            <td class='pt-3-half' >" . $item->getAge() . "</td>
                            <td class='pt-3-half' >" . $item->getAdresse() . "</td>
                            <td class='pt-3-half' >" . $item->getPoids() . "</td>
                            <td class='pt-3-half' >" . $item->getTemperature() . "</td>
                            <td class='pt-3-half' >" . $item->getTaille() . "</td>
                            <td class='pt-3-half text-danger' >" . $item->getObservation() . "</td>
                            <td>
                            </tr>
                                 </table>
                        </div>
                    </div>
                </div> ";
            }
        } else {
            echo '
                    <div class="container-fluid mt-2">
                     <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Fiches</h3>
                    <div class="card-body">

                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                            <tr>
                                <th class="text-center">Nom Complet</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">Poid(Kg)</th>
                                <th class="text-center">Temperature(&deg;C)</th>
                                <th class="text-center">Taille(metre)</th>
                                <th class="text-center">Observation</th>
                                <th class="text-center">Contr&ocirc;les</th>
                            </tr>
                        ';

            foreach ($listeF as $item) {
                echo "
                               
                            <input type='hidden' name='id' value='" . $item->getNumF() . "'/>
                        <tr>                            
                            <td class='pt-3-half' >" . $item->getNomComplet() . "</td>
                            <td class='pt-3-half' >" . $item->getAge() . "</td>
                            <td class='pt-3-half' >" . $item->getAdresse() . "</td>
                            <td class='pt-3-half' >" . $item->getPoids() . "</td>
                            <td class='pt-3-half' >" . $item->getTemperature() . "</td>
                            <td class='pt-3-half' >" . $item->getTaille() . "</td>
                            <td class='pt-3-half text-danger' >non affect&eacute;</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Consultation&numFP=" . $item->getNumF()
                    . "&nom=" . $item->getNomComplet()
                    . "&age=" . $item->getAge()
                    . "&adresse=" . $item->getAdresse()
                    . "&poid=" . $item->getPoids()
                    . "&temp=" . $item->getTemperature()
                    . "&tail=" . $item->getTaille()
                    . "&id=" . $item->getIdPat() . "'                                   
                                     class='btn btn-primary btn-rounded btn-sm my-0'>Editer</a>
                                </span>
                            </td>
                        </tr>
                        
                        ";
            }
            foreach ($listeFicheC as $item) {
                echo "
                               
                            <input type='hidden' name='id' value='" . $item->getNumF() . "'/>
                        <tr>
                            
                            <td class='pt-3-half' >" . $item->getNomComplet() . "</td>
                            <td class='pt-3-half' >" . $item->getAge() . "</td>
                            <td class='pt-3-half' >" . $item->getAdresse() . "</td>
                            <td class='pt-3-half' >" . $item->getPoids() . "</td>
                            <td class='pt-3-half' >" . $item->getTemperature() . "</td>
                            <td class='pt-3-half' >" . $item->getTaille() . "</td>
                            <td class='pt-3-half text-danger' >" . $item->getObservation() . "</td>
                        </tr>
                            
                ";

            }
            echo '</table>
                        </div>
                    </div>
                </div>';

        }
    }

    ?>
</main>