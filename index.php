<?php

require 'model.php';

doDelete();

doEdit();

doCreation();

try {
 $getSelect = doSelect();
 require 'view.php';
}
 catch(Exception $e){
 $msg_erreur = $e->getMessage();
}
require 'template.php';
?>
