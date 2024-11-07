<?php session_start(); // Startar eller återupptar en session för att spara data mellan sidladdningar

      //Hämtar uppkopplingen till db
   require_once 'dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] === "POST") { // Kontrollera om formuläret input skickats med POST-metoden

    // Hämtar användarnamn och lösenord från POST och tvättar inmatningen med htmlspecialchars för att förhindra XSS-attacker
    $user = htmlspecialchars($_POST["user"]);
    $pwd = $_POST["pwd"];

    // Hashar lösenordet för att skydda det vid lagring
    $hashedpwd = hash("sha256", $pwd);

    // Förbereder och kör en SQL-fråga för att hämta alla användare från databasen
    $stmt = $db->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->get_result();

    // Skapar en variabel som används om avändare inte finns i databasen
    $userFound = false;

    // Loopar igenom alla rader i resultatet för att hitta en matchning
    while ($row = mysqli_fetch_assoc($result)) {
        // Kontrollera om både användarnamn och hashar matchar
        if($user === $row['username'] && $hashedpwd === $row['password']) {
            $usernameDB = $row['username']; // Lagra användarnamnet från databasen
            $_SESSION['usernameDB'] = $usernameDB; // Spara användarnamnet i sessionen
            header("Location: index.php"); // Om matchning hittas, omdirigera till index.php
            exit(); // Avslutar skriptet
        } 
    }

    // Om ingen användare hittas, skrivs ett felmeddelande ut
    if (!$userFound) {
        echo "Ingen användare hittades. <br>"; 
        echo "<br><a href='login.php'>Tillbaka till inloggningssidan</a>"; // Länk tillbaka till login-sidan
        die(); // Avslutar skriptet
    }

} else {
    // Fail-safe om någon försöker ladda inloggningssidan utan att skicka formuläret
    header("Location: ../index.php"); // Omdirigerar till startsidan
    die(); // Avslutar skriptet
}


?>