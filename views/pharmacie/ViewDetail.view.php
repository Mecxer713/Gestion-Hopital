<main class="pt-5 mx-lg-1">
        <div class="container-fluid mt-5">
            <div class="card mb-4 wow fadeIn">
                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">
                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="./index2.php">Accueil</a>
                        <span>/</span>
                        <span><?= $title ?></span>
                    </h4>

                    <form class="d-flex justify-content-center">
                        <!-- Default input -->
                        <input type="search" placeholder="Tapez une description ici" aria-label="Search"
                               class="form-control rech">
                    </form>

                </div>
            </div>
        </div>
        <div class="container-fluid mt-5 divrech">
            <div id="loader"></div>
            <div id="affic">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-md table-striped table-sm text-center"
                               id="res">

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid mt-5 divaff">
            <?php
            if (!empty($listCmd) && sizeof($listCmd) > 0)
            {
            ?>
            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Bons des Commandes
                    Valid&eacute;s</h3>
                <div class="card-body">

                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center ">
                        <tr>
                            <th class="text-center">Num&eacute;ro commande</th>
                            <th class="text-center">Date Commande</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Fournisseur</th>
                            <th class="text-center">Devise commande</th>
                            <th class="text-center">Contr&ocirc;les</th>
                        </tr>
                        <?php foreach ($listCmd as $item) {

                            echo "
                        <tr>
                            <td class='pt-3-half' >" . $item->getNumCmd() . "</td>
                            <td class='pt-3-half' >" . $item->getDateCreation() . "</td>
                            <td class='pt-3-half' >" . $item->getDescr() . "</td>
                            <td class='pt-3-half' >" . $item->getNomFournisseur() . "</td>
                            <td class='pt-3-half' >" . $item->getDevise() . "</td>
                            <td>
                                <span class='table-remove'>
                                    <a href='index2.php?action=View_Detail&numcmd=" . $item->getNumCmd() . "    
                              ' class='btn btn-primary btn-rounded btn-sm my-0' > View Detail</a>
                                </span>
                                
                            </td>
                        </tr>";
                        }
                        }?>
                    </table>
                </div>
            </div>

        </div>
    </main>
    <?php
    /**
     * Created by PhpStorm.
     * User: Mecxer
     * Date: 24/02/2019
     * Time: 13:47
     */
