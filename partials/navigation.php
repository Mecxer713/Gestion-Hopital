<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 18/01/2019
 * Time: 20:24
 */
if(isset($_SESSION['idUser']))
{
    $id=$_SESSION['idUser'];
    if($_SESSION['typeUser']=='admin')
    {

        echo"        
        <nav class='navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar'>
        <div class='container-fluid'>


            <a class='navbar-brand waves-effect' href='./index2.php' >
                <strong class='blue-text'>Gestion Hopital</strong>
            </a>


            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>


            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item $clas'>
                        <a class='nav-link waves-effect' href='./index2.php'>Acceuil
                            <span class='sr-only'>(current)</span>
                        </a>
                    </li>
                    <li class='nav-item". set_active('Pharmacie')."'>
                        <a class='nav-link waves-effect' href='index2.php?action=Pharmacie'>Pharmacie</a>
                    </li>
                    <li class='nav-item". set_active('Dispensaire')."'>
                        <a class='nav-link waves-effect '
                         href='index2.php?action=Dispensaire'>Dispensaire</a>
                    </li>
                    <li class='nav-item". set_active('Maternite')."'>
                        <a class='nav-link waves-effect'
                           href='index2.php?action=Maternite'>Maternite</a>
                    </li>
                </ul>


                <ul class='navbar-nav nav-flex-icons'>
                    <li class='nav-item'>
                        <a href='#' class='nav-link waves-effect' >
                            <i class='fa fa-facebook'></i>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='#' class='nav-link waves-effect' >
                            <i class='fa fa-twitter'></i>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='controls/deconnexion.control.php?id=$id'
                           class='nav-link border border-light rounded waves-effect'>
                            <i class='fa fa-github mr-2'></i>Deconnexion
                        </a>

                    </li> 
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class='sidebar-fixed position-fixed'>

        <a class='logo-wrapper waves-effect'>
            <img src='images/logo.jpg' class='img-fluid' alt=''>
        </a>

        <div class='list-group list-group-flush'>
            <!--h1><img  src='contents/global.jpg'/></h1-->
            <a href='index2.php?action=New_patients' class='list-group-item ".set_active('New_patients')." waves-effect'>
                <i class='fa fa-pie-chart mr-3'></i>Nouveau patient
            </a>
            <a href='index2.php?action=Consultation' class='list-group-item list-group-item ".set_active('Consultation')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Consultation Patients</a>
            <a href='index2.php?action=Abonnement' class='list-group-item list-group-item ". set_active('Abonnement')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Gestion Abonnement</a>
            <a href='index2.php?action=View_Detail' class='list-group-item list-group-item ". set_active('View_Detail')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Commande Valide</a>
            <a href='index2.php?action=Valider_CMD' class='list-group-item list-group-item ". set_active('Valider_CMD')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Commande à Valide</a>
            <a href='index2.php?action=Validation_CMD' class='list-group-item list-group-item ". set_active('Validation_CMD')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Commande à Valide Med</a>
                
            <!--a href='index2.php?action=Chamber' class='list-group-item list-group-item ". set_active('Chamber')." waves-effect'>
                <i class='fa fa-table mr-3'></i>Chambre occuper</a>
            <a href='index2.php?action=New_visits' class='list-group-item list-group-item ". set_active('New_visits')." waves-effect'>
                <i class='fa fa-map mr-3'></i>Nouveau visite</a>
            <a href='index2.php?action=All_visits' class='list-group-item list-group-item ". set_active('All_visits')." waves-effect'>
                <i class='fa fa-money mr-3'></i>Liste des visites</a>
            <a href='index2.php?action=Planning' class='list-group-item list-group-item ".set_active('Planning')." waves-effect'>
                <i class='fa fa-money mr-3'></i>Planning docteur</a-->
            <a href='index2.php?action=new_produit' class='list-group-item list-group-item ". set_active('new_produit')." waves-effect'>
                <i class='fa fa-money mr-3'></i>Nouveau Produit</a >
                <a href='index2.php?action=New_User' class='list-group-item list-group-item " .set_active('New_User')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Ajouter Agent</a>
            <a href='index2.php?action=New_entreprise' class='list-group-item list-group-item ". set_active('New_entreprise')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Creer Contrat</a>
            <a href='index2.php?action=Online_user' class='list-group-item list-group-item ". set_active('Online_user')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Utilisateurs Connect&eacute;s</a>
            <a href='index2.php?action=Lock_user' class='list-group-item list-group-item ". set_active('Lock_user')." waves-effect'>
                <i class='fa fa-calendar mr-3'></i>Utilisateurs Bloqu&eacute;s</a>
                
                <!--h1><img  src='contents/global.jpg'/></h1-->
             <a href='index2.php?action=Fournisseur' class='list-group-item list-group-item " .set_active('Fournisseur')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Fournisseur</a>
            <a href='index2.php?action=Pharmacie' class='list-group-item list-group-item ". set_active('Pharmacie')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Ajout Produit</a>
            <a href='index2.php?action=Commande' class='list-group-item list-group-item ". set_active('Commande')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Bon de Commande</a>
            <a href='index2.php?action=Reception' class='list-group-item list-group-item ". set_active('Reception')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Bon de Reception</a>
             <a href='index2.php?action=Historique_Stock' class='list-group-item list-group-item ". set_active('Historique_Stock')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Historique de Stock</a>
               
        </div>

    </div>       
        
        ";

    }elseif ($_SESSION['typeUser']=='caissier')
    {
        echo"
        
        <nav class='navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar'>
        <div class='container-fluid'>


            <a class='navbar-brand waves-effect' href='./index2.php' >
                <strong class='blue-text'>Gestion Hopital</strong>
            </a>


            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>


            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item $clas'>
                        <a class='nav-link waves-effect' href='./index2.php'>Acceuil
                            <span class='sr-only'>(current)</span>
                        </a>
                    </li>
                    </ul>
                    
                <ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                        <a href='controls/deconnexion.control.php?id=$id'
                           class='nav-link border border-light rounded waves-effect'>
                            <i class='fa fa-github mr-2'></i>Deconnexion
                        </a>

                    </li> 
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class='sidebar-fixed position-fixed'>

        <a class='logo-wrapper waves-effect'>
            <img src='images/logo.jpg' class='img-fluid' alt=''>
        </a>

        <div class='list-group list-group-flush'>
            <a href='index2.php?action=Valider_CMD' class='list-group-item list-group-item ". set_active('Valider_CMD')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Commande à Valide</a>
                
            
        </div>

    </div>       
        
        ";


    }elseif ($_SESSION['typeUser']=='infirmier')
    {
        include_once 'views/infirmier/home_inf.view.php';

    }elseif ($_SESSION['typeUser']=='infirmier principal')
    {
        echo"
        
        <nav class='navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar'>
        <div class='container-fluid'>


            <a class='navbar-brand waves-effect' href='./index2.php' >
                <strong class='blue-text'>Gestion Hopital</strong>
            </a>


            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>


            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item $clas'>
                        <a class='nav-link waves-effect' href='./index2.php'>Acceuil
                            <span class='sr-only'>(current)</span>
                        </a>
                    </li>
                    </ul>
                    
                <ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                        <a href='controls/deconnexion.control.php?id=$id'
                           class='nav-link border border-light rounded waves-effect'>
                            <i class='fa fa-github mr-2'></i>Deconnexion
                        </a>

                    </li> 
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class='sidebar-fixed position-fixed'>

        <a class='logo-wrapper waves-effect'>
            <img src='images/logo.jpg' class='img-fluid' alt=''>
        </a>

        <div class='list-group list-group-flush'>
            <!--h1><img  src='contents/global.jpg'/></h1-->
             <a href='index2.php?action=Consultation' class='list-group-item list-group-item ".set_active('Consultation')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Consultation Patients</a>
            <a href='index2.php?action=Abonnement' class='list-group-item list-group-item ". set_active('Abonnement')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Gestion Abonnement</a>
            <a href='index2.php?action=Dispensaire' class='list-group-item list-group-item ". set_active('Dispensaire')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Gestion Ordonnance</a>
                
            
        </div>

    </div>       
        
        ";

    }elseif ($_SESSION['typeUser']=='magasinier')
    {
        include_once 'views/magasinier/home_mag.view.php';

    }elseif ($_SESSION['typeUser']=='pharmacien')
    {
        echo "
        
        <nav class='navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar'>
        <div class='container-fluid'>


            <a class='navbar-brand waves-effect' href='./index2.php' >
                <strong class='blue-text'>Gestion Hopital</strong>
            </a>


            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>


            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item $clas ;?>'>
                        <a class='nav-link waves-effect' href='./index2.php'>Acceuil
                            <span class='sr-only'>(current)</span>
                        </a>
                    </li>
                    </ul>
                    
                <ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                        <a href='controls/deconnexion.control.php?id=$id'
                           class='nav-link border border-light rounded waves-effect'>
                            <i class='fa fa-github mr-2'></i>Deconnexion
                        </a>

                    </li> 
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class='sidebar-fixed position-fixed'>

        <a class='logo-wrapper waves-effect'>
            <img src='images/logo.jpg' class='img-fluid' alt=''>
        </a>

        <div class='list-group list-group-flush'>
            <!--h1><img  src='contents/global.jpg'/></h1-->
             <a href='index2.php?action=FactureProforma' class='list-group-item list-group-item " .set_active('FactureProforma')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Facture Proforma</a>
            <a href='index2.php?action=Pharmacie' class='list-group-item list-group-item ". set_active('Pharmacie')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Ajout Produit</a>
            <a href='index2.php?action=Commande' class='list-group-item list-group-item ". set_active('Commande')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Bon de Commande</a>
            <a href='index2.php?action=Reception' class='list-group-item list-group-item ". set_active('Reception')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Bon de Reception</a>
             <a href='index2.php?action=Historique_Stock' class='list-group-item list-group-item ". set_active('Historique_Stock')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Historique de Stock</a>
            
        </div>

    </div>       
        
        ";

    }elseif ($_SESSION['typeUser']=='receptionniste')
    {
        include_once 'views/receptionniste/home_recep.view.php';

    }elseif ($_SESSION['typeUser']=='medecin directeur')
    {
        echo "
        
        <nav class='navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar'>
        <div class='container-fluid'>


            <a class='navbar-brand waves-effect' href='./index2.php' >
                <strong class='blue-text'>Gestion Hopital</strong>
            </a>


            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>


            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item $clas'>
                        <a class='nav-link waves-effect' href='./index2.php'>Acceuil
                            <span class='sr-only'>(current)</span>
                        </a>
                    </li>
                    </ul>
                    
                <ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                        <a href='controls/deconnexion.control.php?id=$id'
                           class='nav-link border border-light rounded waves-effect'>
                            <i class='fa fa-github mr-2'></i>Deconnexion
                        </a>

                    </li> 
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class='sidebar-fixed position-fixed'>

        <a class='logo-wrapper waves-effect'>
            <img src='images/logo.jpg' class='img-fluid' alt=''>
        </a>

        <div class='list-group list-group-flush'>
            <!--h1><img  src='contents/global.jpg'/></h1-->
             <a href='index2.php?action=New_User' class='list-group-item list-group-item " .set_active('New_User')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Ajouter Agent</a>
            <a href='index2.php?action=New_entreprise' class='list-group-item list-group-item ". set_active('New_entreprise')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Creer Contrat</a>
            <a href='index2.php?action=Online_user' class='list-group-item list-group-item ". set_active('Online_user')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Utilisateurs Connect&eacute;s</a>
            <a href='index2.php?action=Lock_user' class='list-group-item list-group-item ". set_active('Lock_user')." waves-effect'>
                <i class='fa fa-calendar mr-3'></i>Utilisateurs Bloqu&eacute;s</a>
            <a href='index2.php?action=Validation_CMD' class='list-group-item list-group-item ". set_active('Validation_CMD')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Commande à Valide</a>
             <a href='index2.php?action=Fournisseur' class='list-group-item list-group-item " .set_active('Fournisseur')." waves-effect'>
                <i class='fa fa-user mr-3'></i>Fournisseur</a>
            
           
            
        </div>

    </div>       
        
        ";
    }

}