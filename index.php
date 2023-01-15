<?php

  $utakmice_u_toku = array();
  $utakmice_predstojece = array();
  $utakmice_zavrsene = array();
  require "./Datebase/konekcija.php";

  $result = mysqli_query($conn, "SELECT * FROM utakmice");
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row["status"] == "u toku")
      {
        array_push($utakmice_u_toku, $row);
      }
      else if($row["status"] == "zavrsena")
      {
        array_push($utakmice_zavrsene, $row);
      }
      else {
        array_push($utakmice_predstojece, $row); 
      }
    }
  }
  
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/global.css">
    <link rel="stylesheet" href="./Css/pocetna.css">
    <title>Document</title>
</head>
<body>
    <?php
      require './Components/navbar.php';
    ?>

<h2>Utakmice u toku:</h2>
    <div class="utakmice-lista">
    <?php 
        foreach ($utakmice_u_toku as $utakmica) {
          echo "
            <div class='utakmica' id='" . $utakmica["id"] . "'> 
              <div class='tim'>
                <span class='naziv'>" . $utakmica["tim1"] . "</span>
                <span class='golovi'>" . $utakmica["golovi1"] . "</span>
              </div>
              <span class='dve-tacke'>:</span>
              <div class='tim'>
                <span class='golovi'>" . $utakmica["golovi2"] . "</span>
                <span class='nazivi'>" . $utakmica["tim2"] . "</span>
              </div>
            </div>
          ";
        }
      ?>
    </div>
    <h2>Završene utakmice:</h2>
    <div class="utakmice-lista">
      <?php 
        foreach ($utakmice_zavrsene as $utakmica) {
          echo "
            <div class='utakmica' id='" . $utakmica["id"] . "'>
              <div class='tim'>
                <span class='naziv'>" . $utakmica["tim1"] . "</span>
                <span class='golovi'>" . $utakmica["golovi1"] . "</span>
              </div>
              <span>:</span>
              <div class='tim'>
                <span class='golovi'>" . $utakmica["golovi2"] . "</span>
                <span class='nazivi'>" . $utakmica["tim2"] . "</span>
              </div>
            </div>
          ";
        }
      ?>
    </div>
    <h2>Predstojeće utakmice:</h2>
    <div class="utakmice-lista">
      <?php 
        foreach ($utakmice_predstojece as $utakmica) {
          echo "
            <div class='utakmica' id='" . $utakmica["id"] . "'>
              <div class='tim'>
                <span class='naziv'>" . $utakmica["tim1"] . "</span>
                <span class='golovi'>" . $utakmica["golovi1"] . "</span>
              </div>
              <span>:</span>
              <div class='tim'>
                <span class='golovi'>" . $utakmica["golovi2"] . "</span>
                <span class='nazivi'>" . $utakmica["tim2"] . "</span>
              </div>
            </div>
          ";
        }
      ?>
    </div>
    
    <?php
      require './Components/footer.php';
    ?>
    <script src="./Js/pocetna.js"></script>
</body>
</html>