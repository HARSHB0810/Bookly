function toggleMenu() {
    const dropdownMenu = document.querySelector(".dropdown");
    console.log(dropdownMenu);
    if (dropdownMenu.style.display === "flex") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "flex";
    }
  }

