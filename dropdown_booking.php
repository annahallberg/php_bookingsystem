<?php session_start();

   //Hämtar uppkopplingen till db
   require_once 'dbconnect.php';

    $query = ('SELECT * FROM bookings'); //Ställer frågan om att hämta alla tider i tabellen bookings
    $stmt = $db->prepare($query); //Hämtar svaret
	$stmt->execute(); //Genomför frågan
	$result = $stmt->get_result(); //Tilldelar variabeln resultat resultatet från frågan ovan 

    //While-loop som i dropdown-listan skriver ut alla tider från databasen
        while ($row = mysqli_fetch_assoc($result)){
            //raderna i tabellen tilldelas i variabler
            $username = $row['username'];
            $time_slot = $row['time_slot'];

            //Kollar vilka tider som har användarnamnet ledig och skriver ut dessa
            //Användaren kan endast boka lediga tider
            if($username === "Ledig" ) {
                echo '<option value="' . $time_slot . '">' . $time_slot . '</option>';
            }
        }  

?>