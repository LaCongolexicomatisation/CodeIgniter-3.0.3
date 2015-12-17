<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists("week2period")){
    function week2period($annee, $semaine)
    {
        $lundi = new DateTime();
        $lundi->setISOdate($annee, $semaine);

        $dimanche = new DateTime();
        $dimanche->setISOdate($annee, $semaine);
        date_modify($dimanche, '+27 day');

        $date = $lundi->diff($dimanche);
        
        
        $dimanche = $dimanche->modify( '+1 day' ); 

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($lundi, $interval ,$dimanche);
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $cleNbSemaine = $semaine;
        $jours = [];
        $nbJours = 0;
        foreach($daterange as $date){
            if($date->format("w") != 0 && $date->format("w") != 6){
                $jour = strftime("%A", $date->getTimestamp());
                $mois = strftime("%B", $date->getTimestamp());
                $cle = $date->format('d').$date->format('m').$date->format('Y');
                $jours[$cleNbSemaine][$cle] = $jour . ' ' . $date->format("d") . ' ' . $mois . ' ' . $date->format('Y');
                $nbJours++;
                if($nbJours == 5){
                    $nbJours = 0;
                    $cleNbSemaine++;
                }
            }
        }
        
        
        return $jours;
    }
}