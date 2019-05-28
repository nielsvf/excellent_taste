<?php


$sql_gerechten_hapjes_warm = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 14';
$sql_gerechten_hapjes_koud = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 15';

?>

<!-- Voorgerechten -->
<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <br>
    <h1>Hapjes</h1>
    <br>
    <table class="table table-sm table-striped" >
        <thead>
        <tr>
            <th>Menu Item (koude hapjes) [<a href="?addsubgerechtcode=15&gerechtcode=5"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_hapjes_koud) as $results){ ?>
            <tr>
                <td><?php echo $results["menuitem"]; ?></td>
                <td>€<?php echo $results["prijs"]; ?></td>
                <td><a href="?wijzig=<?php echo $results["menuitemcode"]; ?>"><img border="0" alt="W3Schools" src="images/pencil-edit-button.png" width="15" height="15"></a></td>
                <td><a href="?verwijder=<?php echo $results["menuitemcode"]; ?>"><img border="0" alt="W3Schools" src="images/delete.png" width="15" height="15"></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th>Menu Item (warme hapjes) [<a href="?addsubgerechtcode=14&gerechtcode=5"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_hapjes_warm) as $results){ ?>
            <tr>
                <td><?php echo $results["menuitem"]; ?></td>
                <td>€<?php echo $results["prijs"]; ?></td>
                <td><a href="?wijzig=<?php echo $results["menuitemcode"]; ?>"><img border="0" alt="W3Schools" src="images/pencil-edit-button.png" width="15" height="15"></a></td>
                <td><a href="?verwijder=<?php echo $results["menuitemcode"]; ?>"><img border="0" alt="W3Schools" src="images/delete.png" width="15" height="15"></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Einde voorgerechten -->
