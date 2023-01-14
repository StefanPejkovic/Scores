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
  <div class="wrapper">
    <h1>Registracija korisnika</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="lozinka">lozinka</label>
        <input type="password" name="lozinka">
      
      	<button type="submit">Prijavi se</button>

    </form>
    <a href="./register.php">Predji na registraciju</a>
  </div>
  <?php
      require './Components/footer.php';
    ?>
</body>
</html>