<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - lebonchoix</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
        
            <h1><img src="images/logo.png" alt="Logo lebonchoix" class="logo-image"></h1>

            <form action="login.php" method="post">
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember"><strong>Se souvenir de moi</strong></label>
                </div>
                <button type="submit">Se Connecter</button>
            </form>
            <hr>
            <a href="register.php"><strong>Créez un compte </strong> </a>
        </div>
    </div>

    <?php
    if(isset($_POST['bout'])){ // si le bouton est cliqué
        

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


</body>
</html>