<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card">

            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste Utilisateurs Bloqu&eacute;s</h3>
            <div class="col-md-12 mb-4">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                                   aria-hidden="true"></i></a></span>


                    <table class="table table-bordered table-responsive-md table-striped table-sm text-center" id="tabProd">
                        <tr>
                            <th class="text-center">Num</th>
                            <th class="text-center">Pseudo</th>
                            <th class="text-center">Type </th>
                            <th class="text-center">Etat </th>
                            <th class="text-center">Operations</th>
                        </tr>


                        <?php if(!empty($all) and sizeof($all)>=0)
                        {
                            $k=1;
                            foreach ($all as $item)
                            {
                                echo " <tr>
                                        <td>".$k++."</td>
                                        <td>".$item->getPseudo()."</td>
                                        <td>".$item->getType()."</td>
                                        <td class='text-danger'> Bloqu&eacute;</td>
                                        
                                       <td> <span class='table-edit'>
                                        <a href='index2.php?action=Lock_user&id=".$item->getId()."'
                                               class='btn btn-primary btn-rounded btn-sm my-0'>Debloqu&eacute;</a></span></td></tr>
                                       ";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 01/03/2019
 * Time: 10:00
 */