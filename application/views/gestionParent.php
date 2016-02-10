<?php include 'head.php' ?>
    <main role="main">
        <h2>Les parents</h2>
        <table class="tableform">
            <thead>
            <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Ville</th>
            <th>Login</th>
            <th>Mot de passe</th>
            <th>Adresse mail</th>
            <th>Téléphone</th>
            <th colspan="2">Option</th>
            </tr>
            </thead>
            <?php
            foreach ($parents as $p) { ?>
            <tr>
                <td><?=$p->nom();?></td>
                <td><?=$p->prenom();?></td>
                <td><?=Ville::getById($p->idVille())->nom();?></td>
                <td><?=$p->login();?></td>
                <td><?=$p->password();?></td>
                <td><?=$p->mail();?></td>
                <td><?=$p->telephone();?></td>
                <td><a href="<?=base_url(); ?>index.php/gestionParent/modifParent?id=<?=$p->id();?>&action=modif"><img src="<?=base_url(); ?>assets/img/edit.png" alt="modif" name="modif"/></a>
                    <a href="javascript:supprimerParent(<?= $p->id();?>,'<?=base_url()?>')"><img src="<?=base_url(); ?>assets/img/remove.png" alt="delete" name="delete"/></a></td>
            </tr>
            <?php } ?>
        </table>
        <a class="btLien" href="<?= base_url() ?>index.php/gestionParent/ajoutParent">Ajouter un parent</a>
    </main>


<?php include 'foot.php'; ?>