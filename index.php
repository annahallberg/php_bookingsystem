<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar
//Kopplar in headern så att den syns på sidan 
    include 'header.php'; 
                     ?>

      <main class="d-flex flex-column p-4">
         <div class="herosection">
            <div class="herosection_name p-3 rounded-2">
               <h1 class="name display-md-3 display-lg-2">Boka redovisning</h1>
            </div>
         </div>

         <!--HUVUDMATERIAL -->
         <div class="d-flex flex-column align-items-center mx-4">
            <div class="information col p-0 col-12 col-md-6 text-light ">
               <h2 class=" text-center mb-4">
                  Schema för muntliga redovisningar i TDH100
               </h2>
               <p>
               På denna sida kan du se schemat för muntliga redovisningar samt boka en tid för redovisning i kursen TDH100. <br>
               <strong>OBS, du måste vara inloggad för att kunna boka eller avboka en tid</strong> då din tid kopplas till ditt inlogg och ditt användarnamn. <br>
               Har du inget konto, vänligen <a href="register.php" class="text-light">registrera dig här!</a>. 
               </p>
               <p> Vi ser fram emot din redovisning!</p> 

               <?php   
               //Kollar om session är igång och skriver ut info om vilket namn användarens bokning kommer se i
               if(isset($_SESSION['usernameDB'])) {
                  echo '<p class="text-center mt-5 ">Namnet som kommer stå på din bokning är: <strong class="fs-5">' . $_SESSION['usernameDB'] . '</strong></p> ';
               }
               ?>
            </div>
            <!--Kollar om en session är aktiv och vilket användarnamn den isåfall innehåller. 
            Om användare är inloggad skrivs bokning och avbokningsformuläret ut -->
            <?php   
               if(isset($_SESSION['usernameDB'])){
                  echo ' <div class="d-flex flex-column flex-md-row gap-5 align-items-start"> 
                     <!-- Formulär för att boka tid -->
                     <form action="add.php" method="post" class="col-12 col-md-6"> 
                           <h3 class="text-light">Boka tid:</h3>
                           <div class="form-group">
                              <select
                                 class="form-select"
                                 name="time_slot"
                                 aria-label="Default select example">
                                 <option selected>Välj den tid du vill boka</option>';

                                 include 'dropdown_booking.php';

                  echo ' </select>
                           </div>
                           <div class="form-group">
                              <input
                                 class="btn btn-primary my-2"
                                 type="submit"
                                 value="Boka tid" />
                           </div>
                     </form>
                     <!-- Formulär för att avboka tid -->
                     <form action="delete.php" method="post" class="col-12 col-md-6"> 
                           <h3 class="text-light">Avboka tid:</h3>
                           <div class="form-group">
                              <select
                                 class="form-select"
                                 name="time_slot"
                                 aria-label="Default select example">
                                 <option selected>Välj den tid du vill avboka</option>';

                                 include 'dropdown_cancel.php';

                  echo '</select>
                           </div>
                           <input
                              class="btn btn-danger my-2"
                              type="submit"
                              value="Avboka tid" />
                     </form>
                  </div>';
               } 
             ?>

            <div class="col col-xl-8 col-lg-10 mt-4 mb-4 ">
               <div class=" d-flex flex-wrap justify-content-center">
                  <!--Includar bookings.php som kör en while-loop och skriver ut alla tider samt om de är lediga eller den som bokat tiden. -->
                  <?php include 'bookings.php'; 
                     ?>
               </div>
            </div>
      </main>
      <?php 
      //Kopplar in footern så att den syns på sidan 
      include 'footer.php'; 
      ?>