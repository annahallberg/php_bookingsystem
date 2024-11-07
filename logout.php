<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar

//Tömmer sessions-variabeln och avslutar sessionen
unset($_SESSION['usernameDB']);
//Omdirigerar användaren till startsidan, nu som utloggad
header("Location: index.php");


?>