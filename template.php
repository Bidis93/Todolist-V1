<!doctype html>

<html>
	<head>
		<title>Exercice 1 PDO</title>
		<meta charset="utf-8">
	</head>
<body>
	<form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="titre" value="">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"></textarea>
        </label>
      </div>

      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
		<section>
		<?= $contenu ?>
		</section>
    <a href="signoutController.php">déconnexion</a>
</body>
	</html>
