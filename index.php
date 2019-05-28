<?php
include_once("DB/DBConfig.php");
$dateToday = date('Y-m-d');
$sql_bestellingen_overzicht = "SELECT * FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE datumtijd LIKE '%$dateToday%' ORDER BY datumtijd, tafel DESC";


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
    <div style="margin-top:40px; color:black; background: white;" class="container">
        <br>

        <br>
        <table class="table table-sm table-striped" >
            <h3>Bestellingen vandaag</h3>
            <thead>
            <tr>
                <th>Tijd</th>
                <th>Tafel</th>
                <th>Menuitem</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db->query($sql_bestellingen_overzicht) as $results){ ?>
                <tr>
                    <td><?php echo $results["datumtijd"]; ?></td>
                    <td><?php echo $results["tafel"]; ?></td>
                    <td><?php echo $results["menuitem"]; ?></td>
                    <td><?php echo $results["aantal"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <a href="reserveringen.php"><b><font color="blue">Bestelling invoeren</font></b></a>
    </div>



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
