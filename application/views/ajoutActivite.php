<?php include "head.php"; ?>
<main role="main">
    <div class="formGestionActivite">
        <form action="" method="post">
            <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>
            <fieldset class="fieldset-grand">
                <legend>Ajouter activité</legend>
                <div>
                    <label for="nomActivite">Nom de l'activité<em>*</em>:</label>
                    <input type="text" id="nomActivite" name="nomActivite">
                </div>
                <div>
                    <label for="descriptionActivite">Description de l'activité<em>*</em>:</label>
                    <input type="text" id="descriptionActivite" name="descriptionActivite">
                </div>
                <div>
                    <label for="idTheme">Thème : </label>
                    <select id="idTheme" name="idTheme" onchange="changeTheme(this);">
                        <option value="-1">non existant</option>
                        <?php
                        foreach ($themes as $theme) {
                            ?>
                            <option value="<?= $theme->id(); ?>"><?= $theme->nom(); ?></option><?php
                        }
                        ?>

                    </select>

                    <div id="ajoutTheme">

                        <label for="nomTheme">Nom du thème : </label>
                        <input type="text" id="nomTheme" name="nomTheme">
                    </div>
                    <button type="submit">Valider</button>
                </div>
            </fieldset>
        </form>
        <fieldset class="fieldset-moyen">
            <legend>Information</legend>
            Si votre thème n'existe pas dans la liste, choisissez "non existant" puis entrez le nom du nouveau thème dans "nom du thème".<br><br>
            Si votre thème existe, vous n'avez pas besoin de renseigner "nom du thème".
        </fieldset>
    </div>
</main>