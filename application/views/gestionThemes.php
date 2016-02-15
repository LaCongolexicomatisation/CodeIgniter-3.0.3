<?php
include "head.php";
?>
<h2>Gestion des thèmes</h2>
<fieldset class="fieldset-grand">
    <legend>Informations</legend>
    Voici la liste des thèmes présents dans la base de données.<br><br>
    Pour modifier un thème, cliquez sur le crayon dans la colonne "Options".<br><br>
    Pour supprimer un thème, cliquez sur la croix dans la colonne "Options".<br><br>
    Si un thème n'est pas encore présente dans ce tableau, vous pouvez le créer ici :<br>
    <a id="btLien" href="<?=base_url(); ?>index.php/activites/ajoutTheme">Créer un thème</a>
</fieldset>
<div class="tableform">
    <table class="tableform">
        <thead>
        <tr>
            <th>Nom</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($themes as $the) {
            ?>
            <tr>
                <td><?=$the->nom();?></td>
                <td><a href="<?=base_url(); ?>index.php/activites/modifierTheme?id=<?=$the->id();?>&action=modif"><img src="<?=base_url(); ?>assets/img/edit.png" alt="modif" name="modif"/></a>
                    <a href="javascript:supprimerActivite(<?= $the->id();?>,'<?=$the->nom(); ?>','<?=base_url()?>')"><img src="<?=base_url(); ?>assets/img/remove.png" alt="delete" name="delete"/></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<?php include 'foot.php'; ?>
