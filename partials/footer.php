
<!--Footer-->
<!--footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn corp">
    <hr class="my-1">

    <!-- Social icons>
    <div class="pb-4">
        <a href="https://www.facebook.com/mdbootstrap" target="_blank">
            <i class="fa fa-facebook mr-3"></i>
        </a>

        <a href="https://twitter.com/MDBootstrap" target="_blank">
            <i class="fa fa-twitter mr-3"></i>
        </a>

        <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
            <i class="fa fa-youtube mr-3"></i>
        </a>

        <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
            <i class="fa fa-google-plus mr-3"></i>
        </a>

        <a href="https://dribbble.com/mdbootstrap" target="_blank">
            <i class="fa fa-dribbble mr-3"></i>
        </a>

        <a href="https://pinterest.com/mdbootstrap" target="_blank">
            <i class="fa fa-pinterest mr-3"></i>
        </a>

        <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
            <i class="fa fa-github mr-3"></i>
        </a>

        <a href="http://codepen.io/mdbootstrap/" target="_blank">
            <i class="fa fa-codepen mr-3"></i>
        </a>
    </div>
    < Social icons -->

    <!--Copyright>
    <div class="footer-copyright py-3">
        © <?php echo date('Y')?> Copyright: allrights reserved by
        <a href="https://www.akatech243.com/" target="_blank"> Akatech243</a>
        <!--a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> ngoylusa@gmail.com </a-->
    </div>
    <!--/.Copyright>

</footer -->
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        choix=$('.intern');
        choix2=$('.type_pat');
        entrep=$('.entrep');
        motif=$('.motif');
        entrep.hide();
        $('.divrech').hide();
        $('#loader').hide();
        $('#affic').hide();


        typAgent=$('.type_ag');
        typMed=$('.type_med');
        nbEn=$('.nbEnf');
        pseudo=$('.pseudo')
        pass=$('.pass')
        btn=$('.sauve')
        btnV=$('.btnValider')

        pu=$('.pu');
        pt=$('.pt');
        qte=$('.qte');
        codeArt=$('.codeArt')

        totx=$('.totaux');
        totxr=$('.totauxr');
        som=0
        sm=0

        pur=$('.pur').val();
        qter=$('.qtercp')
        qtec=$('.qtecmd')

        if(motif != null)
        {
            motif.hide();
            motif.val(som);
        }

        if(nbEn != null)
        {
            nbEn.val(som);
            nbEn.hide();
        }
        if(pseudo != null)
        {
            pseudo.val(som);
            pseudo.hide();
        }
        if(pass != null)
        {
            pass.val(som);
            pass.hide();
        }

        choix.change(function () {
            if(choix.val()=='inter')
            {
                if (motif != null) motif.show();
            }
            if(choix.val()=='ninter')
            {
                if (motif != null) motif.hide();
            }
            if(choix.val()=='')
            {
                if (motif != null) motif.hide();
            }

        });

        choix2.change(function () {

            if(choix2.val()=='abonne') entrep.show();
            else entrep.hide();

        });


        qte.keyup(function () {

            if ((pu.val()>0) && (qte.val()>0))
            {
                t=pu.val()*qte.val();
                pt.val(t);
                $('.ptl').html('')
            }else if ((pu.val().length == 0) || ($(this).val().length == 0))
            {
                pt.val('');
                $('.ptl').html('Prix Total')
            }
        });

         pu.keyup(function () {

            if ((pu.val()>0) && (qte.val()>0))
            {
                t=pu.val()*qte.val();
                pt.val(t);
                $('.ptl').html('')
            }else if ((qte.val().length == 0) || ($(this).val().length == 0))
            {
                pt.val('');
                $('.ptl').html('Prix Total')
            }
        });

        qter.keyup(function (){
            if((parseInt(qter.val()) > parseInt(qtec.val())) || isNaN(qter.val()) || (parseInt(qter.val())<0))
            {
                qter.val(0)
            }else
            {
                t=pur*qter.val();
                $('.ptr').val(t);
                $('#ptr').val(t);
                $('.ptl').html('')
            }
        });


            $('#tabProd tr').each(function () {
                ptt=$(this).find('td').eq(5).html();
                if(ptt!= undefined)
                    som=som+parseInt(ptt)
            });
            totx.val(som);


            $('#tabRecp tr').each(function () {
                pttr=$(this).find('td').eq(7).html();
                if(pttr != undefined)
                    sm=sm+parseInt(pttr)
            });
            totxr.val(sm);

        /* agent new*/
        typAgent.change(function () {
            if(typAgent.val()=='marie' || typAgent.val()=='celibataire2')
            {
                if(nbEn != null) nbEn.show();
            }
            else
            {
                if(nbEn != null)
                {                    nbEn.hide();
                    nbEn.val('aucun');
                }
            }
        });

        typMed.change(function () {
                if(typMed.val()=='medecin'|| typMed.val()=='adminis')
                {
                    pseudo.show();
                    pass.show();
                }else
                {
                    pseudo.val('aucun')
                    pass.val('aucun')
                    pseudo.hide();
                    pass.hide();
                }
        });
        // Les loader pour les articles
        codeArt.keyup(function () {
            if($(this).val().length<3)
            {
                $('.message').html("Encore un caract&eacute;re")
            }
            else if ($(this).val().length >3)
            {
                $('.message').html("")
                $.ajax({
                    type:'POST',
                    url:'partials/ajaxLoader.php',
                    data:{codeArt:codeArt.val()},
                    timeout:30000,
                    success: function (data) {
                      if(data != 'Aucun Produit')
                      {
                          $('.desi').val(data);
                          $('.desiL').html('')

                      }else
                      {
                          alert("Aucun Produit ne correspond a ce code : "+ codeArt.val()+" \n veuillez l'enregistrer avant de pouvoir le commander")
                      }
                    },
                    error:function () {
                        $('.message').html("La requete n'a pas abouti");
                    }
                });

            }
        })

/*----------------------script de recherche-------------------------------*/
    function debounce(callback, delay) {
        var timer;
        return function () {
            var args=arguments;
            var context=this;
            clearTimeout(timer);
            timer=setTimeout(function () {
                callback.apply(context,args)
            },delay)
        }
    };



        $('.rech').bind("keyup focusin",debounce(function () {
            $('.divaff').hide();
            $('.divrech').show();
            rech=$('.rech').val();
            $('#loader').show();
            $('#loader').html('<img src="images/loader.gif" /> <span class="text-danger"> Veuillez patienter. Recherche en cours.....</span>');

                if(rech.length>3)
                {
                    $.ajax({
                        type:'POST',
                        url:'partials/ajaxLoader.php',
                        data:{descr:rech},
                        //dataType:'json',
                        timeout:30000,
                        success:function (datas)
                        {
                            if(datas != null) {
                                $('#res').html('');
                                $('#affic').show();
                                $('#loader').hide();
                                json = JSON.parse(datas)
                                $.each(json, function (i, obj) {
                                    var ligne = $('<tr></tr>')
                                    var col1 = $('<td class="pt-3-half"></td>').text(obj.numcmd)
                                    var col2 = $('<td class="pt-3-half"></td>').text(obj.datecmd)
                                    var col3 = $('<td class="pt-3-half"></td>').text(obj.descr)
                                    var col4 = $('<td class="pt-3-half"></td>').text(obj.nomfss)
                                    var col5 = $('<td class="pt-3-half"></td>').text(obj.dev)
                                    var col7 = $('<td class="pt-3-half"></td>')
                                    var col6 = $('<a class="btn btn-primary btn-rounded btn-sm my-0"></a>').text('View Detail')
                                    col6.attr('href', 'index2.php?action=View_Detail&numcmd=' + obj.numcmd)
                                    col7.append(col6)
                                    ligne.append(col1, col2, col3, col4, col5, col7)
                                    $('#res').append(ligne)
                                })
                            }else
                            {
                                $('#res').html('');
                                $('#affic').show();
                                $('#loader').hide();
                                var ligne = $('<tr></tr>')
                                var infos=$('<span class="text-danger"></span>').text('Aucune information ne correspond a votre description!!!')
                                ligne.append(infos)
                                $('#res').append(ligne);
                            }

                        },
                        error:function (data) {
                            $('#loader').html(data);
                        }

                    });
                }else
                {
                    $('#res').html('');
                    $('#affic').hide();
                    $('#loader').show();

                }

        },350));

        $('.rech').focusout(function () {
            //console.log('test')
            if($(this).val().length<=0)
            {
                $('.divaff').show();
                $('.divrech').hide();
            }
        })
        $('.msg').hide();
/*-----------------------------btn valider bon caissier-----------------------*/
            btnV.click(function (e) {
                e.preventDefault();
                numcmd=$('.numcmd').val();
                $.ajax
                ({
                    type:'POST',
                    url:'partials/ajaxLoader.php',
                    data:{numcmd:numcmd},
                    //dataType:'json',
                    timeout:30000,
                    success:function (data) {
                        if(data!='')
                        {
                            location.href='index2.php?action=Valider_CMD'
                        }else
                        {
                            $('.msg').show();

                            $('.msg').html('Erreur de validation veuillez Reessayer svp!!!\n contacter ladministrateur si la situation persiste')
                        }
                    }

                });
            })
            $('.btnValid').click(function (e) {
                e.preventDefault();
                numcmd=$('.numcmd').val();
                $.ajax
                ({
                    type:'POST',
                    url:'partials/ajaxLoader.php',
                    data:{nmcmd:numcmd},
                    //dataType:'json',
                    timeout:30000,
                    success:function (data) {
                        if(data!='')
                        {
                            location.href='index2.php?action=Validation_CMD'
                        }else
                        {
                            $('.msg').show();

                            $('.msg').html('Erreur de validation veuillez Reessayer svp!!!\n contacter ladministrateur si la situation persiste')
                        }
                    }

                });
            })
            $('.btnrejet').click(function (e) {
                e.preventDefault();
                numcmd=$('.numcmd').val();
                $.ajax
                ({
                    type:'POST',
                    url:'partials/ajaxLoader.php',
                    data:{nmcmdrejt:numcmd},
                    //dataType:'json',
                    timeout:30000,
                    success:function (data) {
                        if(data!='')
                        {
                            location.href='index2.php?action=Validation_CMD'
                        }else
                        {
                            $('.msg').show();

                            $('.msg').html('Erreur de validation veuillez Reessayer svp!!!\n contacter ladministrateur si la situation persiste')
                        }
                    }

                });
            })



    })
</script>
<script type="text/javascript">
    var temps=0;
    id='<?= $_SESSION['idUser'];?>'
    function session(id) {
        window.location="controls/deconnexion.control.php?id="+id
    }

    function time_out() {
        if (temps < 300)
        {
            temps++
        }
        else
        {
            session(id)
        }
        setTimeout('time_out()',1000)
    }

    //
</script>


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
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            datasets: [
                {
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }
            ]
        },
        options: {
            responsive: true
        }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        },
        options: {
            responsive: true
        }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
        type: 'radar',
        data: {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]
        },
        options: {
            responsive: true
        }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [
                {
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }
            ]
        },
        options: {
            responsive: true
        }
    });

</script>

<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>
<script>
    // Regular map
    function regular_map() {
        var var_location = new google.maps.LatLng(40.725118, -73.997699);

        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };

        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }

    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
</script>

</body>

</html>
<?php
/**
 * Created by PhpStorm.
 * User: Mecxer
 * Date: 21/12/2018
 * Time: 08:39
 */
ob_end_flush();