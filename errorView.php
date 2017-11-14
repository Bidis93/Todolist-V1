<?php  ob_start(); ?>
<p>Une erreur est survenue : <?= $msg_erreur ?></p>
<?php $contenu = ob_get_clean(); ?>
