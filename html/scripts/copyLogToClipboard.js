// Copy log to clipboard

document.querySelector("#copyJailbreakLog").addEventListener("click", () => {
  const copyText = document.getElementById("jailbreakLog").textContent;
  const textArea = document.createElement("textarea");
  textArea.textContent = copyText;
  document.body.append(textArea);
  textArea.select();
  document.execCommand("copy");
  textArea.remove();
});

document.querySelector("#copyUpdateLog").addEventListener("click", () => {
  const copyText = document.getElementById("updateLog").textContent;
  const textArea = document.createElement("textarea");
  textArea.textContent = copyText;
  document.body.append(textArea);
  textArea.select();
  document.execCommand("copy");
  textArea.remove();
});
