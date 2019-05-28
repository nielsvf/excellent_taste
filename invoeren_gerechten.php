<?php

include_once("DB/DBConfig.php");

$datumTijdGet = htmlspecialchars_decode($_GET["datumtijd"]);
$tafelNummerGet = $_GET["tafel"];

//Benodigde SQL Queries
$sql_gerechten_voorgerecht_warm = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 2';
$sql_gerechten_voorgerecht_koud = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 1';

$sql_gerechten_hoofdgerecht_vis = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 3';
$sql_gerechten_hoofdgerecht_vlees = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 4';
$sql_gerechten_hoofdgerecht_vega = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 5';

$sql_gerechten_nagerecht_ijs = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 8';
$sql_gerechten_nagerecht_mousse = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 9';

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

    <div class="container">


        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-6">
                    <h3>Invoeren bestelling gerechten tafel <?php echo $tafelNummerGet ?></h3>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
    </div>

    <!-- Voorgerechten -->
    <div style="margin-top:40px; color:black; background: white;" class="container">
        <button onclick="goBack()">Terug</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <br>
        <h1>Voorgerechten</h1>
        <br>
        <table class="table table-sm table-striped" >
            <thead>
            <tr>
                <th>Menu Item (Warm voorgerecht)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_voorgerecht_warm) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (Koud voorgerecht)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_voorgerecht_koud) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Einde voorgerechten -->

    <!-- Hoofdgerechten -->
    <div style="margin-top:40px; color:black; background: white;" class="container">
        <h1>Hoofdgerechten</h1>
        <br>
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (Visgerechten)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vis) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (Vleesgerechten)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vlees) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (Vegetarische gerechten)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vega) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Einde hoofdgerechten -->

    <!-- Nagerechten -->
    <div style="margin-top:40px; color:black; background: white;" class="container">
        <h1>Nagerechten</h1>
        <br>
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (IJs)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_nagerecht_ijs) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Menu Item (Mousse)</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_gerechten_nagerecht_mousse) as $results){ ?>
                <tr>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>
                        <form action="invoer_bestelling.php">
                            <input type="number" name="aantal"><br>
                            <input type="hidden" id="Tafel" name="tafel" value="<?php echo $tafelNummerGet ?>">
                            <input type="hidden" id="DatumTijd" name="datumtijd" value="<?php echo $datumTijdGet ?>">
                            <input type="hidden" id="MenuItem" name="menuitemcode" value="<?php echo $results["menuitemcode"] ?>">
                    </td>
                    <td><input type="submit" value="Voer in"></td>
                    </form>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Einde nagerechten -->

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



