<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <?php
        if(!isset($_GET['id'])){

        echo "
                <div class='card'>
                    <h5 class='card-header info-color white-text text-center py-4'>
                        <strong>Cr&eacute;ation Entreprise Abonn&eacute;e</strong>
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
              <strong>Modification Entreprise Abonn&eacute;e : <u class='text-primary'> ".$_GET['nom']."</u></strong>
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
                    <label for='adresse'>Adresse ou Siege Social</label>
                </div>
            </div>
            <div class='col'>
                <div class='md-form'>
                    <input type='text' id='tel' name='tel' class='form-control' value='<?= $_GET['tel'] ?>' >
                    <label for='tel'>T&eacute;l&eacute;phone</label>
                </div>
            </div>
        </div>
    <input type="hidden" value="<?= $_GET['idu']?>">
        <hr>
        <!-- Sign up button -->
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" type="submit" name="modif">Modifier</button>
            </div>
            <div class="col">
                <a class="btn btn-outline-info btn-rounded btn-block my-1 waves-effect z-depth-0" href="index2.php?action=New_entreprise" >Annuler</a>
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
                        <th class="text-center">Contr&ocirc;les</th>
                    </tr>
                    <?php
                    if($listeEntrep!=null && sizeof($listeEntrep)>0)
                        foreach ($listeEntrep as $item) {
                            echo"
                            <input type='hidden' name='id' value='".$item->getId()."'/>
                        <tr>
                            <td class='pt-3-half' >".$item->getNomEntrep()."</td>
                            <td class='pt-3-half' >".$item->getAdresse()."</td>
                            <td class='pt-3-half' >".$item->getTelephone()."</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=New_entreprise&id=".$item->getId()
                                ."&nom=".$item->getNomEntrep()
                                ."&adresse=".$item->getAdresse()
                                ."&tel=".$item->getTelephone()
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
 * Time: 09:38
 */