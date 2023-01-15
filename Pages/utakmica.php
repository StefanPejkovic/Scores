<?php
if(empty($_GET["id"]))
{
  header("location:/");
  exit;
}
require '../Datebase/konekcija.php';
$utakmica;
  $id_provera = $_GET["id"];
  $sql = "
    SELECT 
      tim1,tim2,golovi1,golovi2,status,
      DATE_FORMAT(datum_vreme, '%d.%m.%Y') as datum,
      DATE_FORMAT(datum_vreme, '%H:%m:%d') as vreme 
    FROM utakmice WHERE id = '$id_provera'
  ";
  
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) == 0) 
  {
    header("location:/");
  }
  else
  {
    $utakmica = mysqli_fetch_assoc($result); 
  }

  $komentari = array(
      array (
        "ime" => "Stefan",
        "prezime" => "Pejkovic",
        "datum" => "18/12/2023",
        "vreme"=> "18:00",
        "komentar" => "bilo sta "
      ),

      array (
        "ime" => "Stefan",
        "prezime" => "Pejkovic",
        "datum" => "18/12/2023",
        "vreme"=> "18:00",
        "komentar" => "bilo sta "
      ),

      array (
        "ime" => "Stefan",
        "prezime" => "Pejkovic",
        "datum" => "18/12/2023",
        "vreme"=> "18:00",
        "komentar" => "bilo sta "
      ),

      array (
        "ime" => "Stefan",
        "prezime" => "Pejkovic",
        "datum" => "18/12/2023",
        "vreme"=> "18:00",
        "komentar" => "bilo sta "
      )
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

    <div class="komentari">
    <?php

      foreach ($komentari as $komentar) {
        echo "
          <div class='komentar'>
            <div class='komentar-podaci'>
              <span>" . $komentar["ime"] . " " . $komentar["prezime"] . "</span>
              <span>" . $komentar["datum"]. " " . $komentar["vreme"] . "</span>
            </div>
            <p class='tekst'>" . $komentar["komentar"] . "</p>
          </div>
        ";
      }

      ?>

  
    </div>
    <div class="wrapper">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <label for="komentar">Ostavi komentar:</label><br>
          <textarea  name="komentar" rows="4" cols="50"> </textarea> <br>
          <button type="submit">Komentariši</button><br>
      </form>
    </div>
    <?php
      require '../Components/footer.php';
    ?>
</body>
</html>