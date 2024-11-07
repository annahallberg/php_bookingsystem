<footer class="container-fluid pt-4 d-flex align-self-center">
         <div class="row flex-fill">
            <!-- col 1 -->
            <div class="col-sm-3 col-md-4 d-flex flex-column align-items-center mb-4">
               <div class="align-items-center">
                  <h5>
                     <a class="link-opacity-50-hover link-dark text-decoration-none" href="#">Kontakt</a>
                  </h5>
                  <address class="d-none d-sm-block">
                     <p class="mb-0">Skolskolan</p>
                     <p class="mb-0">Skolgatan 123</p>
                     <p class="mb-0">876 54</p>
                     <p>Staden</p>
                  </address>
                  <address>
                     <a href="#">info@skolskolan.se</a>
                  </address>
               </div>
            </div>
            <!-- col 2 -->
            <div class="col-sm-6 col-md-4 d-flex flex-column justify-content-end align-items-center mb-4">
            <img class="ml-5" src="images/logo.svg" alt="Skolans logotyp i form av en hatt" width="50" height="50">
            <small class="text-muted ">© 2024 - A.Hallberg</small>
            </div>
            <!-- col 3 -->
            <div class="col-sm-3 col-md-4 d-flex flex-column align-items-center">
               <div class="col d-flex flex-column">
               <!-- Om användare är inloggad visas en knapp för utloggning, annars med logga in-->
               <?php 
                 if(isset($_SESSION['usernameDB'])) {
                  echo ' <div class="ms-auto" >
                     <a class="btn loggin-btn d-flex me-2"  href="logout.php">Logga Ut</a>
                     </div>';
                } else {
                  echo '<div class="ms-auto" >
                     <a class="btn loggin-btn d-flex me-2"  href="login.php">Logga In</a>
                     </div>';
                }
               ?>
                  <div>
                     <a class="btn loggin-btn mt-2" href="index.php"> Startsida </a>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
