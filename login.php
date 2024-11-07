<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar


include 'header.php';  ?>
         <main class="d-flex flex-column p-4">
         <div class="herosection herologin">
            <div class="herosection_name p-3 rounded-2">
               <h1 class="name">Logga In</h1>
            </div>
         </div>
   <!-- Action till fil som kontrollerar inlogg, inmatning skickas med post--->
         <form class="mb-5 col-md-6 col-xl-3 mx-auto" action="check_login.php" method="post">
            <div class="form-group text-light fs-5">
               <label for="exampleInputEmail1 ">Användarnamn</label>
               <input
                  type="text"
                  name="user"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                 />
            </div>
            <div class="form-group text-light fs-5">
               <label for="exampleInputPassword1">Lösenord</label>
               <input
                  type="password"
                  name="pwd"
                  class="form-control"
                  id="exampleInputPassword1"
                  />
            </div>
            <button type="submit" class="btn btn-primary mt-2">Logga In</button>
            <div class="form-text register p-1 mt-4 rounded">Har du inget konto? <a href="register.php">Registrera dig här!</a></div>
         </form>
         </div>
         </main>
         <?php 
      //Kopplar in footern så att den syns på sidan 
      include 'footer.php'; 
      ?>