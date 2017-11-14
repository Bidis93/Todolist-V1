<?php ob_start(); ?>

<?php foreach ($getSelect as $getSelection) : ?>
	<ul>
	 <li><?= $getSelection['titre'] ?></li>
	 <li><?= $getSelection['description'] ?></li>
	</ul>
	<form action="" method="post">
	<input value="<?= $getSelection['titre'] ?>" name="title">
	<input value="<?= $getSelection['description'] ?>" name="taskinfo">
	<button type="submit" value="<?= $getSelection['id']?>" name="edit">Modifier</button>
	<button type="submit" value="<?= $getSelection['id']?>" name="supprimer">Supprimer</button>
</form>



<?php endforeach; ?>


<?php $contenu = ob_get_clean(); ?>
