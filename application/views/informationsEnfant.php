<?php include "head.php"; ?>

<table class="tableform">
    <thead>
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Classe</th>
    <th>Options</th>
    </tr>
    </thead>
    <?php
    foreach ($enfants as $e) {
        ?>
        <tr>
            <td><?= $e->nom() ?></td>
            <td><?= $e->prenom() ?></td>
            <td><?= $e->ddn() ?></td>
            <td><?= $e->idClasse() ?></td>
            <td><a href="<?= base_url(); ?>index.php/enfantClient/emploiDuTemps/<?= $e->id() ?>">Voir Emploi du temps</a></td>
        </tr>
    <?php }
    ?>
</table>

<?php include 'foot.php'; ?>
