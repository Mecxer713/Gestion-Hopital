
<!--Main layout-->
<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="./index2.php" >Accueil</a>
                    <span>/</span>
                    <span>Statistique</span>
                </h4>

                <form class="d-flex justify-content-center">
                    <!-- Default input -->
                    <input type="search" placeholder="votre recherche ici" aria-label="Search" class="form-control">
                    <button class="btn btn-primary btn-sm my-0 p" type="submit">
                        <i class="fa fa-search"></i>
                    </button>

                </form>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-9 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">

                        <canvas id="myChart"></canvas>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->
            <!--Card-->
            <div class="card mb-4">

                <!--Card content-->
                <div class="card-body">

                    <!-- List group links -->
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action waves-effect">Malaria
                            <span class="badge badge-success badge-pill pull-right">22%
                                        <i class="fa fa-arrow-up ml-1"></i>
                                    </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Fievre
                            <span class="badge badge-danger badge-pill pull-right">5%
                                        <i class="fa fa-arrow-down ml-1"></i>
                                    </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Cholera
                            <span class="badge badge-primary badge-pill pull-right">14</span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Grippe
                            <span class="badge badge-primary badge-pill pull-right">123</span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Paludisme
                            <span class="badge badge-primary badge-pill pull-right">8</span>
                        </a>
                    </div>
                    <!-- List group links -->

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</main>
<!--Main layout-->
<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 08:40
 */