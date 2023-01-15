<?php
      if(!isset($_SESSION)) { 
    session_start(); 
} 
      require "../Datebase/konekcija.php";
      $ime = $errorMessage = $prezime = $errorMessage = $mail = $errorMessage = $sifra = $errorMessage = $ponovljenaSifra = $errorMessage = "";
      $error = false;
      function test_input($data)
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
          if (!empty($_POST["ime"]) && preg_match("/^([a-zA-Z' ]+)$/", $_POST['ime'])) {
              $ime = test_input($_POST["ime"]);
          } else {
              $errorMessage = "You must fill this field!";
              $error = true;
          }
  
          if (!empty($_POST["prezime"]) && preg_match("/^([a-zA-Z' ]+)$/", $_POST['prezime'])) {
              $prezime = test_input($_POST["prezime"]);
          } else {
              $errorMessage = "You must fill this field!";
              $error = true;
          }
  
          if (!empty($_POST["mail"]) && filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
              $mail = test_input($_POST["mail"]);
          } else {
              $errorMessage = "You must fill this field!";
              $error = true;
          }
  
          if (!empty($_POST["sifra"]) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST['sifra'])) {
              $sifra = test_input($_POST["sifra"]);
          } else {
              $errorMessage = "Password must have over 8 characters, at least 1 letter in upper case, letters in lower case and a number!";
              $error = true;}
  
          if (strcmp($_POST["ponovljenaSifra"], $sifra) == 0) {
              $ponovljenaSifra = test_input($_POST["ponovljenaSifra"]);
          } else {
              $errorMessage = "Password is not matching!";
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
          if ($num == 1) {
              $errorMessage ="Error/Account already exists";
          } else if (!$error) {
              $sql = "INSERT INTO korisnici (email, lozinka, ime, prezime)
              VALUES ('$mail', '$sifra', '$ime', '$prezime')";
              if ($conn->query($sql) === TRUE) {
                $user= array(
                  "ime" => $ime,
                  "prezime" => $prezime,
                  "admin" => false,
                  "id" => mysqli_insert_id($conn)
                );
                $_SESSION["user"] = $user;
                header("location: /");
              } else {
                $errorMessage = "There has been an error, try again.";
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
    <title>Registracija</title>
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
        <label for="ime">Ime</label>
        <input type="text" name="ime">
        <label for="prezime">Prezime</label>
        <input type="text" name="prezime">
        <label for="email">Email</label>
        <input type="email" name="mail">
        <label for="lozinka">lozinka</label>
        <input type="password" name="sifra">
        <label for="ponovljena">Ponovljena lozinka </label>
        <input type="password" name="ponovljenaSifra">
      
      	<button type="submit">Registruj se</button>

    </form>
    <a href="./login.php">Predji na logovanje</a>
  </div>
  </div>
  <?php
      require '../Components/footer.php';
  ?>
</body>
</html>