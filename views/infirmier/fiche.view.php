<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <?php
        if(isset($_GET['idF'])){


        echo "
                <div class='card'>
                    <h5 class='card-header info-color white-text text-center py-4'>
                        <strong>Cr&eacute;ation Fiche Pour : <span class='text-primary'>".$_GET['nom']."</span></strong>
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
        <input type="hidden" value="<?= $_GET['idF'] ?>" name="idPat">
        <div class='form-row'>
            <div class='col'>
                <div class='md-form'>
                    <input type='hidden' name='nom'  value="<?= $_GET['nom'] ?>" >
                    <input type='text' id='nom' name='nom' class='form-control'  value="<?= $_GET['nom'] ?>" disabled >
                    <label for='nom'>Nom </label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='hidden' name='age' value="<?= $_GET['age']?>" >
                    <input type='text' id='age' name='age' class='form-control'  value="<?= $_GET['age']?>" disabled >
                    <label for='age'>Age</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='hidden' name='adresse' value="<?= $_GET['adresse']?>">
                    <input type='text' id='adresse' name='adresse' class='form-control'  value="<?= $_GET['adresse']?>" disabled>
                    <label for='adresse'>Adresse</label>
                </div>
            </div>
        </div>
        <div class='form-row'>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='poid' name='poid' class='form-control'  value="<?= get_input('poid')?>" required >
                    <label for='poid'>Poid</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='temp'name='temp' class='form-control'  value="<?= get_input('temp')?>" required >
                    <label for='temp'>Temperature</label>

                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='tail'name='tail' class='form-control'  value="<?= get_input('tail')?>" required >
                    <label for='tail'>Taille</label>

                </div>
            </div>

        </div>
        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="sauve">
                    Sauvegarder</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="reset">
                    Annuler</button>
            </div>
        </div>

        </form>
    </div>
    </div>


    <?php }elseif(isset($_GET['numF']))
    {
        echo "
                                <div class='card'>
                                    <h5 class='card-header info-color white-text text-center py-4'>
                                        <strong>Modification Fiche Numero : <span class='text-primary'> ".$_GET['numF']."</span></strong>
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
        <input type="hidden" value="<?= $_GET['numF']?>" name="numF">
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
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='adresse' name='adresse' class='form-control' value='<?= $_GET['adresse'] ?>' >
                    <label for='adresse'>Adresse</label>
                </div>
            </div>
        </div>
        <div class='form-row'>

            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='poid'name='poid' class='form-control'  value='<?= $_GET['poid'] ?>' >
                    <label for='poid'>Poid</label>
                </div>
            </div>
            <div class="col">
                <div class='md-form'>
                    <input type='text' id='temp'name='temp' class='form-control'  value='<?= $_GET['temp'] ?>' >
                    <label for='temp'>Temperature</label>
                </div>
            </div>
            <div class="col">
                <div class='md-form'>
                    <input type='text' id='tail'name='tail' class='form-control'  value='<?= $_GET['tail'] ?>' >
                    <label for='tail'>Taille</label>
                </div>
            </div>
        </div>
        <input type='hidden' name='idPat' value='<?= $_GET['id']?>'>
        <hr>
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="submit" name="modif">Modifier</button>
            </div>
            <div class="col">
                <a class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" href="index2.php?action=Fiche" >Annuler</a>
            </div>
        </div>
        </form>
        </div>
        </div>

    <?php }
    else{
        echo "<div class='card'>
            <h5 class='card-header info-color white-text text-center py-4'>
                <strong>Cr&eacute;ation Fiche </strong>
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
                    <input type='text' id='nom' name='nom' class='form-control'  value='<?= get_input('nom') ?>' disabled>
                    <label for='nom'>Nom </label>
                </div>
            </div>

            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='age' name='age' class='form-control'  value='<?= get_input('age') ?>' disabled>
                    <label for='age'>Age</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='adresse' name='adresse' class='form-control' value='<?= get_input('adresse') ?>' disabled>
                    <label for='adresse'>Adresse</label>
                </div>
            </div>
        </div>
        <div class='form-row'>

            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='poid'name='poid' class='form-control'  value='<?= get_input('poid') ?>' disabled>
                    <label for='poid'>Telephone</label>
                </div>
            </div>
            <div class="col">
                <div class='md-form'>
                    <input type='text' id='temp'name='temp' class='form-control'  value='<?= get_input('temp') ?>' disabled>
                    <label for='temp'>Temperature</label>
                </div>
            </div>
            <div class="col">
                <div class='md-form'>
                    <input type='text' id='tail'name='tail' class='form-control'  value='<?= get_input('tail') ?>' disabled>
                    <label for='tail'>Taille</label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="submit" name="modif" disabled>
                    Sauvegarder</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="reset" disabled>Annuler</button>
            </div>
        </div>
        </form>
        </div>
        </div>

    <?php }?>
    <!-- Form -->
    <!-- Form -->

    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Fiches</h3>
            <div class="card-body">

                <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                    <tr>
                        <th class="text-center">Numero</th>
                        <th class="text-center">Nom Complet</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Adresse</th>
                        <th class="text-center">Poids(kg)</th>
                        <th class="text-center">Temperature (&deg;C)</th>
                        <th class="text-center">Taille(m)</th>
                        <th class="text-center">Contr&ocirc;les</th>
                    </tr>
                    <?php
                    if($listeF!=null && sizeof($listeF)>0)
                        foreach ($listeF as $item) {
                            echo"
                            <tr>
                            <td class='pt-3-half' >".$item->getNumF()."</td>
                            <td class='pt-3-half' >".$item->getNomComplet()."</td>
                            <td class='pt-3-half' >".$item->getAge()."</td>
                            <td class='pt-3-half' >".$item->getAdresse()."</td>
                            <td class='pt-3-half' >".$item->getPoids()."</td>
                            <td class='pt-3-half' >".$item->getTemperature()."</td>
                            <td class='pt-3-half' >".$item->getTaille()."</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=Fiche&numF=".$item->getNumF()
                                ."&nom=".$item->getNomComplet()
                                ."&age=".$item->getAge()
                                ."&adresse=".$item->getAdresse()
                                ."&poid=".$item->getPoids()
                                ."&temp=".$item->getTemperature()
                                ."&tail=".$item->getTaille()
                                ."&id=".$item->getIdPat()."'
                                     
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


<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 11/01/2019
 * Time: 16:13
 */