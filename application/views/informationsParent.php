<?php include "head.php"; ?>
<body>
    <main role="main">
<div>
    <h3>Vos informations</h3>
    <label>Nom : <?= $user['nom'] ?></label><br>
    <label>Prénom : <?= $user['prenom'] ?></label><br>
    <label>Ville : <?= $user['ville'] ?></label><br>
    <label>Adresse mail : <?= $user['adresseMail'] ?> </label><br>
    <label>Téléphone : </label>
    <br>
    En cas d'information erronée, veillez prévenir le centre périscolaire.
</div>

</main>

<?php include 'foot.php'; ?>