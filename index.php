<?php
include "parameters.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
        <div class="row">
            <?php

            $connect = mysqli_connect($servername, $username, $password)
                or die("Connessione non riuscita " . mysqli_error($connect));

            mysqli_select_db($connect, $database)
                or die("Impossibile selezione il database " . mysqli_error($connect));

            # Lista dei film
            $query = "SELECT F.Titolo FROM 001_FILM as F";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));

            print('<div class="col">');
            print('<ul class="list-group">');
            print('<li class="list-group-item active" aria-current="true">Film</li>');
           
            while($search = mysqli_fetch_array($result)){
                print("<li class='list-group-item'><a href='#'>$search[Titolo]</a></li>");
            }
            print('</ul>');
            print('</div>');
            
            # Lista degli attori
            $query = "SELECT A.Nome FROM 001_ATTORI as A";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));

            print('<div class="col">');
            print('<ul class="list-group">');
            print('<li class="list-group-item active" aria-current="true">Attori</li>');
           
            while($search = mysqli_fetch_array($result)){
                print("<li class='list-group-item'><a href='#'>$search[Nome]</a></li>");
            }
            print('</ul>');
            print('</div>');

            # Lista dei cinema
            $query = "SELECT S.Nome, S.Citta FROM 001_SALE as S";
            $result = mysqli_query($connect, $query)
                or die ("Errore nella query <br>" . mysqli_error($connect));

            print('<div class="col">');
            print('<ul class="list-group">');
            print('<li class="list-group-item active" aria-current="true">Cinema</li>');
           
            while($search = mysqli_fetch_array($result)){
                print("<li class='list-group-item'><a href='#'> $search[Nome], $search[Citta] </a></li>");
            }
            print('</ul>');
            print('</div>');
            ?>

    </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

