<?php include 'head.php'; ?>
    <body>
    <main>
        <h2>Ajout d'un enfant</h2>

        <form method="post" id="ajEnfant">
            <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>
            <fieldset class="fieldset-grand">
                <legend>Information de l'enfant</legend>
                <div class="main">
                    <div>
                        <label for="nom">Nom <em>*</em>:</label>
                        <input type="text" placeholder="Nom" id="nom" name="nomEnfant" required autofocus/>
                    </div>
                    <br/>

                    <div>
                        <label for="prenom">Prénom <em>*</em>:</label>
                        <input type="text" placeholder="Prénom" id="prenom" name="prenomEnfant" required/>
                    </div>
                    <br/>

                    <div>
                        <label for="ddn">Date de naissance <em>*</em>:</label>
                        <input type="date" placeholder="date" id="ddn" name="ddnEnfant" required/>
                    </div>
                </div>
            </fieldset>
            <br/>
            <fieldset class="fieldset-grand">
                <legend>Parents de l'enfant</legend>
                <div id="parents">
                </div>
                Si le parent existe déjà dans la base de données :<br>
                <a href="javascript:parentExistant()">Ajouter un parent existant</a><br><br>
                Sinon, veuillez le créer d'abord :<br>
                <a href="javascript:nouveauParent()">Ajouter un nouveau parent</a>
            </fieldset>
            <div id="dSubmitAj">
                <input type="submit" value="Ajout d'un enfant"/>
            </div>
        </form>
    </main>

<?php include 'foot.php'; ?>