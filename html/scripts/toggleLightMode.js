console.log("Live happily :)");

let lightMode = localStorage.getItem("lightMode");
const toggleButton = document.querySelector("#toggle-light-mode");

// Toggle light mode
if (lightMode === "enabled") {
  document.body.classList.add("lightmode");
}

toggleButton.addEventListener("click", () => {
  document.body.classList.toggle("lightmode");
  if (lightMode !== "enabled") {
    localStorage.setItem("lightMode", "enabled");
  } else {
    localStorage.setItem("lightMode", null);
  }
});
