<?php include 'head.php'; ?>
    <body>
<main>
    <h2>Ajout d'un parent</h2>

    <form method="post" id="ajParent">
        <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>
        <fieldset class="fieldset-grand">
            <legend>Information du parent</legend>

                <div>
                    <label for="nom">Nom <em>*</em>:</label>
                    <input type="text" placeholder="Nom" id="nom" name="nom" required autofocus/>
                </div>
                <div>
                    <label for="prenom">Prénom <em>*</em>:</label>
                    <input type="text" placeholder="Prénom" id="prenom" name="prenom" required/>
                </div>
                <div>
                    <label for="ville">Ville <em>*</em>: </label>
                    <select id="ville" name="idVille" required>
                        <?php foreach ($villes as $ville) { ?>
                            <option value="<?= $ville->id(); ?>"><?= $ville->nom(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="login">Login <em>*</em>:</label>
                    <input type="text" placeholder="Login" id="login" name="login">
                </div>
                <div>
                    <label for="mdp">Mot de passe <em>*</em>:</label>
                    <input type="text" placeholder="Mot de passe" id="mdp" name="mdp">
                </div>
                <div>
                    <label for="mail">Adresse mail <em>*</em>:</label>
                    <input type="text" placeholder="Mail" id="mail" name="mail">
                </div>
                <div>
                    <label for="tel">Téléphone :</label>
                    <input type="text" placeholder="Téléphone" id="tel" name="tel">
                </div>

        </fieldset>
        <br/>

        <div id="dSubmitAj">
            <input type="submit" value="Ajout du parent"/>
        </div>
    </form>
</main>

<?php include 'foot.php'; ?>