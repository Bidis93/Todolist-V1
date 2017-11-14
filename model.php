<?php

function doDelete() {

$connexion = getConnexion();

if(isset($_POST['supprimer'])) {
  $tacheid = $_POST['supprimer'];
  $query = $connexion->prepare('DELETE FROM taches WHERE id = :id');
  $query->bindParam(":id", $tacheid);
  $query->execute();
 }
}

function doEdit() {

$connexion = getConnexion();

  if(isset($_POST['edit'])){

    $titre = $_POST['title'];
    $tacheid = $_POST['edit'];
    $description = $_POST['taskinfo'];

    $query = $connexion->prepare('UPDATE taches SET titre = :titre WHERE id = :id; UPDATE taches SET description = :description WHERE id = :id;');
    $query->bindParam(":titre", $titre);
    $query->bindParam(":id", $tacheid);
    $query->bindParam(":description", $description);
    $query->execute();
  }
}

function doSignout() {

   $_SESSION = array();
   session_destroy();

   header('location: connexionController.php');

}

function doConnexion() {

  $connexion = getConnexion();

  if(isset($_POST['envoyer'])) {
    $login = htmlspecialchars(strtolower($_POST['login']));
    $pwd = sha1($_POST['pwd']);

  if(isset($login, $pwd)) {
    $query = $connexion->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
    $query->execute(array($login, $pwd));
    $user_exist = $query->rowCount();

  if($user_exist == 1) {
    $user_data = $query->fetch();
    $_SESSION['id'] = $user_data['id'];
    $_SESSION['email'] = $user_data['login'];

    header('location: index.php');

  } else {

    header('location: inscriptionController.php');
  }

    }
  }
}

function doInscription() {

  $connexion = getConnexion();

  if(isset($_POST['envoyer'])) {
    $login = htmlspecialchars(strtolower($_POST['login']));
    $pwd = sha1($_POST['pwd']);

  if(isset($login, $pwd)) {
    $query = $connexion->prepare('INSERT INTO users (login, password) VALUES (?, ?)');
    $query->execute(array($login, $pwd));

    header('location: index.php');


    }
  }
}
//selectionne les infos de la bdd
function doSelect() {
if(!isset($_SESSION['id'])){
  return array();
}
  $connexion = getConnexion();
  $sql = $connexion->prepare('SELECT * FROM taches WHERE userid = ?');
  $sql->execute(array($_SESSION['id']));

  return $sql->fetchAll(PDO::FETCH_ASSOC);
}


function doCreation() {

  $connexion = getConnexion();
  $query = $connexion->prepare('INSERT INTO taches (titre, description, userid) VALUES (?, ?, ?)');
  if(isset($_POST['titre'], $_POST['description'])) {
  $query->execute(array($_POST['titre'], $_POST['description'], $_SESSION['id']));

  return $query;
  }


}
//connection à la  bdd
function getConnexion() {

  $connexion = new PDO('mysql:host=localhost; dbname=todolist; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $connexion;
}
