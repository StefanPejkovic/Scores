
Array.from(
	document.querySelectorAll(".utakmica")
).forEach(utakmica => 
	utakmica.addEventListener("click", e => window.location.href = `/pages/utakmica.php?id=${e.currentTarget.id}` ));