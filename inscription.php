<?php require('./inc/init.php'); ?>
<?php include_once("./inc/template/haut.php"); ?>
<br>
<br>
<br>
<?php
// executeRequete("INSERT INTO utilisateur (slug,email, passwrd,is_admin) VALUES ('test1', 'test1', '123', 0);")

// executeRequete("DELETE FROM blog.'user' where id_user=1");
if ($_POST) {
    // debug($_POST['email']);
    $utilisateur = executeRequete("SELECT * FROM utilisateur WHERE slug='$_POST[pseudo]'");
    if ($utilisateur->num_rows > 0) {
        // Problème
    } else {
        $_POST['passwrd'] = password_hash($_POST['passwrd'], PASSWORD_BCRYPT);
        executeRequete("INSERT INTO utilisateur (slug, email, passwrd, is_admin) VALUES ('$_POST[pseudo]', '$_POST[email]', '$_POST[passwrd]', 0)");
        // Utilisateur ajouté avec succès
    }
}

?>


<br>
<br>
<h1>Inscription</h1>
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Votre pseudo</label>
        <input name="pseudo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Votre mail</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Votre mot de passe</label>
        <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
<?php include_once("./inc/template/bas.php"); ?>