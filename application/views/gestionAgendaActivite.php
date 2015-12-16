<?php
include "head.php";
?>
<div class="tableform">
    <table id="agendaActivite">
        <thead>
        <tr>
            <th>Activite</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Jour</th>
            <th>Horaire début</th>
            <th>Horaire fin</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($listAgenda as $agenda){
            ?>
            <tr>
                <td><?=$agenda->idActivite();?></td>
                <td><?=$agenda->dateDebutActivite();?></td>
                <td><?=$agenda->dateFinActivite();?></td>
                <td><?=$agenda->jour();?></td>
                <td><?=$agenda->horaireDebutActivite();?></td>
                <td><?=$agenda->horaireFinActivite();?></td>
                <td><a href="<?=base_url(); ?>index.php/activites/modifierActivite?id=<?=$agenda->idActivite();?>&action=modif"><img src="<?=base_url(); ?>assets/img/edit.png" alt="modif" name="modif"/></a>
                    <a href="javascript:"><img src="<?=base_url(); ?>assets/img/remove.png" alt="delete" name="delete"/></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
