<?php

$subgerechtcode = $_GET["addsubgerechtcode"];
$gerechtcode = $_GET["gerechtcode"];
$subgerecht = '';

$sql_subgerechtnaam = "SELECT subgerecht FROM subgerecht WHERE subgerecht.subgerechtcode = $subgerechtcode;";
?>


<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <br>

    <?php foreach ($db->query($sql_subgerechtnaam) as $results){
        $subgerecht = $results['subgerecht']?>

    <?php } ?>
            <div class="main-div">
                <div class="panel">
                    <h2><?php echo $subgerecht ?>  toevoegen</h2>
                    <p>Voer hier een nieuw gerecht in.</p>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gerechtNaam">Gerechtnaam</label>
                        <input type="text" class="form-control" id="gerechtNaam" placeholder="Gerechtnaam" name="gerecht" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Prijs</label>
                        <input type="number" step="0.01" class="form-control" id="gerechtPrijs" placeholder="€1.00" name="prijs" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
                    <br>
                </form>
            </div>
</div>

<?php
    if(isset($_POST["submit"])) {
        $gerechtNaam = htmlspecialchars($_POST["gerecht"]);
        $gerechtPrijs = htmlspecialchars($_POST["prijs"]);
    try {
        $sql = "SELECT * FROM gebruiker WHERE Email = ? AND Wachtwoord = ?";

        $sql2 = "INSERT INTO menuitem (gerechtcode, subgerechtcode, menuitemcode, menuitem, prijs) VALUES (?, ?, ?, ?, ?);";

        $stmt = $db->prepare($sql2);
        $stmt->execute(array($gerechtcode, $subgerechtcode, null, $gerechtNaam, str_replace(",", ".", $gerechtPrijs)));

        $result = true;

        if ($result) {
            echo "<script>location.href=''</script>";
//            echo "<script>location.href='gegevens_gerechten.php?addsubgerechtcode=$subgerechtcode&gerechtcode=$gerechtcode';</script>";
        }
        else {
            echo "<script>alert('Fout met het toevoegen van gerecht')</script>";
        }
    }
    catch (PDOException $e) {
        echo "<script>alert('Fout met het toevoegen van gerecht')</script>";
        echo $e->getMessage();
        }
    }

?>