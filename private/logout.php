<?php

include '../src/classes/login.class.php';

logout();

// Redirigez l'utilisateur vers la page d'accueil ou vers une autre page après la déconnexion
header('Location: /private/index.php');
?>