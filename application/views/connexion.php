<?php include_once("head.php"); ?>

<main role="main">
    <form action="" method="post" id="co">
        <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>
        <fieldset>
            <legend>Connexion</legend>
            <div class="main">
                <div id="dLogin">
                    <label for="login">Identifiant <em>*</em>:</label>
                    <input type="text" name="login" id="login" placeholder="entrer votre identifiant" value="" required
                           autofocus />
                </div>
                <br/>
                <div id="dMdp">
                    <label for="mdp">Mot de passe <em>*</em>:</label>
                    <input type="password" name="mdp" id="mdp" placeholder="entrer votre mot de passe" value=""
                           required/>
                    <br/><span><a href="#">Mot de passe oubli&eacute ?</a></span>
                </div>
                <div id="dSubmit">
                    <input type="submit" value="Se connecter"/>
                </div>
            </div>
        </fieldset>
    </form>
</main>

<?php include 'foot.php'; ?>