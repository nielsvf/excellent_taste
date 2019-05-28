<?php
include_once("../../DB/DBConfig.php");

$bestellingIdGet = $_GET["id"];




try {

    $sql_bestelling_klaar = "UPDATE bestelling SET klaar = 1 WHERE bestelling.bestelling_id = ?;";

    $stmt = $db->prepare($sql_bestelling_klaar);
    $stmt->execute(array($bestellingIdGet));

    $result = true;

    if ($result) {
        echo "<script>
            
            goBack();
            
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
?>