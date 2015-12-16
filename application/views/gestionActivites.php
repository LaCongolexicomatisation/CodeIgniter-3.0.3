<?php
include "head.php";
?>
<div class="tableform">
    <table id="activite">
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
    <a id="btLien" href="<?=base_url(); ?>index.php/activites/ajoutActivite">Créer une activitée</a>
</div>


