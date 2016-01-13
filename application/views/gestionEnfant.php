<?php include'head.php'?>
<main role="main">
    <h2>Les enfants</h2>
    <table class="tableformEnfants">
        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Groupe</th>
            <th>Informations</th>
        </thead>
        <tr>
            <td>Heinrich</td>
            <td>Schmidt</td>
            <td>CP1</td>
            <td><a href="enfant.html">info</a></td>
        </tr>
        <tr>
            <td>Richhein</td>
            <td>Tdimhcs</td>
            <td>CE1</td>
            <td><a href="enfant.html">info</a></td>
        </tr>
    </table>
    <a class="btLien" href="<?= base_url()?>index.php/gestionEnfant/ajoutEnfant">Ajouter un enfant</a>
</main>
