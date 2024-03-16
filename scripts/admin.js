document.getElementById("showAds").addEventListener("click", function(event) {
    event.preventDefault(); // Megakadályozza a gomb alapértelmezett működését (pl. ugrás az URL-re)
    var adminGetCardsContainer = document.getElementById("adminGetCardsContainer");
    if (adminGetCardsContainer.style.display === "none") {
      adminGetCardsContainer.style.display = "block";
    } else {
      adminGetCardsContainer.style.display = "none";
    }
  });
document.getElementById("showUsers").addEventListener("click", function(event) {
    event.preventDefault(); // Megakadályozza a gomb alapértelmezett működését (pl. ugrás az URL-re)
    var adminGetUsersContainer = document.getElementById("adminGetUsersContainer");
    if (adminGetUsersContainer.style.display === "none") {
      adminGetUsersContainer.style.display = "block";
    } else {
      adminGetUsersContainer.style.display = "none";
    }
  });