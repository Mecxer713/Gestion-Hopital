<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php
        echo isset($title)? $title.' - GestionHopital':'Gestion d&apos;un Hopital';
        if($title=="Home" || $title=="Single" || $title=="Login" || $title=="Signup")
        {
            $clas="active";
        }
        ?>
    </title>
    <!-- Font Awesome -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 col-xl-5 mb-4">

                <!-- Material form login -->
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Inscription Medecin Directeur</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">

                        <!-- Form -->
                        <form class="text-center" style="color: #757575;" method="post"  autocomplete="off">

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

                            <!-- Pseudo -->
                            <div class="md-form">
                                <input required name="noms" type="text" id="noms" class="form-control" value="<?= get_input('noms')?>" />
                                <label for="noms">Nom Complet</label>
                            </div>
                            <div class="md-form">
                                <input required name="tel" type="text" id="tel" class="form-control" value="<?= get_input('tel')?>" />
                                <label for="tel">T&eacute;l&eacute;phone</label>
                            </div>
                            <div class="md-form">
                                <input required name="adresse" type="text" id="adr" class="form-control" value="<?= get_input('adresse')?>" />
                                <label for="adr">Adresse</label>
                            </div>

                            <div class="md-form">
                                <input required name="categ" type="text" id="categ" class="form-control" value="<?= get_input('categ')?>" />
                                <label for="categ">Categorie</label>
                            </div>
                            <div class="md-form">
                                <input required name="qualif" type="text" id="qualif" class="form-control" value="<?= get_input('qualif')?>" />
                                <label for="qualif">Qualification</label>
                            </div>

                             <div class="md-form">
                                <input required name="pseudo" type="text" id="pseudo" class="form-control" value="<?= get_input('pseudo')?>" />
                                <label for="pseudo">Choisir Pseudo ou Nom Utilisateur</label>
                            </div>

                            <!-- Password -->
                            <div class="md-form">
                                <input required name="pass" type="password" id="materialLoginFormPassword" class="form-control" value="<?= get_input('pass')?>" />
                                <label for="materialLoginFormPassword">Choisir Mot de passe</label>
                            </div>
                            <hr>
                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="signupMed">S'inscrire</button>


                        </form>
                        <!-- Form -->

                    </div>

                </div>
                <!-- Material form login -->

            </div>
            <div class="col-md-3"></div>

        </div><br><br><br>


    </div>
</main>
<!--Main layout-->


<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>
</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 17/02/2019
 * Time: 11:03
 */