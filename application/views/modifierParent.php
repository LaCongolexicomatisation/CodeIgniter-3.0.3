<?php include 'head.php'; ?>
    <body>
    <main>
        <h2>Ajout d'un parent</h2>

        <form method="post" id="ajParent">
            <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>
            <fieldset>
                <legend>Information du parent</legend>
                <div class="main">
                    <div >
                        <label for="nom">Nom <em>*</em>:</label>
                        <input type="text" placeholder="Nom" id="nom" name="nomParent" value="<?=$parent->nom(); ?>" required autofocus/>
                    </div>
                    <div>
                        <label for="prenom">Prénom <em>*</em>:</label>
                        <input type="text" placeholder="Prénom" id="prenom" name="prenomParent" value="<?=$parent->prenom(); ?>" required/>
                    </div>
                    <div>
                        <label for="ville">Ville <em>*</em>: </label>
                        <select id="ville" name="idVille" required>
                            <?php foreach($villes as $ville){?>
                                <option value="<?=$ville->id(); ?>" <?php if($ville->id()==$parent->idVille()){print("selected='selected'");} ?>     ><?=$ville->nom(); ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div>
                        <label for="login">Login <em>*</em>:</label>
                        <input type="text" placeholder="Login" id="login" name="login" value="<?=$parent->login(); ?>">
                    </div>
                    <div>
                        <label for="mdp">Mot de passe <em>*</em>:</label>
                        <input type="text" placeholder="Mot de passe" id="mdp" name="mdp" value="<?=$parent->password(); ?>">
                    </div>
                    <div>
                        <label for="mail">Adresse mail <em>*</em>:</label>
                        <input type="text" placeholder="Mail" id="mail" name="mail" value="<?=$parent->mail(); ?>">
                    </div>
                    <div>
                        <label for="tel">Téléphone :</label>
                        <input type="text" placeholder="Téléphone" id="tel" name="tel" value="<?=$parent->telephone(); ?>">
                    </div>
                </div>
            </fieldset>
            <br/>

            <div id="dSubmitAj">
                <input type="submit" value="Modification"/>
            </div>
        </form>
    </main>

<?php include 'foot.php'; ?>