<?php include "head.php"; ?>
<body>
    <main role="main">
<div>
    <h3>Vos informations</h3>
    <label>Nom : <?= $data['user']['nom'] ?></label><br>
    <label>Prénom : <?= $data['user']['prenom'] ?></label><br>
    <label>Ville : <?= $data['user']['ville'] ?></label><br>
    <label>Adresse mail : <?= $data['user']['adresseMail'] ?> </label><br>
    <label>Téléhpne : </label>
    <br>
    En cas d'information erronée, veillez prévenir le centre périscolaire.
</div>

</main>

<?php include 'foot.php'; ?>