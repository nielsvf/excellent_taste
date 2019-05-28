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
    <link rel="shortcut icon" href="../favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


<?php include 'includes/menu.php';

$sql_gerechten_voorgerecht_warm = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 2';
$sql_gerechten_voorgerecht_koud = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 1';

$sql_gerechten_hoofdgerecht_vis = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 3';
$sql_gerechten_hoofdgerecht_vlees = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 4';
$sql_gerechten_hoofdgerecht_vega = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 5';

$sql_gerechten_nagerecht_ijs = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 8';
$sql_gerechten_nagerecht_mousse = 'SELECT menuitem.menuitem, menuitem.prijs, gerecht.gerecht FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 9';

?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" style="background: #dee2e8;" class="right-panel">

    <!-- Header-->
    <?php include 'includes/header.php'; ?>
    <!-- Header-->

    <p>Results</p>

<!--    <select class="form-control" id="exampleInputEmail1" name="cursustype" required>-->
<!---->
<!--        <option value="">Selecteer cursus</option>-->
<!--        --><?php //foreach ($db->query($sql_gerechten) as $results){ ?>
<!--            <option value="--><?php //echo $results["menuitem"]; ?><!--">--><?php //echo $results["menuitem"];?><!--</option>-->
<!--        --><?php //} ?>
<!--    </select>-->

    <!-- start -->
    <div style="margin-top:40px; color:white;" class="container">

            <table style="width:100%">
                <h1>Voorgerechten</h1>
                <br>
                <h3>Warme voorgerechten</h3>
                <tr>
                    <th>Menu Item</th>
                    <th>Prijs</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <?php foreach ($db->query($sql_gerechten_voorgerecht_warm) as $results){ ?>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>Wijzig</td>
                    <td>Verwijder</td>
                </tr>
        <?php } ?>

            <table style="width:100%">
                <br>
                <h3>Koude voorgerechten</h3>
                <tr>
                    <th>Menu Item</th>
                    <th>Prijs</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <?php foreach ($db->query($sql_gerechten_voorgerecht_koud) as $results){ ?>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td>€<?php echo $results["prijs"]; ?></td>
                    <td>Wijzig</td>
                    <td>Verwijder</td>
                </tr>
        <?php } ?>



                <table style="width:100%">
                    <br>
                    <h1>Hoofdgerechten</h1>
                    <br>
                    <h3>Visgerechten</h3>
                    <tr>
                        <th>Menu Item</th>
                        <th>Prijs</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vis) as $results){ ?>
                        <td><?php echo $results["menuitem"]; ?></td>
                        <td>€<?php echo $results["prijs"]; ?></td>
                        <td>Wijzig</td>
                        <td>Verwijder</td>
                    </tr>
                    <?php } ?>

                    <table style="width:100%">
                        <br>
                        <h3>Vleesgerechten</h3>
                        <tr>
                            <th>Menu Item</th>
                            <th>Prijs</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vlees) as $results){ ?>
                            <td><?php echo $results["menuitem"]; ?></td>
                            <td>€<?php echo $results["prijs"]; ?></td>
                            <td>Wijzig</td>
                            <td>Verwijder</td>
                        </tr>
                        <?php } ?>

                        <table style="width:100%">
                            <br>
                            <h3>Vegetarische gerechten</h3>
                            <tr>
                                <th>Menu Item</th>
                                <th>Prijs</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <?php foreach ($db->query($sql_gerechten_hoofdgerecht_vega) as $results){ ?>
                                <td><?php echo $results["menuitem"]; ?></td>
                                <td>€<?php echo $results["prijs"]; ?></td>
                                <td>Wijzig</td>
                                <td>Verwijder</td>
                            </tr>
                            <?php } ?>



<!--        <h1>Voorgerechten</h1>-->
<!--        <br>-->
<!--        <h3>Warme voorgerechten</h3>-->
<!--        <table style="width:100%">-->
<!--            <tr>-->
<!--                <th>Menu Item</th>-->
<!--                <th>Prijs</th>-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Tomatensoep</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Groentensoep</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Aspergesoep</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Uiensoep</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <br>-->
<!--        <h3>Koude voorgerechten</h3>-->
<!--        <table style="width:100%">-->
<!--            <tr>-->
<!--                <th>Menu Item</th>-->
<!--                <th>Prijs</th>-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Salade met geitenkaas</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Tonijnsalade</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Zalmsalade</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Uiensoep</td>-->
<!--                <td>€4,95</td>-->
<!--                <td>Wijzig</td>-->
<!--                <td>Verwijder</td>-->
<!--            </tr>-->
<!--        </table>-->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
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
<?php