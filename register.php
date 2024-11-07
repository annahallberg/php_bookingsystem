<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar
include 'header.php';  ?>

   <main class="d-flex flex-column p-4">
         <div class="herosection heroregister">
            <div class="herosection_name p-3 rounded-2">
               <h1 class="name">Skapa konto</h1>
            </div>
         </div>
            <!-- Action till fil som skapar användare i databas, inmatning skickas med post--->
         <form class="mb-5 col-md-6 col-xl-3 mx-auto" action="check_register.php" method="post">
            <p class="text-light">Registrera dig nedan och logga sedan in med dina uppgifter.
            </p>
            <div class="form-group text-light fs-5">
               <label for="InputName ">Användarnamn</label>
               <input
                  type="text"
                  name="newname"
                  class="form-control"
                 />
            </div>
            <div class="form-group text-light fs-5">
               <label for="InputPassword">Lösenord</label>
               <input
                  type="password"
                  name="newpwd"
                  class="form-control"
                  id="exampleInputPassword1"
                  />
            </div>
            <button type="submit" class="btn btn-success mt-2">Registrera dig</button>
            <div class="form-text register p-1 mt-4 rounded">Har du redan ett konto? <a href="login.php">Logga in här!</a></div>
         </form>
   </main>

         <?php include 'footer.php'; ?>