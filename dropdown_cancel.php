<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar

   //Hämtar uppkopplingen till db
   require_once 'dbconnect.php';

    $query = ('SELECT * FROM bookings'); //Ställer frågan om att hämta hela tabellen bookings innehåll
    $stmt = $db->prepare($query); //Hämtar svaret
	$stmt->execute(); //Genomför frågan
	$result = $stmt->get_result(); //Tilldelar variabeln resultat resultatet från frågan ovan 

    //While-loop som i dropdown-listan skriver ut alla tider från databasen
        while ($row = mysqli_fetch_assoc($result)){
            //raderna i tabellen tilldelas i variabler
            $username = $row['username'];
            $time_slot = $row['time_slot'];

            //Kollar om användarnamnet ligger i sessions-variabeln, om ja skrivs tiden ut som är kopplad till användarnamnet
            //Användaren kan på så vis endast avboka tider som är kopplade till användarnamnet.  
            if($username === $_SESSION['usernameDB'] ) {
                echo '<option value="' . $time_slot . '">' . $time_slot . '</option>';
            }
        }  

?>