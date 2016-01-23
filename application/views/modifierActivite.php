<?php include "head.php";?>
<body>
<div class="formGestionActivite">
    <fieldset class="fieldset-grand">
        <legend>Ajouter activité : </legend>
        <form id="activite" method="post" name="activite" action="">
            <div>
                <input type="hidden" id="idActivite" name="idActivite" value="<?= $activite->idActivite(); ?>">
            </div>
            <div>
                <label for="nomActivite">Nom de l'activité</label>
                <input type="text" id="nomActivite" name="nomActivite" value="<?= $activite->nom(); ?>">
            </div>
            <div>
                <label for="descriptionActivite">Description de l'activité</label>
                <input type="text" id="descriptionActivite" name="descriptionActivite" value="<?= $activite->description(); ?>">
            </div>
            <div>
                <label for="idTheme">Thème : </label>
                <select id="idTheme" name="idTheme" onchange="changeTheme(this);">
                    <?php
                    foreach($themes as $theme){
                        ?>
                        <option value="<?=$theme->id();?>" <?php if(($theme->id())==($activite->idTheme())){echo "selected";}?>><?=$theme->nom();?></option><?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <button type="submit">Valider</button>
            </div>
        </form>
    </fieldset>
</div>



<?php include 'foot.php'; ?>