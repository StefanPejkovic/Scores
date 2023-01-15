const registracijaButton = document.getElementById("registracija_button");
const prijavaButton = document.getElementById("prijava_button");
const odjavaButton = document.getElementById("odjava_button");
if(registracijaButton) 
	registracijaButton.addEventListener("click", () => window.location.href = "/pages/register.php");
if(prijavaButton) 
	prijavaButton.addEventListener("click", () => window.location.href = "/pages/login.php");
if(odjavaButton) 
	odjavaButton.addEventListener("click", () => window.location.href = "/utils/logout.php");