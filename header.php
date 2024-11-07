<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
         rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
      <link rel="stylesheet" href="style.css" />
      <title>TDH100 - PHP Examinering</title>

   </head>
   <body class="d-flex flex-column min-vh-100">
      <header class="py-3">
         <nav class="navbar fs-5 navbar-expand-lg mx-2">
            <div class="container-fluid d-flex justify-content-between align-items-center">
               <!-- Logotyp till vänster -->
               <img src="images/logo.svg" alt="Skolans logotyp i form av en hatt" width="80" height="80">
               <!-- Hamburgermeny till höger -->
               <button
                  class="navbar-toggler m-3 border-dark"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarNav"
                  aria-controls="navbarNav"
                  aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <!-- Menyn som kollapsar vid liten skärm -->
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav text-center ">
                     <li class="nav-item">
                        <a class="nav-link mx-2 text-dark" >Startsida</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link mx-2 text-dark" href="index.php">Boka redovisningstid</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link mx-2 text-dark">Nyheter</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link mx-2 text-dark">Kontakt</a>
                     </li>
                  </ul>
                  <!-- Om användare är inloggad visas en knapp för utloggning, annars med logga in-->
                  <div class="login-container d-flex ms-auto">
                     <?php 
                        if(isset($_SESSION['usernameDB'])) {
                           echo '<a class="btn loggin-btn d-flex me-2 text-center" href="logout.php">Logga Ut</a>';
                        } else {
                           echo '<a class="btn loggin-btn d-flex me-2" href="login.php">Logga In</a>';
                        }
                     ?>
                  </div>
               </div>
            </div>
         </nav>
      </header>
      <!-- Om användare är inloggad välkomnas denne med följande mening innehållande användarnamn-->
      <?php 
         if(isset($_SESSION['usernameDB'])){
            echo '<p class="m-1">Välkommen, du är inloggad som <strong>' . $_SESSION['usernameDB'] . "</strong></p>";
         }
      ?>