<?php
include "head.php";
?>
<h2>Gestion des activités</h2>
<fieldset class="fieldset-grand">
    <legend>Informations</legend>
    Voici la liste des activités présentes dans la base de données et pouvant être insérées dans l'agenda.<br><br>
    Pour modifier une activité, cliquez sur le crayon dans la colonne "Options".<br><br>
    Pour supprimer une activité, cliquez sur la croix dans la colonne "Options".<br><br>
    Si une activité n'est pas encore présente dans ce tableau, vous pouvez la créer ici :<br>
    <a id="btLien" href="<?=base_url(); ?>index.php/activites/ajoutActivite">Créer une activité</a>
</fieldset>
<div class="tableform">
    <table class="tableformActivite">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Thème</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($listActivite as $act) {
            ?>
            <tr>
                <td><?=$act->nom();?></td>
                <td><?=$act->description();?></td>
                <td><?=Theme::getNomById($act->idTheme());?></td>
                <td><a href="<?=base_url(); ?>index.php/activites/modifierActivite?id=<?=$act->idActivite();?>&action=modif"><img src="<?=base_url(); ?>assets/img/edit.png" alt="modif" name="modif"/></a>
                    <a href="javascript:supprimerActivite(<?= $act->idActivite();?>,'<?=$act->nom(); ?>','<?=base_url()?>')"><img src="<?=base_url(); ?>assets/img/remove.png" alt="delete" name="delete"/></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<?php include 'foot.php'; ?>

