<?php
session_start();
// Hämtar uppkopplingen till db
require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hämtar användarnamnet från sessionen och tid från POST
    $username = $_SESSION['usernameDB'];
    $time_slot = htmlspecialchars($_POST["time_slot"]);

    // Kontrollera om användaren har valt en giltig tid
    if ($time_slot == 'Välj den tid du vill boka') {
        // Visa felmeddelande och skicka tillbaka användaren
        echo '<script>alert("Ojdå! Du måste välja en tid för bokning");window.history.back();</script>';
    } else {
        // Om tid är vald, uppdatera bokningen
        $stmt = $db->prepare("UPDATE bookings SET username = ? WHERE time_slot = ?");
        $stmt->bind_param("ss", $username, $time_slot);
        $stmt->execute();
        $stmt->close();

        // Omdirigera endast om uppdateringen lyckas
        header("Location: index.php");
        exit();
    }
}
?>
