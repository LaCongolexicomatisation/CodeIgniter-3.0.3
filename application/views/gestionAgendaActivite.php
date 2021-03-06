<?php
include "head.php";
?>
<h2>Gestion de l'agenda des activités</h2>
<fieldset class="fieldset-grand">
    <legend>Instructions</legend>
    - Pour ajouter une activité à l'agenda et ainsi la proposer à l'inscription, cliquez sur le "+" à l'endroit où vous souhaitez ajouter l'activité.<br>
    - Pour supprimer une activité à l'inscription ...
</fieldset>
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
                        <?php
                        $x=false;
                        foreach($listAgenda as $a)
                        {
                            if(in_array($param.$horaires[1][$i],$test)){
                                $x=true;
                                $activite=$a->idActivite();
                            }
                        }
                        if($x)
                        {
                            echo "Activite ".$activite;
                            //echo $annee.$mois.$jour.substr(($listAgenda[2]->horaireDebutActivite()),0, 2) . substr(($listAgenda[2]->horaireFinActivite()),0, 2)." ".$param.$horaires[1][$i];
                        }
                        else{?>
                            <a href="insert/<?php echo $param.$horaires[1][$i] ?>" class="hrefAgenda">+</a>
                        <?php } ?>

                    </td>
              <?php } ?>
            </tr>
        </tbody>
            <?php } ?>
    </table>
    <?php } ?>
<!--    --><?php //var_dump($test);?>

</div>


<?php include 'foot.php'; ?>