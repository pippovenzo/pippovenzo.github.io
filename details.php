<?php
include "parameters.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dettagli</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> 
    </head>
    <body style="background-color:#323232;">
    
    <div class="row mx-5">    
    <?php
    $Titolo = $_GET["Titolo"];

    $connect = mysqli_connect($servername, $username, $password)
        or die("Connessione non riuscita " . mysqli_error($connect));

    mysqli_select_db($connect, $database)
        or die("Impossibile selezione il database " . mysqli_error($connect));

    # Lista dei film
    $query = "SELECT * FROM 001_FILM WHERE Titolo = '$Titolo'";
    $result = mysqli_query($connect, $query)
        or die ("Errore nella query <br>" . mysqli_error($connect));

    while($search = mysqli_fetch_array($result)){
        print('<div class="col my-2 mx-5">');
        print("<div class='card border-0' style='width: 18rem;'>");
            print("<img src='images/$search[Titolo].jpg' class='card-img-top'>");
            print('<div class="card-body">');
                print("<h5 class='card-title'>$search[Titolo]</h5>");
                print("<p class='card-text'><span style='color:red;'>Regista: </span>$search[Regista]</p>");
                print("<p class='card-text'><small><span style='color:red;'>Genere: </span>$search[Genere]</small></p>");
                print("<p class='card-text'><small><span style='color:red;'>Anno: </span>$search[AnnoProduzione]</small></p>");
                print("<p class='card-text'><small><span style='color:red;'>Nazionalità: </span>$search[Nazionalita]</small></p>");
                print("<p class='card-text'><small><span style='color:red;'>Durata: </span>$search[Durata] minuti</small></p>");
            print("</div>");
        print("</div>");
        print("</div>");
    }
    
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

