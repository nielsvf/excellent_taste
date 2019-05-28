<?php

$menuitemcode = $_GET["verwijder"];


    $sql = "DELETE FROM menuitem WHERE menuitem.menuitemcode = $menuitemcode";

    try {

        $sql3 = "DELETE FROM menuitem WHERE menuitem.menuitemcode = ?";

        $stmt = $db->prepare($sql3);
        $stmt->execute(array($menuitemcode));

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
                echo "<script>alert('Fout met het wijzigen van gerecht')</script>";
            }
        }
        catch (PDOException $e) {
            echo "<script>alert('Fout met het wijzigen van gerecht')</script>";
            echo $e->getMessage();
        }
?>