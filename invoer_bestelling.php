<?php

include_once("DB/DBConfig.php");

$aantalGet = $_GET["aantal"];
$tafelGet = $_GET["tafel"];
$datumTijdGet = $_GET["datumtijd"];
$menuItemCodeGet = $_GET["menuitemcode"];

$menuItemPrijs = '';

try {

    $sql_invoer_bestelling = "INSERT INTO bestelling (bestelling_id, tafel, datumtijd, menuitemcode, aantal, prijs, klaar) VALUES (?, ?, ?, ?, ?, ?, ?);";

    $sql_prijs_menuitemcode = "SELECT menuitem.prijs FROM menuitem WHERE menuitemcode = $menuItemCodeGet";

    foreach ($db->query($sql_prijs_menuitemcode) as $results) {
        $menuItemPrijs = $results["prijs"];
    }

    $stmt = $db->prepare($sql_invoer_bestelling);



    $stmt->execute(array('', $tafelGet, $datumTijdGet, $menuItemCodeGet, $aantalGet, $menuItemPrijs * $aantalGet, 0));



    echo "<script>
             goBack()
            function goBack() {
                window.history.back();
            }
        </script>";

    $result = true;

    if ($result) {

        //            echo "<script>location.href='gegevens_gerechten.php?addsubgerechtcode=$subgerechtcode&gerechtcode=$gerechtcode';</script>";
    }
    else {
        echo "<script>alert('Fout met het toevoegen van een bestelling')</script>";
    }
}
catch (PDOException $e) {
    echo "<script>alert('Fout met het toevoegen van een bestelling')</script>";
    echo $e->getMessage();
}
?>
