<?php
$user= array(
    "ime" => "Stefan",
    "prezime" => "Pejkovic",
    "admin" => true
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/global.css">
    <link rel="stylesheet" href="../Css/navbar.css">
</head>
<body>
    <header>
        <nav class="nav">
            <div class="logo">
                <img src="/Images/logo.png" alt="Logo" class="logo-slika">
            </div>
            <div class="nav-links">
                <?php
                    if($user["admin"])
                        echo "<p class='nav-ime'>" . $user["ime"]. " ". $user["prezime"][0]. "." . "</p>";
                    else
                        echo "<button class='nav-button'> Odjava </button>";
                ?>

                <?php
                    if($user["admin"])
                        echo "<button class='nav-button'> Registracija </button>";
                    else
                        echo "<button class='nav-button'> Prijava </button>";
                ?>
            </div>
        </nav>
    </header>

</body>
</html>