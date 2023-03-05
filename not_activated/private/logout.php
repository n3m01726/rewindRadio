<?php

use App\Login;

Login::logout();

// Redirigez l'utilisateur vers la page d'accueil ou vers une autre page après la déconnexion
echo '<a href="/">Cliquez ici si vous n\'est pas redirigé.e.</a>';
?>
