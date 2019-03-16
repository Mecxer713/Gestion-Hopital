
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>

    <?php

    echo isset($title)? $title.' - GestionHopital':'Gestion d&apos;un Hopital';
    if($title=="Home" )
    {
        $clas="active";
    }else
    {
        $clas="";
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

       <!--css pour le theme -->
    <link href="css/style5.css" rel='stylesheet' type='text/css' />


</head>

<body class="grey lighten-3" onmousemove="temps=0" onload="time_out()">
<!--Main Navigation-->
<header>
<?php include_once 'navigation.php'; echo "<input type='hidden' value='".$_SESSION['idUser']."' class='idUser'/> ";  ?>
</header>
<!--Main Navigation-->