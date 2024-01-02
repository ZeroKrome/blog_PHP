<?php require('./inc/init.php');
$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. </div>";
if (password_verify($_POST['passwrd'], $utilisateur['passwrd']))
?>
<?php include_once("./inc/template/haut.php"); ?>
<br>
<br>
<br>
<h1>Inscription</h1>
<?php echo $contenu ?>
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