<?php include "head.php"; ?>
<h2>Inscription de <?= $nomEnfant ?> <?= $prenomEnfant ?></h2>
<fieldset class="fieldset-grand">
    <legend>Instructions</legend>
    - Pour inscrire l'enfant à une activité, .<br>
</fieldset>


<main role="main">
<div class="tableform">
    <?php
    foreach($semaines as $numSemaine => $joursSemaine){ ?>
        <table id="agendaActivite">
            <caption>Semaine n°<?= $numSemaine ?></caption>
            <thead>
            <tr>
                <th>Horaire</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $horaires = [
                ["8h-9h", "9h-10h", "10h-11h", "11h-12h", "12h-13h"],
                ["0809", "0910", "1011", "1112", "1213"]
            ];
            for($i = 0; $i < 5; $i++){ ?>
            <tr>
                <th>
                    <?= $horaires[0][$i] ?>
                </th>
                <?php  foreach($joursSemaine as $param => $jour){ ?>
                    <td>
                       la mer noire
                    </td>
                <?php } ?>
            </tr>
            </tbody>
            <?php } ?>
        </table>
    <?php } ?>
</div>
</main>

<?php include 'foot.php'; ?>
