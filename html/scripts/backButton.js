// Redirect to "/" on click or enter

const backButton = document.querySelector("#back");

backButton.addEventListener("click", () => {
  window.location.href="/";
});

backButton.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    window.location.href="/";
  }
});
