<?php
session_start();

require 'model.php';

doCreation();

doEdit();

doDelete();

try {
 $getSelect = doSelect();
}
 catch(Exception $e){
 $msg_erreur = $e->getMessage();
}
require 'view.php';

require 'template.php';
?>
