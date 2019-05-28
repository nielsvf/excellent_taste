<?php

$tafelNummerGet = $_GET["wijzig"];
$datumTijdGet = htmlspecialchars_decode($_GET["datumtijd"]);

$oudTafelNummer = '';
$oudDatumTijd = '';
$oudAantal = '';
$oudOpmerking = '';
$oudKlantId = $_GET["klantid"];

$sql_get_reservering = "SELECT * FROM reservering LEFT JOIN klant ON reservering.klant_id = klant.klant_id WHERE reservering.tafel = $tafelNummerGet AND reservering.datumtijd = '$datumTijdGet' AND klant.klant_id = $oudKlantId LIMIT 1";

$sql_set_reservering = "UPDATE reservering SET aantal = '3' WHERE reservering.tafel = $tafelNummerGet AND reservering.datumtijd = htmlspecialchars_decode($datumTijdGet);"

?>

    <div style="margin-top:40px; color:black; background: white;" class="container">
        <button onclick="goBack()">Terug</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <?php foreach ($db->query($sql_get_reservering) as $results){

            $oudTafelNummer = $results["tafel"];
            $oudDatumTijd = $results["datumtijd"];
            $oudAantal = $results["aantal"];
            $oudOpmerking = $results["opmerking"]; ?>


            <div class="main-div">
                <div class="panel">
                    <h2>Reservering wijzigen</h2>
                </div>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="tafelNummer">Tafel</label>
                        <input type="number" class="form-control" id="tafelNummer" value="<?php echo $results['tafel']; ?>" name="tafelnummer" required>
                    </div>

                    <div class="form-group">
                        <label for="dateTime">Datum & Tijd</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="dateTime" value="<?php echo $results['datumtijd']; ?>" name="datumtijd"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Aantal</label>
                        <input type="number" class="form-control" id="Aantal" value="<?php echo $results['aantal']; ?>" name="aantal" required>
                    </div>

                    <div class="form-group">
                        <label for="Opmerking">Opmerking</label>
                        <!--                <input type="textarea" step="0.01" class="form-control" id="gerechtPrijs" placeholder="€1.00" name="prijs" required>-->
                        <textarea class="form-control" id="Opmerking" placeholder="Opmerking klant" name="opmerking"  rows="3" cols="40"><?php echo $results['opmerking']; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Wijzig</button>
                    <br>
                </form>
            </div>
        <?php } ?>
    </div>

    <br>
    <br>

    <script type="text/javascript">
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
    </script>


<?php
if(isset($_POST["submit"])) {
    $tafelNummer = htmlspecialchars($_POST["tafelnummer"]);
    $datumTijd = htmlspecialchars($_POST["datumtijd"]);
    $aantal = htmlspecialchars($_POST["aantal"]);
    $opmerking = htmlspecialchars($_POST["opmerking"]);

    try {

        $sql_reservering_wijzigen = "UPDATE reservering SET tafel = ?, datumtijd = ?, aantal = ?, opmerking = ? WHERE reservering.tafel = $oudTafelNummer AND reservering.datumtijd = '$oudDatumTijd';
";

        $stmt = $db->prepare($sql_reservering_wijzigen);
        $stmt->execute(array($tafelNummer, $datumTijd, $aantal, $opmerking));


        $result = true;

        if ($result) {
            echo "<script>location.href=''</script>";
            echo "<script>location.href='reserveringen.php';</script>";
        }
        else {
            echo "<script>alert('Fout met het wijzigen van reservering')</script>";
        }
    }
    catch (PDOException $e) {
        echo "<script>alert('Fout met het wijzigen van reservering')</script>";
        echo $e->getMessage();
    }
}

?>