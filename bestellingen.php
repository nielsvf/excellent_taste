<?php

$datumTijdGet = htmlspecialchars_decode($_GET["datumtijd"]);
$tafelNummerGet = $_GET["tafel"];

include_once("/DB/DBConfig.php");

?>

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

        <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


        <link rel="stylesheet" href="assets/css/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    </head>

    <body>


    <?php include 'includes/menu.php'; ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" style="background: #dee2e8;" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- Header-->

        <?php if (isset($tafelNummerGet) & isset($datumTijdGet)) { ?>
            <div style="margin-top:40px; color:black; background: white;" class="container">
                <button onclick="goBack()">Terug</button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
                <br>
                <a href="invoeren_gerechten.php?tafel=<?php echo $tafelNummerGet; ?>&datumtijd=<?php echo $datumTijdGet;?>">Hoofdmenu bestelling invoeren</a><br><br>
                <a href="invoeren_hapjes.php?tafel=<?php echo $tafelNummerGet; ?>&datumtijd=<?php echo $datumTijdGet;?>">Hapjesmenu bestelling invoeren</a><br><br>
                <a href="invoeren_dranken.php?tafel=<?php echo $tafelNummerGet; ?>&datumtijd=<?php echo $datumTijdGet;?>">Drank bestelling invoeren</a><br><br>
                <a href="bon.php?tafel=<?php echo $tafelNummerGet; ?>&datumtijd=<?php echo $datumTijdGet;?>">Bon</a><br><br>
            </div>
        <?php } ?>
        <!-- start -->
        <!-- Voorgerechten -->


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
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>

    </body>

    </html>