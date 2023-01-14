<?php
  $utakmica =array (
    "tim1" => "Barselona",
    "tim2" => "Real Madrid",
    "golovi1" => "0",
    "golovi2" => "2",
    "status" => "u toku",
    "minut" => "65",
    "datum" => "18/12/2023",
    "vreme" => "18:00"
  );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/global.css">
    <link rel="stylesheet" href="../Css/utakmica.css">
    <title>Utakmica</title>
</head>
<body>
    <?php
      require '../Components/navbar.php';
    ?>
    <h1>Podaci o utakmici</h1>

    <div class="rezultat">
      <?php 
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
      ?>
      <div class="podaci">
        <p>Status: <?php echo $utakmica["status"]; ?></p>
        <p>Datum: <?php echo $utakmica["datum"]; ?></p>
        <p>Vreme: <?php echo $utakmica["vreme"]; ?></p>
      </div>
    </div>
    <h2>Komentari:</h2>
    
    <?php
      require '../Components/footer.php';
    ?>
</body>
</html>