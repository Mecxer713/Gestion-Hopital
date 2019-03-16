<main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">
        <!-- Material form register -->
        <div class="card ">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Prescription Ordonnance</strong>
            </h5>
            <!--Card content-->
            <div class="col-md-12 mb-4">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" method="post">
                    <!-- First name -->
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="numord" name="numord" class="form-control"  <?php echo get_input('numord')?> required >
                                <label for="numord">Numero Ordonnance</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="nommal" name="nommal" class="form-control"  <?php echo get_input('nommal')?> required >
                                <label for="nommal">Nom Du Malade</label>
                            </div>
                        </div>

                        <!-- Last name -->
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="age" name="age" class="form-control"  <?php echo get_input('age')?> required >
                                <label for="age">Age</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="sexe" name="sexe" class="form-control"  <?php echo get_input('sexe')?> required >
                                <label for="sexe">Sexe</label>
                            </div>
                        </div>
                        <!-- Phone number -->
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="poids"name="poids" class="form-control"  <?php echo get_input('poids')?> required >
                                <label for="poids">Poids</label>

                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="nommed" name="nommed" class="form-control"  <?php echo get_input('nommed')?> required >
                                <label for="nommed">Nom Medecin</label>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                    <div class="md-form">
                        <input type="text" id="prixtot" name="prixtot" class="form-control"  <?php echo get_input('prixtot')?> required >
                        <label for="prixtot">Prix Total</label>

                    </div>
                        </div>
                        <div class="col">
                    <div class="md-form">

                        <input type="text" id="datepres"name="datepres" class="form-control"  <?php echo get_input('datepres')?> required >
                        <label for="datepres">Date </label>

                    </div>
                        </div>
                        <div class="col">
                            <div class="md-form">

                                <input type="text" id="medpres" name="medpres" class="form-control"  <?php echo get_input('medpres')?> required >
                                <label for="medpres">      Medicaments prescrits</label>

                            </div>
                        </div>
                    </div>

                </form>
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
    </div>
    <div class="container-fluid mt-5">
        <div class="card">

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Prescriptions</h3>
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center">
                        <tr>
                            <th class="text-center">Numero Ordonnance</th>
                            <th class="text-center">Nom Malade</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Sexe</th>
                            <th class="text-center">Poids</th>
                            <th class="text-center">Date </th>
                            <th class="text-center">Nom Medecin</th>
                            <th class="text-center">Medicaments</th>
                            <th class="text-center">Prix Total</th>
                        </tr>
                        <tr>
                            <?php foreach ($dispensaires as $k=> $dispensaire):?>
                        <tr>

                            <td><?php echo $dispensaire['num_ordonnance'];?></td>
                            <td><?php echo $dispensaire['nom_malade'];?></td>
                            <td><?php echo $dispensaire['age'];?></td>
                            <td><?php echo $dispensaire['sexe'];?></td>
                            <td><?php echo $dispensaire['poids'];?></td>
                            <td><?php echo $dispensaire['datedes'];?></td>
                            <td><?php echo $dispensaire['nom_medecin'];?></td>
                            <td><?php echo $dispensaire['medicaments'];?></td>
                            <td><?php echo $dispensaire['prix_tot'];?></td>

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