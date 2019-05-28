<?php

?>



<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <div class="main-div">
        <div class="panel">
            <h2>Reservering toevoegen</h2>
            <p>Voer hier een nieuwe reservering in.</p>
        </div>
        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="tafelNummer">Tafel</label>
                <input type="number" class="form-control" id="tafelNummer" placeholder="Tafelnummer" name="tafelnummer" required>
            </div>

            <div class="form-group">
                <label for="dateTime">Datum & Tijd</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="dateTime" placeholder="0000/00/00 00:00" name="datumtijd"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="klantNaam">Klant naam</label>
                <input type="text" class="form-control" id="klantNaam" placeholder="Naam" name="klantnaam" required>
            </div>

            <div class="form-group">
                <label for="telefoonNummer">Telefoonnummer</label>
                <input type="text" class="form-control" id="telefoonNummer" placeholder="0000-00000000" name="telefoonnummer" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Aantal</label>
                <input type="number" class="form-control" id="Aantal" placeholder="1" name="aantal" required>
            </div>

            <div class="form-group">
                <label for="Opmerking">Opmerking</label>
                <!--                <input type="textarea" step="0.01" class="form-control" id="gerechtPrijs" placeholder="€1.00" name="prijs" required>-->
                <textarea class="form-control" id="Opmerking" placeholder="Opmerking klant" name="opmerking" rows="3" cols="40"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
            <br>
        </form>
    </div>
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
    $klantNaam = htmlspecialchars($_POST["klantnaam"]);
    $telefoonNummer = htmlspecialchars($_POST["telefoonnummer"]);
    $aantal = htmlspecialchars($_POST["aantal"]);
    $opmerking = htmlspecialchars($_POST["opmerking"]);

    $klant_id = '';
    try {

        $stmt = $db->prepare("SELECT * FROM klant WHERE telefoon = '$telefoonNummer'");
        //$stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row)
        {
            $sql_get_klantid = "SELECT * FROM klant WHERE telefoon = '$telefoonNummer'";

            foreach ($db->query($sql_get_klantid) as $results) {
                $klant_id = $results["klant_id"];

                if ($results["opgedaagt"] === "nee") {
                    echo "<script>alert('Waarschuwing: Klant " . $results["klantnaam"] . " is de vorige keer niet komen opdagen.')</script>";
                }
            }
        }
        else {
            $sql = "INSERT INTO klant (klant_id, klantnaam, telefoon, opgedaagt) VALUES (?, ?, ?, ?);";

            $stmt = $db->prepare($sql);
            $stmt->execute(array('', $klantNaam, $telefoonNummer, ''));

            $sql_get_klantid = "SELECT * FROM klant WHERE telefoon = '$telefoonNummer'";

            foreach ($db->query($sql_get_klantid) as $results) {
                $klant_id = $results["klant_id"];
            }
        }
        
        $sql_reservering_toevoegen = "INSERT INTO reservering (tafel, datumtijd, klant_id, aantal, opmerking) VALUES (?, ?, ?, ?, ?);";

        $stmt = $db->prepare($sql_reservering_toevoegen);
        if($klant_id === null) {
            $stmt->execute(array($tafelNummer, $datumTijd, $klant_id, $aantal, $opmerking));
        } else {
            $stmt->execute(array($tafelNummer, $datumTijd, $klant_id, $aantal, $opmerking));
        }



        $result = true;

        if ($result) {
            echo "<script>location.href=''</script>";
//            echo "<script>location.href='gegevens_gerechten.php?addsubgerechtcode=$subgerechtcode&gerechtcode=$gerechtcode';</script>";
        }
        else {
            echo "<script>alert('Fout met het toevoegen van reservering')</script>";
        }
    }
    catch (PDOException $e) {
        echo "<script>alert('Fout met het toevoegen van reservering')</script>";
        echo $e->getMessage();
    }
}

?>

