<?php include 'head.php' ?>
    <main role="main">
        <h2>Les parents</h2>
        <table class="tableform">
            <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Ville</th>
            <th>Login</th>
            <th>Mot de passe</th>
            <th>Adresse mail</th>
            </thead>
            <?php print_r($parents);
            foreach ($parents as $p) { ?>
            <tr>
                <td><?=$p['nom']?></td>
                <td><?=$p['prenom']?></td>
                <td><?=$p['nomVille']?></td>
                <td><?=$p['login']?></td>
                <td><?=$p['motDePasse']?></td>
                <td><?=$p['adresseMail']?></td>
            </tr>
            <?php } ?>
        </table>
        <a class="btLien" href="<?= base_url() ?>index.php/gestionParent/ajoutParent">Ajouter un parent</a>
    </main>


<?php include 'foot.php'; ?>