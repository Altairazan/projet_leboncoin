<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="register.css">
</head>
<header>
    <img src="images/logo.png" alt="Logo Lebonchoix" class="logo">
</header>
<body>
    
    <main class="main-container">
        <div class="form-container">
            <h1><b>Inscription</b></h1>
            <form action="" method="post">
                <input type="text" name="nom" placeholder="Nom" required><br><br>
                <input type="text" name="prenom" placeholder="Prénom" required><br><br>
                <input type="email" name="email" placeholder="Adresse e-mail" required><br><br>
                <input type="password" name="mdp" placeholder="Mot de passe" required><br><br>
                <input type="file" name="avatar"><br><br>
                <input type="submit" value="S'inscrire" name="bout">
            </form>
        </div>
    </main>
</body>
</html>
<?php
    if(isset($_POST['bout'])){ // si le bouton est cliqué
        var_dump($_POST);
        var_dump($_FILES);

        echo $_POST["nom"]."<br>";
        // if($_FILES["avatar"]["size"] > 5000){
        //     echo "Erreur : fichier trop volumineux";
        // }else{
        //     echo "Fichier OK";
        // }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $id = mysqli_connect("localhost","root","","aide");
        $req = "select * from user where mail='$email'";
        $res = mysqli_query($id,$req);
        if(mysqli_num_rows($res)>0){
            echo "Erreur : Adresse e-mail déjà utilisée";
            }else{

        move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatars/$nom.jpg");
        
        $requete = "INSERT INTO user (nom, prenom, mail, mdp, avatar, niveau)
                    values ('$nom','$prenom','$email','$mdp','$nom.jpg',0)";
        $resultat = mysqli_query($id,$requete);  
            }
    }
    ?>
