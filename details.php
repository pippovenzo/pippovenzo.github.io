<?php
include "parameters.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli</title>
</head>
<body>
    <?php
        $Titolo = $_GET['Titolo'];
        print($Titolo);

        $connect = mysqli_connect($servername, $username, $password)
        or die("Connessione non riuscita " . mysqli_error($connect));

        mysqli_select_db($connect, $database)
            or die("Impossibile selezione il database " . mysqli_error($connect));

        # Lista dei film
        $query = "SELECT F.Regista, F.Genere, F.AnnoProduzione, F.Nazionalita, F.Durata FROM 001_FILM as F 
                    WHERE F.Titolo = '$Titolo'";
        $result = mysqli_query($connect, $query)
            or die ("Errore nella query <br>" . mysqli_error($connect));

            while($search = mysqli_fetch_array($result)){
                
            }   
        ?>
    
</body>
</html>