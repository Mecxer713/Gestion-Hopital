<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <?php
        if(!isset($_GET['id'])){

        echo "
                <div class='card'>
                    <h5 class='card-header info-color white-text text-center py-4'>
                        <strong>Cr&eacute;ation D&apos;un Agent</strong>
                    </h5>
                    <!--Card content-->
                    <div class='card-body px-lg-5 pt-0'>
                        <form class='text-center' style='color: #757575;' method='post' id='myform'>";
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
                    <label for='nom'>Nom Complet Agent</label>
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
                    <input type='text' id='adresse' name='adresse' class='form-control'  value="<?= get_input('adresse')?>" required >
                    <label for='adresse'>Adresse </label>
                </div>
            </div>

            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='categ' name='categ' class='form-control'  value="<?= get_input('categ')?>" required >
                    <label for='categ'>Categorie</label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='qualif' name='qualif' class='form-control'  value="<?= get_input('qualif')?>" required >
                    <label for='qualif'>Qualification</label>
                </div>
            </div>
            <div class="col ">
                <div class="mdb-select md-form">
                    <select name="type_ag" class="form-control type_ag">
                        <option value="">Selectionnez un Etat Civil</option>
                        <option value="marie">Mari&eacute;</option>
                        <option value="celibataire">C&eacute;libataire</option>
                        <option value="celibataire2">C&eacute;libataire avec Enfant</option>
                    </select>
                </div>
            </div>
            <div class='col nbEnf'>
                <div class='md-form'>
                    <input type='number' id='nbEnf' name='nbEnf' class='form-control'  value="<?= get_input('nbEnf')?>"  />
                    <label for='nbEnf'>Nombre Enfant</label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col ">
                <div class="mdb-select md-form">
                    <select name="type_med" class="form-control type_med">
                        <option value="">Selectionnez un Type</option>
                        <option value="medecin">Medecin</option>
                        <option value="adminis">Administratif</option>
                        <option value="nonmedecin">non Medecin</option>
                    </select>
                </div>
            </div>
            <div class="col pseudo">
                <div class="md-form ">
                    <input  name="pseudo" type="text" id="pseudo" class="form-control" value="<?= get_input('pseudo')?>" />
                    <label for="pseudo">Choisir Pseudo ou Nom Utilisateur</label>
                </div>
            </div>

                <div class="col pass">
                    <div class="md-form">
                        <input  name="pass" type="password" id="materialLoginFormPassword" class="form-control" value="<?= get_input('pass')?>" />
                        <label for="materialLoginFormPassword">Choisir Mot de passe</label>
                    </div>
                </div>
            <!-- Password -->

        </div>

        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 sauve" type="submit" name="sauve">Sauvegarder</button>
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
                    <input type='text' id='tel' name='tel' class='form-control' value='<?= $_GET['tel'] ?>' >
                    <label for='tel'>T&eacute;l&eacute;phone</label>
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
                    <input type='text' id='categ' name='categ' class='form-control'  value='<?= $_GET['categ'] ?>' >
                    <label for='categ'>Categorie</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='qualif' name='qualif' class='form-control'  value='<?= $_GET['qualif'] ?>' >
                    <label for='categ'>Qualification</label>
                </div>
            </div>
        </div>
        <input type="hidden" name="idu" value="<?= $_GET['idu']?>">
        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="submit" name="modif">
                    Modifier</button>
            </div>
            <div class="col">
                <a class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" href="index2.php?action=New_user" >
                    Annuler</a>
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Agents</h3>
            <div class="card-body">

                <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                    <tr>
                        <th class="text-center">Nom Complet</th>
                        <th class="text-center">T&eacute;l&eacute;phone</th>
                        <th class="text-center">Adresse</th>
                        <th class="text-center">Categorie</th>
                        <th class="text-center">Qualification</th>
                        <th class="text-center">Contr&ocirc;les</th>
                    </tr>
                    <?php
                    if($listeAg!=null && sizeof($listeAg)>0)
                        foreach ($listeAg as $item) {
                            echo"
                            <input type='hidden' name='id' value='".$item->getId()."'/>
                        <tr>
                            <td class='pt-3-half' >".$item->getNoms()."</td>
                            <td class='pt-3-half' >".$item->getTelephone()."</td>
                            <td class='pt-3-half' >".$item->getAdresse()."</td>
                            <td class='pt-3-half' >".$item->getCategorie()."</td>
                            <td class='pt-3-half' >".$item->getQualification()."</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=New_user&id=".$item->getId()
                                ."&nom=".$item->getNoms()
                                ."&tel=".$item->getTelephone()
                                ."&adresse=".$item->getAdresse()
                                ."&categ=".$item->getCategorie()
                                ."&qualif=".$item->getQualification()
                                ."&idu=".$item->getIdUser() ."
                                                    ' class='btn btn-primary btn-rounded btn-sm my-0' > Editer</a>
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
 * Date: 17/02/2019
 * Time: 10:02
 */