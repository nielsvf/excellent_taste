<?php
$dateToday = date('Y-m-d');
$totaalDag = 0;
$totaalWeek = 0;

$totalDagArray = array();


$sql_excellenttaste_omzet = "SELECT * FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE bestelling.klaar = 1 AND datumtijd LIKE '%$dateToday%' ORDER BY datumtijd, tafel DESC";


?>

<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <br>
    <br>

    <table class="table table-sm table-striped" >
        <h3>Omzet van week</h3>
        <thead>
        <tr>
            <th>Dag</th>
            <th>Omzet</th>
        </tr>
        </thead>
        <tbody>

    <?php

    function getWeekNumber() {
        $dto2 = new DateTime();
        $ddate = $dto2->format('Y-m-d');
        $date = new DateTime($ddate);
        $week = $date->format("W");
        return $week;
    }

    function getCurrentYear() {
        $dto2 = new DateTime();
        $ddate = $dto2->format('Y');
        return $ddate;
    }

    function getStartAndEndDate($week, $year) {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
    }

    $week_array = getStartAndEndDate(getWeekNumber(),(int)getCurrentYear());
//    echo $week_array['week_start'] . '<br>';
//    echo $week_array['week_end'] . '<br>';


    $begin = new DateTime( (string)$week_array['week_start'] );
    $end = new DateTime( (string)$week_array['week_end'] );
    $end = $end->modify( '+1 day' );

    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);

    foreach($daterange as $date){

        $dateRange = $date->format('Y-m-d');
        $timestamp = strtotime($dateRange);

        $day = date('l', $timestamp);
        //echo $dateRange . " " . $day;

        $sql_omzet_dag = "SELECT bestelling.prijs AS bestelling_prijs FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE datumtijd LIKE '%$dateRange%'";

        ?>
    <tr>
        <td><?php echo $day; ?></td>
            <?php foreach ($db->query($sql_omzet_dag) as $results){ ?>
                        <?php

                        $totaalDag += (double)$results["bestelling_prijs"];
                        ?>

                    <?php } ?>
        <td>
            <?php echo '€' . $totaalDag;
            $totaalDag = 0;?>
        </td>
    <tr>
    <?php } ?>


        </tbody>
    </table>


    <?php

    $week_start = $week_array['week_start'];
    $week_end = $week_array['week_end'];
    $sql_omzet_dag = "SELECT bestelling.prijs AS bestelling_prijs FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE datumtijd BETWEEN '$week_start' AND '$week_end'";
    foreach ($db->query($sql_omzet_dag) as $results) {
        $totaalWeek += (double)$results["bestelling_prijs"];
    }
        ?>
    <b>Totaal: </b>€<?php echo $totaalWeek ?>
</div>