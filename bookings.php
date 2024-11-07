<?php 
    //Hämtar uppkopplingen till db
    require_once 'dbconnect.php';
    
    $query = ('SELECT * FROM bookings'); //Ställer frågan om att hämtta hela tabellen bookings
    $result = mysqli_query($db, $query); //Hämtar svaret
   
    //loop som rullar över tabellens alla rader och skriver ut dessa
    while ($row = mysqli_fetch_assoc($result)){
        //time_slot och username tilldelas sina värden från tabellen 
        $time_slot = $row['time_slot'];
        $username = $row['username'];

        //Rutorna med redovisningstiderna skrivs ut 
        echo '<div class="card m-1" style="width: 15rem">
                <div class="card-body d-flex flex-column ">';
        echo '<h5 class="card-title text-center fw-bold">Tid ' . $time_slot . '</h5>';              
        //If-sats som kollar om username är "ledig", om ja skrivs ledig ut i grönt, om nej skrivs den bokades namn ut i rött
        if($username == "Ledig"){
            echo '<p class="card-name text-center mt-3 fs-4 text-success"> ' .  $username . '</p>';
        }
        else {
            echo '<p class="card-name text-danger text-center mt-3 fs-4"> ' .  $username . '</p>';
        }
        echo '</div> </div>';
    }
?>