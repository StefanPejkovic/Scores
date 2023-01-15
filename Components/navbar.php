<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 
if(empty($_SESSION["user"])) {
    $user = null;
}
else {
    $user = $_SESSION["user"];
}

// echo json_encode($user);
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
                <a href="/"><img src="/Images/logo.png" alt="Logo" class="logo-slika"></a>
            </div>
            <div class="nav-links">
                <?php
                    if(empty($user))
                        echo "<button class='nav-button' id='registracija_button'> Registracija </button>";
                    else
                        echo "<p class='nav-ime'>" . $user["ime"]. " ". $user["prezime"][0]. "." . "</p>";
                ?>

                <?php
                    if(empty($user))
                        echo "<button class='nav-button'id='prijava_button'> Prijava </button>";
                    else
                        echo "<button class='nav-button'id='odjava_button'> Odjava </button>";
                ?>
            </div>
        </nav>
    </header>
    <script src="../Js/navbar.js"></script>
</body>
</html>