<?php
    //Tilldelar variabeler de olik auppgifterna som behövs för att koppla upp sig mot databasen
    $host = 'localhost';
    $dbname = '';
    $dbpassword = ''; //För denna inlämning är inloggningsuppgifterna borttaget,sidan går att ses på https://webbkurs.ei.hv.se/~anha0181/php_exam/

    //Uppkopplingen skapas
    $db = mysqli_connect($host, $dbname, $dbpassword, $dbname)or die ('Error, kunde ej connecta till DB');
?>