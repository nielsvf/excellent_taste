<?php
echo '<meta http-equiv="refresh" content="5">';
$dateToday = date('Y-m-d');


$sql_ober_overzicht_klaar = "SELECT * FROM bestelling LEFT JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE bestelling.klaar = 1 AND datumtijd LIKE '%$dateToday%' ORDER BY datumtijd, tafel DESC";


?>

<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <br>
    <p>Elke 5 seconden wordt de pagina herladen zodat je up-to-date blijft met wat er geserveerd moet worden</p>
    <br>
    <table class="table table-sm table-striped" >
        <h3>Klaar</h3>
        <thead>
        <tr>
            <th>Tijd</th>
            <th>Tafel</th>
            <th>Menuitem</th>
            <th>Aantal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_ober_overzicht_klaar) as $results){ ?>
            <tr>
                <td><?php echo $results["datumtijd"]; ?></td>
                <td><?php echo $results["tafel"]; ?></td>
                <td><?php echo $results["menuitem"]; ?></td>
                <td><?php echo $results["aantal"]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>