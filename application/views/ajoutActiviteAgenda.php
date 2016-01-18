<?php include 'head.php'; ?>

<main>
    <h2>Ajout d'une activité - <?= $titre ?></h2>

    <form method="post" id="ajActiviteAgenda">
        <p><i>Les champs marqu&eacutes par </i><em>*</em> sont <em>obligatoires</em> !</p>

        <fieldset class="fieldset-grand">
            <div class="main">
                    <select name="activite">
                        <?php foreach($activites as $activite){ ?>
                            <option value="<?= $activite->idActivite() ?>"><?= $activite->nom() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br />
            <div>
                <label for='redondance'>Redondance (semaines) : </label>
                <input type="number" value="0" name="redondance" id="redondance" />
                <input type="hidden" value="<?= $hidden ?>"name="dateDebut" />
            </div>
                <br />
            <div>
                <input type="submit" value="Ajout de l'activité"/>
            </div>
        </fieldset>
    </form>
</main>
</body>