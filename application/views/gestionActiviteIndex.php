<?php   include('head.php');?>


<p><a href="#">G&eacuterer l'agenda des activit&eacutes</a></p>
<p><a href='<?= base_url(); ?>index.php/activites/gestionActivites'>Activit&eacutes</a></p>
<p><a href="#">Themes</a></p>
<p><a href="#">Tarifs</a></p>


<?php if(isset($_SESSION['messagee'])){print($_SESSION["messagee"]);}?>