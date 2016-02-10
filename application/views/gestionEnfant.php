<?php include 'head.php' ?>
    <main role="main">
        <h2>Les enfants</h2>
        <table class="tableform">
            <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Classe</th>
            <th>Infos</th>
            </thead>
            <tr>
                <td>Heinrich</td>
                <td>Schmidt</td>
                <td>DDN</td>
                <td>CP</td>
                <td><a href="enfant.html">info</a></td>
            </tr>
            <?php
            foreach ($enfants as $e) {
                ?>
                <tr>
                    <td><?= $e->nom() ?></td>
                    <td><?= $e->prenom() ?></td>
                    <td><?= $e->ddn() ?></td>
                    <td><?= $e->getClasse($e->id()) ?></td>
                    <td><a href="#">Infos</a></td>
                </tr>
            <?php }
            ?>
        </table>
        <a class="btLien" href="<?= base_url() ?>index.php/gestionEnfant/ajoutEnfant">Ajouter un enfant</a>
    </main>


<?php include 'foot.php'; ?>