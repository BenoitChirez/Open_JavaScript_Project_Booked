<?php
session_start();


$_SESSION = array();


session_destroy();//enleve les constante de session



header("Location: ../HTML/Inscription.html"); //renvoie � la page d'Inscription
exit();
?>