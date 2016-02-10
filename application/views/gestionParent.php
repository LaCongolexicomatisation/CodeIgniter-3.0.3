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
            </tr>
            </thead>
            <?php
            foreach ($parents as $p) { ?>
            <tr>
                <td><?=$p->nom();?></td>
                <td><?=$p->prenom();?></td>
                <td><?=$p->idVille();?></td>
                <td><?=$p->login();?></td>
                <td><?=$p->password();?></td>
                <td><?=$p->mail();?></td>
                <td><?=$p->telephone();?></td>
            </tr>
            <?php } ?>
        </table>
        <a class="btLien" href="<?= base_url() ?>index.php/gestionParent/ajoutParent">Ajouter un parent</a>
    </main>


<?php include 'foot.php'; ?>