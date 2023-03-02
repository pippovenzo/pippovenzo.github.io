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
    try {
        $tipo = $_GET["Tipo"];
        $Titolo = $_GET["Titolo"];
    } catch (\Throwable $th) {
        die("troio");
    }

    $connect = mysqli_connect($servername, $username, $password)
        or die("Connessione non riuscita " . mysqli_error($connect));

    mysqli_select_db($connect, $database)
        or die("Impossibile selezione il database " . mysqli_error($connect));

    # Lista dei film
    switch ($tipo) {
        case 1:
            $query = "SELECT F.Titolo, F.Regista, F.Genere, F.AnnoProduzione, F.Nazionalita, F.Durata, A.Nome FROM 001_FILM AS F, 001_ATTORI AS A, 001_RECITA AS R
                 WHERE F.Titolo = '$Titolo' AND F.CodFilm = R.CodFilm AND A.CodAttore = R.CodAttore";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));
            
            while($search = mysqli_fetch_array($result)){
                ?>
                <div class="col my-2 mx-5">
                <div class='card border-0' style='width: 18rem;'>
                    <img src='images/<?php print("$search[Titolo].jpg"); ?>' class='card-img-top'>
                    <div class="card-body">
                        <h5 class='card-title'><?php print("$search[Titolo]"); ?></h5>
                        <p class='card-text'><span style='color:red;'>Regista: </span><?php print("$search[Regista]"); ?> </p>
                        <p class='card-text'><small><span style='color:red;'>Genere: </span><?php print("$search[Genere]"); ?></small></p>
                        <p class='card-text'><small><span style='color:red;'>Anno: </span><?php print("$search[AnnoProduzione]"); ?></small></p>
                        <p class='card-text'><small><span style='color:red;'>Nazionalità: </span><?php print("$search[Nazionalita]"); ?></small></p>
                        <p class='card-text'><small><span style='color:red;'>Durata: </span><?php print("$search[Durata]"); ?> minuti</small></p>
                        <p class='card-text'><small><span style='color:red;'>Attore principale: </span><a href='attori.php'><?php print("$search[Nome]"); ?></a></small></p>
                    </div>
                </div>
                </div>
            <?php
            }
            break;

        case 2:
            $query = "SELECT * FROM 001_ATTORI WHERE Nome = '$Titolo'";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));

            while($search = mysqli_fetch_array($result)){ ?>
                <div class="col my-2 mx-5">
                <div class='card border-0' style='width: 18rem;'>
                    <img src='images/<?php print("$search[Nome].jpg");?>' class='card-img-top'>
                    <div class="card-body">
                        <h5 class='card-title'><?php print("$search[Nome]"); ?> </h5>
                        <p class='card-text'><span style='color:red;'>Anno di Nascita: </span><?php print("$search[AnnoNascita]"); ?> </p>
                        <p class='card-text'><span style='color:red;'>Nazionalità: </span><?php print("$search[Nazionalita]"); ?></p>
                    </div>
                </div>
                </div>
            <?php
            }
            break;
        
        case 3:
            $query = "SELECT * FROM 001_SALE WHERE Nome = '$Titolo'";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));

            while($search = mysqli_fetch_array($result)){ ?>
                <div class="col my-2 mx-5">
                <div class='card border-0' style='width: 18rem;'>
                    <img src='images/<?php print("$search[Nome].jpg"); ?>' class='card-img-top'>
                    <div class="card-body">
                        <h5 class='card-title'><?php print("$search[Nome]"); ?></h5>
                        <p class='card-text'><span style='color:red;'>Citta: </span><?php print("$search[Citta]"); ?></p>
                        <p class='card-text'><span style='color:red;'>Posti: </span><?php print("$search[Posti]"); ?></p>
                    </div>
                </div>
                </div>
            <?php
            }
            break;
        default:
            die("Error");
    }
    
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

