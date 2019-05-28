<?php


$sql_reservering_lijst = 'SELECT * FROM reservering LEFT JOIN klant ON reservering.klant_id = klant.klant_id ORDER BY datumtijd DESC ';

?>


<div style="margin-top:40px; color:black; background: white;" class="container">
    <br>
    [<a href="?nieuw"><font color="red">Nieuwe reservering</font></a>]
    <br>
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th>tafel</th>
            <th>datum en tijd</th>
            <th>klant</th>
            <th>tel. nr.</th>
            <th>aantal</th>
            <th>bestelling</th>
            <th>opmerking</th>
            <th>opgedaagd</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_reservering_lijst) as $results){ ?>
            <tr>
                <td><?php echo $results["tafel"]; ?></td>
                <td><?php echo $results["datumtijd"]; ?></td>
                <td><?php echo $results["klantnaam"]; ?></td>
                <td><?php echo $results["telefoon"]; ?></td>
                <td><?php echo $results["aantal"]; ?></td>
                <td><a href="bestellingen.php?tafel=<?php echo $results["tafel"]; ?>&datumtijd=<?php echo $results["datumtijd"];?>"><font color="green">Nieuw</font></a></td>
                <td><?php echo $results["opmerking"]; ?></td></td>
                <!--                <a href="sdf"></a>-->
                <td><form name='add' method="post">
                        <select name='opgedaagd'>
                            <?php if ($results["opgedaagt"] !== null) { ?>
                                <option value="" disabled selected><?php echo $results["opgedaagt"]; ?></option>
                            <?php } else { ?>
                                <option value='ja_<?php echo $results["klant_id"]; ?>' disabled selected>ja</option>
                            <?php }?>

                            <option value='ja_<?php echo $results["klant_id"]; ?>'>ja</option>
                            <option value='nee_<?php echo $results["klant_id"]; ?>'>nee</option>
                        </select>
                        <input type='submit' name='submit'/>
                    </form></td>
<!--                <td><a href="?wijzig=--><?php //echo $results["tafel"];?><!--&datumtijd=--><?php //echo $results["datumtijd"];?><!--&klantid=--><?php //echo $results["klant_id"];?><!--"><font color="blue">Wijzig</font></a></td>-->
                <td><a href="?wijzig=<?php echo $results["tafel"];?>&datumtijd=<?php echo $results["datumtijd"];?>&klantid=<?php echo $results["klant_id"];?>"><img border="0" alt="W3Schools" src="images/pencil-edit-button.png" width="15" height="15"></a></td>
<!--                <td><a href="?verwijder=--><?php //echo $results["tafel"];?><!--&datumtijd=--><?php //echo $results["datumtijd"];?><!--"><font color="red">Verwijder</font></a></td>-->
                <td><a href="?verwijder=<?php echo $results["tafel"];?>&datumtijd=<?php echo $results["datumtijd"];?>"><img border="0" alt="W3Schools" src="images/delete.png" width="15" height="15"></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php
if(isset($_POST["submit"])) {
    $post_answer = htmlspecialchars($_POST["opgedaagd"]);

    $pieces = explode("_", $post_answer);
    $klant_id = $pieces[1];
    $answer = $pieces[0];


    try {
        $sql = "UPDATE klant SET opgedaagt = ? WHERE klant.klant_id = ?;";
//
//        $sql2 = "INSERT INTO menuitem (gerechtcode, subgerechtcode, menuitemcode, menuitem, prijs) VALUES (?, ?, ?, ?, ?);";
//
        $stmt = $db->prepare($sql);
        $stmt->execute(array($answer, $klant_id));

        $result = true;

        if ($result) {
            echo "<script>location.href='';</script>";
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
