<?php

$tafelNummerGet = $_GET["verwijder"];
$datumTijdGet = htmlspecialchars_decode($_GET["datumtijd"]);




try {

    $sql_verwijder_reservering = "DELETE FROM reservering WHERE reservering.tafel = ? AND reservering.datumtijd = ?";

    $stmt = $db->prepare($sql_verwijder_reservering);
    $stmt->execute(array($tafelNummerGet, $datumTijdGet));

    $result = true;

    if ($result) {
        echo "<script>
            function goBack() {
                window.history.back();
            }
        </script>";

        //            echo "<script>location.href='gegevens_gerechten.php?addsubgerechtcode=$subgerechtcode&gerechtcode=$gerechtcode';</script>";
    }
    else {
        echo "<script>alert('Fout met het verwijderen van reservering')</script>";
    }
}
catch (PDOException $e) {
    echo "<script>alert('Fout met het verwijderen van reservering')</script>";
    echo $e->getMessage();
}