<?php
include "parameters.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="script.js"></script> 
    </head>
    <body style="background-color:#323232;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Nuovo Cinema Paradiso</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Film</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="sale.php">Sale</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="attori.php">
                Attori
            </a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    
    <div class="row mx-5">

    
    <?php

    $connect = mysqli_connect($servername, $username, $password)
        or die("Connessione non riuscita " . mysqli_error($connect));

    mysqli_select_db($connect, $database)
        or die("Impossibile selezione il database " . mysqli_error($connect));

    # Lista dei film
    $query = "SELECT F.Titolo, F.Regista, F.Genere FROM 001_FILM as F";
    $result = mysqli_query($connect, $query)
        or die ("Errore nella query <br>" . mysqli_error($connect));
        
    
    while($search = mysqli_fetch_array($result)){
        $Titolo = $search[Titolo];
        print('<div class="col my-2 mx-1">');
        print("<form method='get' name='form' action='details.php'>");
        print("<div class='card border-0' style='width: 18rem;' onclick=showDetails('$Titolo');>");
            print("<img src='images/$search[Titolo].jpg' class='card-img-top'>");
            print('<div class="card-body">');
            print("<input type='submit' value='$Titolo' name='Titolo'>");
                print("<h5 class='card-title'>$search[Titolo]</h5>");
                print("<p class='card-text'><span style='color:red;'>Regista: </span>$search[Regista]</p>");
                print("<p class='card-text'><small><span style='color:red;'>Genere: </span>$search[Genere]</small></p>");
            print("</div>");
        print("</div>");
        print("</form>");
        print("</div>");
    }   
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

