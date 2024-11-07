<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar
    //Hämtar uppkopplingen till db
    require_once 'dbconnect.php';
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Här hämtas användardata med POST, i detta fall namn och vilken tid användaren vill boka
        //Här används funktionen htmlspecialchars som gör om inmatningen till en string för att tvätta inmatning och undvika XSS-attacker.
        $newname = htmlspecialchars($_POST["newname"]);
        $newpwd = $_POST["newpwd"];
        // Hashar lösenordet för att skydda det vid lagring
        $hashedpwd = hash("sha256", $newpwd);

   
            // Förbereder frågan, vilken uppdaterar användarnamnet 
            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        // Bind parametern ($namn till frågan). S står för sträng och i för interger, name är en sträng och time är siffror
        $stmt->bind_param("ss", $newname, $hashedpwd);
        $stmt->execute();
        $stmt->close(); 
        header("Location: login.php");
        //Avslutar scriptet
        exit();

    } else {
         // Omdirigera användaren till index.php efter framgångsrik uppdatering
         header("Location: login.php");
         exit(); // För att stoppa vidare PHP-körning
    }
?>