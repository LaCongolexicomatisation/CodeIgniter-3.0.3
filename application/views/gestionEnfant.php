<?php include 'head.php' ?>
    <main role="main">
        <h2>Les enfants</h2>
        <table class="tableform">
            <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Classe</th>
            <th>Options</th>
            </thead>
            <?php
            foreach ($enfants as $e) {
                ?>
                <tr>
                    <td><?= $e->nom() ?></td>
                    <td><?= $e->prenom() ?></td>
                    <td><?= $e->ddn() ?></td>
                    <td><?= Classe::getById($e->idClasse())->nomClasse() ?></td>
                    <td>
                        <a href="<?= base_url(); ?>index.php/gestionEnfant/modifEnfant?id=<?= $e->id(); ?>&action=modif"><img
                                src="<?= base_url(); ?>assets/img/edit.png" alt="modif" name="modif"/></a>
                        <a href="javascript:supprimerEnfant(<?= $e->id(); ?>,'<?= base_url() ?>')"><img
                                src="<?= base_url(); ?>assets/img/remove.png" alt="delete" name="delete"/></a></td>
                </tr>
            <?php }
            ?>
        </table>
        <a class="btLien" href="<?= base_url() ?>index.php/gestionEnfant/ajoutEnfant">Ajouter un enfant</a>
    </main>


<?php include 'foot.php'; ?>