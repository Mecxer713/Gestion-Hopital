
<!--Main layout-->
<main class="pt-5 mx-lg-1">
    <div class="container-fluid mt-5">
        <div class="outter-wp">
            <h3 class="text-primary" align="right">
                <i class="fa fa-calendar"></i><?php echo date('l').' '.date("d-F-Y");?></h3>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="text-primary" align="center">Aper&ccedil;u du MEDECIN</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                echo '<h2>'.$compte.'</h2>';
                                                ?>
                                                <span>Patientes Enregistrées</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                echo '<h2>'.$nbreP.'</h2>';
                                                ?>
                                                <span>Patientes à consulter </span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                echo '<h2>'.$gestCons.'</h2>';
                                                ?>
                                                <span>Patientes déjà consult</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                echo '<h2>'.$consult.'</h2>';
                                                ?>
                                                <span>Consultations faites</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="col-lg-4">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <?php
                                            if (isset($_SESSION['username']))
                                            {
                                                echo '<p>Tache du jour pour  '. $_SESSION['username'].'</p>';
                                            } else
                                            {
                                                echo '<p>Tache du jour pour .....</p>';

                                            }?>

                                        </div>

                                        <div class="au-task-list js-scrollbar3">

                                            <?php
                                            if ((!empty($listeplan) && sizeof($listeplan)>0) )
                                            {
                                                foreach ($listeplan as $plan)
                                                {
                                                    echo '
                                                        <div class="au-task__item au-task__item--danger">
                                                             <div class="au-task__item-inner">
                                                                <h5 class="task">';
                                                                echo '<a href="#">'.$plan->getNomComplet().'</a></h5>
                                                                <span class="time">'.$plan->getHeure().'</span> </div> </div>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">

                                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Planning</h3>
                                    <div class="col-md-12 mb-4">
                                        <div id="table" class="table-editable">
                                            <span class="table-add float-right mb-3 mr-2"><a href="#!"
                                                class="text-success"><i class="fas fa-plus fa-2x"
                                                aria-hidden="true"></i></a></span>
                                            <table class="table table-bordered table-responsive-md table-striped table-sm text-center">
                                                <tr>
                                                    <th class="text-center">Numero Fiche</th>
                                                    <th class="text-center">Nom Patient</th>
                                                    <th class="text-center">Date consultation</th>
                                                    <th class="text-center">Heure Consultation</th>
                                                </tr>
                                                <?php
                                                    if ((!empty($listeplan2) && sizeof($listeplan2) > 0)) {
                                                        foreach ($listeplan2 as $item) {

                                                            echo "                                                                                           
                                                                
                                                            <tr>                            
                                                                <td class='pt-3-half' >" . $item->getNumF() . "</td>
                                                                <td class='pt-3-half' >" . $item->getNomComplet() . "</td>
                                                                <td class='pt-3-half' >" . $item->getDateC() . "</td>
                                                                <td class='pt-3-half' >" . $item->getHeure() . "</td>                                                                
                                                                </tr>";
                                                        }
                                                    }
                                                ?>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</main>
<!--Main layout-->
