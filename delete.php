<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar
   //Hämtar uppkopplingen till db
   require_once 'dbconnect.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Även fast användaren inte kan skriva något här så lägger jag till funktionen som gör om POST-värdet till en string
            $time_slot = $_POST["time_slot"];

            if($time_slot == 'Välj den tid du vill avboka'){
                //Här använder jag JS för att skapa en alert, när användaren klickar på knappen tar window.history.back() användaren tillbaka till föregående sida som är startsidan 
                echo '<script>alert("Ojdå! Du måste välja en tid för avbokning");window.history.back();</script>';
        
            } else {
                // Förbereder frågan. Frågan uppdaterar namn-värdet i tabellen från ett inmatat namn till Ledig
                $stmt = $db->prepare("UPDATE bookings SET username = 'Ledig' WHERE time_slot = ?");
                // Binder parametern ($time_slot till frågan). S står för sträng 
                $stmt->bind_param("s", $time_slot);
                //Nedan utförs frågan och sedan avslutas statementet
                $stmt->execute();
                $stmt->close(); 
            
            // Omdirigera användaren till index.php efter framgångsrik uppdatering
            header("Location: index.php");
                exit(); // För att stoppa vidare PHP-körning
            }
    }

?>