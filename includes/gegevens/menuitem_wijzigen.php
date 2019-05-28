<?php

$menuitemcode = $_GET["wijzig"];


$sql = "SELECT * FROM menuitem WHERE menuitem.menuitemcode = $menuitemcode ";
?>


    <div style="margin-top:40px; color:black; background: white;" class="container">
        <button onclick="goBack()">Terug</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <br>

        <?php if (isset($menuitemcode)) { ?>
            <?php foreach ($db->query($sql) as $results){ ?>
                <div class="main-div">
                    <div class="panel">
                        <h2>Gerecht wijzigen</h2>
                        <p>Wijzig hier het gerecht.</p>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gerechtNaam">Gerechtnaam</label>
                            <input type="text" value="<?php echo $results['menuitem']; ?>" class="form-control" id="gerechtNaam" name="gerecht" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Prijs</label>
                            <input type="number" value="<?php echo $results['prijs']; ?>" step="0.01" class="form-control" id="gerechtPrijs" name="prijs" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Wijzig</button>
                        <br>
                    </form>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

<?php
if(isset($_POST["submit"])) {
    $gerechtNaam = htmlspecialchars($_POST["gerecht"]);
    $gerechtPrijs = htmlspecialchars($_POST["prijs"]);
    try {

        $sql2 = "INSERT INTO menuitem (gerechtcode, subgerechtcode, menuitemcode, menuitem, prijs) VALUES (?, ?, ?, ?, ?);";

        $sql3 = "UPDATE menuitem SET menuitem = ?, `prijs` = ? WHERE menuitem.menuitemcode = $menuitemcode;";

        $stmt = $db->prepare($sql3);
        $stmt->execute(array($gerechtNaam, str_replace(",", ".", $gerechtPrijs)));

        $result = true;

        if ($result) {
            echo "<script>location.href=''</script>";
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
}

?>