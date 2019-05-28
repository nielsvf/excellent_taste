<?php include_once("DB/DBConfig.php"); ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Excellent Taste</title>
    <meta name="description" content="Excellent Taste">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

<!-- Menu -->
<?php include 'includes/menu.php'; ?>


<div id="right-panel" style="background: #dee2e8;" class="right-panel">

    <!-- Header-->
    <?php include 'includes/header.php'; ?>
    <!-- Header-->

    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-5">
                <h1>Reserveringen</h1>
            </div>
            <div class="col">
            </div>
        </div>

        <?php
        if (isset($_GET["nieuw"])) { //Als reservering?=nieuw is, dan include je reservering_nieuw.php
            include 'includes/reservering/reservering_nieuw.php';
        }
        else if (isset($_GET["wijzig"])&& isset($_GET["datumtijd"])) { //Als reservering?=wijzig is, dan include je reservering_wijzig.php
            include 'includes/reservering/reservering_wijzig.php';
        }
        else if (isset($_GET["verwijder"])) { //Als reservering?=verwijder is, dan include je reservering_verwijder.php
            include 'includes/reservering/reservering_verwijder.php';
            include 'includes/reservering/reserveer_lijst.php';
        }
        else {
            include 'includes/reservering/reserveer_lijst.php'; //Als er geen argumenten zijn gepasseert, dan laat de applicatie de lijst met reserveringen zien
        }
        ?>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <!--<script>-->
    <!--    (function($) {-->
    <!--        "use strict";-->
    <!---->
    <!--        jQuery('#vmap').vectorMap({-->
    <!--            map: 'world_en',-->
    <!--            backgroundColor: null,-->
    <!--            color: '#ffffff',-->
    <!--            hoverOpacity: 0.7,-->
    <!--            selectedColor: '#1de9b6',-->
    <!--            enableZoom: true,-->
    <!--            showTooltip: true,-->
    <!--            values: sample_data,-->
    <!--            scaleColors: ['#1de9b6', '#03a9f5'],-->
    <!--            normalizeFunction: 'polynomial'-->
    <!--        });-->
    <!--    })(jQuery);-->
    <!--</script>-->

</body>

</html>
