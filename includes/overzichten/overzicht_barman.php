<?php
echo '<meta http-equiv="refresh" content="5">';
$dateToday = date('Y-m-d');
$sql_gerechten_overzicht = "SELECT * FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE bestelling.klaar = 0 AND datumtijd LIKE '%$dateToday%' AND menuitem.subgerechtcode BETWEEN 10 AND 13 ORDER BY datumtijd, tafel DESC";


?>

<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <br>
    <p>Elke 5 seconden wordt de pagina herladen zodat je up-to-date blijft met wat er gemaakt moet worden</p>
    <br>
    <table class="table table-sm table-striped">
        <h3>Overzicht barman</h3>
        <thead>
        <tr>
            <th>Tijd</th>
            <th>Tafel</th>
            <th>Menuitem</th>
            <th>Aantal</th>
            <th>klaar</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_overzicht) as $results){ ?>
            <tr>
                <td><?php echo $results["datumtijd"]; ?></td>
                <td><?php echo $results["tafel"]; ?></td>
                <td><?php echo $results["menuitem"]; ?></td>
                <td><?php echo $results["aantal"]; ?></td>
                <?php if ($results["klaar"] === "0") {?>
                <td><a href="includes/overzichten/overzicht_klaar.php?id=<?php echo $results["bestelling_id"];?>"><font color="green">Klaar</font></a></td>
                <?php } else {?>
                <td><a href=""><img border="0" alt="W3Schools" src="images/checked.png" width="15" height="15"></a></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>