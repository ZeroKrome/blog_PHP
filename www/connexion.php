<?php require('./inc/init.php'); ?>
<?php
// logique
debug($_SESSION);

if (isset($_GET['action']) && $_GET['action'] === "deconnexion") {
    session_destroy();
}
if (internauteEstConnecte()) {
    header("location: profil.php")
}

// action + redirection profil

if ($_POST) {
    $resultat = executeRequete("SELECT * FROM utilisateur where slug='$_POST[slug]'");
    if ($resultat->num_rows != 0) {
        $utilisateur = $resultat->fetch_assoc();
        if (password_verify($_POST['passwrd'], $utilisateur['passwrd'])) {
            foreach ($utilisateur as $indice => $element) {
                if ($indice != 'passwrd') {
                    $_SESSION['utilisateur'][$indice] = $element;
                }
            }
            header('location: profil.php');
        } else {
            $contenu .= '<div class="erreur">Erreurde mot de passe</div>';
        }
    } else {
        $contenu .= '<div class="erreur"> erreur pseudo inexistant</div>';
    }
}
?>
<?php include_once("./inc/template/haut.php"); ?>
<?php echo $contenu ?>
<br>
<br>
<br>
<h1>Connexion</h1>
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Votre pseudo</label>
        <input name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Votre mot de passe</label>
        <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php include_once("./inc/template/bas.php"); ?>