<?php
include "parameters.php"
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="/images/favicon.ico">
</head>
  <body style="background-color:#323232;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Nuovo Cinema Paradiso</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Film</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="sale.php">Sale</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="#">
                Attori
            </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="row mx-5">

    <?php

    $connect = mysqli_connect($servername, $username, $password)
        or die("Connessione non riuscita " . mysqli_error($connect));

    mysqli_select_db($connect, $database)
        or die("Impossibile selezione il database " . mysqli_error($connect));

    # Lista delle sale
    $query = "SELECT A.Nome FROM 001_ATTORI as A";
    $result = mysqli_query($connect, $query)
        or die ("Errore nella query <br>" . mysqli_error($connect));
        
    
    while($search = mysqli_fetch_array($result)){
        print('<div class="col my-2 mx-1">');
        print('<div class="card border-0" style="width: 18rem;">');
            print("<img src='images/$search[Nome].jpg' class='card-img-top'>");
            print('<div class="card-body">');
                print("<h5 class='card-title'>$search[Nome]</h5>");
                print("</div>");
        print("</div>");
        print("</div>");
    }   
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>