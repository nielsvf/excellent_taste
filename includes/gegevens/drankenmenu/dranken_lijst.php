<?php


$sql_gerechten_drank_warm = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 10';
$sql_gerechten_drank_bier = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 11';

$sql_gerechten_drank_huiswijn = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 12';
$sql_gerechten_drank_frisdrank = 'SELECT * FROM menuitem LEFT JOIN subgerecht ON menuitem.subgerechtcode = subgerecht.subgerechtcode LEFT JOIN gerecht ON menuitem.gerechtcode = gerecht.gerechtcode WHERE subgerecht.subgerechtcode = 13';


?>


<div style="margin-top:40px; color:black; background: white;" class="container">
    <button onclick="goBack()">Terug</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <br>
    <h1>Dranken</h1>
    <br>
    <table class="table table-sm table-striped" >
        <thead>
        <tr>
            <th>Menu Item (warme dranken) [<a href="?addsubgerechtcode=10&gerechtcode=4"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_drank_warm) as $results){ ?>
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
            <th>Menu Item (bieren) [<a href="?addsubgerechtcode=11&gerechtcode=4"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_drank_bier) as $results){ ?>
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

<!-- Hoofdgerechten -->
<div style="margin-top:40px; color:black; background: white;" class="container">
    <br>

    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th>Menu Item (huiswijnen) [<a href="?addsubgerechtcode=12&gerechtcode=4"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_drank_huiswijn) as $results){ ?>
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
            <th>Menu Item (frisdranken) [<a href="?addsubgerechtcode=13&gerechtcode=4"><font color="red">Voeg toe</font></a>]</th>
            <th>Prijs</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($db->query($sql_gerechten_drank_frisdrank) as $results){ ?>
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
