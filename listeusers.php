<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1><hr>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Avatar</th>
        </tr>
        <?php
            $id = mysqli_connect("localhost","root","","aide");
            $req = "select * from user order by nom";
            $res = mysqli_query($id,$req);
            while($ligne = mysqli_fetch_assoc($res)){
                echo "<tr>";
                    echo "<td>".$ligne['idu']."</td>";
                    echo "<td>".$ligne['nom']."</td>";
                    echo "<td>".$ligne['prenom']."</td>";
                    echo "<td>".$ligne['mail']."</td>";
                    echo "<td><img src='avatars/".$ligne['avatar']."' width='50px' height='50px'></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>