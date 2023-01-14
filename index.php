<?php

  $utakmice_u_toku = array(
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
  );

  $utakmice_predstojece = array(
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
  );

  $utakmice_zavrsene = array(
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
    array (
      "tim1" => "Barselona",
      "tim2" => "Real Madrid",
      "golovi1" => "0",
      "golovi2" => "2",
    ),
  );
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
            <div class='utakmica'> 
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
            <div class='utakmica'> 
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
            <div class='utakmica'> 
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
</body>
</html>