<?php
  if(!isset($_SESSION)) { 
    session_start(); 
} 
  if(!empty($_SESSION["user"])) {
    header("location: /");
    exit;
  }
  require "../Datebase/konekcija.php";
  $mail = $errorMessage = $sifra = $errorMessage = "";
  $error = false;
  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


      if (!empty($_POST["mail"]) && filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
          $mail = test_input($_POST["mail"]);
      } else {
          $errorMessage = "You must fill this field!";
          $error = true;
      }

      if (!empty($_POST["sifra"])) {
          $sifra = test_input($_POST["sifra"]);
      } else {
          $errorMessage = "You must fill this field!";
          $error = true;
      }
      
      $s = " SELECT * FROM korisnici WHERE email = '$mail'";

      $result = mysqli_query($conn, $s);

      $num = mysqli_num_rows($result);

      /*echo $ime . "<br>";
      echo $prezime . "<br>";
      echo $sifra . "<br>";
      echo $ponovljenaSifra . "<br>";
      echo $mail . "<br>";*/
      if ($num == 0) {
          $errorMessage ="There is no user with this email";
      } else {
          $korisnik = mysqli_fetch_assoc($result);
          if($korisnik["lozinka"] != $sifra) {
            $errorMessage = "Incorrect password";
          }
          else {
            $user= array(
              "ime" => $korisnik["ime"],
              "prezime" => $korisnik["prezime"],
              "id" => $korisnik["id"]
            );
            $_SESSION["user"] = $user;
            header("location: /");
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
    <link rel="stylesheet" href="../Css/global.css">
    <link rel="stylesheet" href="../Css/forma.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/png">
    <title>Prijava</title>
</head>
<body>
  
  <?php
      require '../Components/navbar.php';
  ?>
  <div class="body">
    <div class="wrapper">
      <h1>Registracija korisnika</h1>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <span><?php echo $errorMessage ?></span>
          <label for="email">Email</label>
          <input type="email" name="mail">
          <label for="lozinka">lozinka</label>
          <input type="password" name="sifra">
        
          <button type="submit">Prijavi se</button>

      </form>
      <a href="./register.php">Predji na registraciju</a>
    </div>
  </div>
  <?php
      require '../Components/footer.php';
  ?>
</body>
</html>