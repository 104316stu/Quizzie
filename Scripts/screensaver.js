let lastMouseTime = 0;
let screensaverRunning = false;


let longinsec = 60

function updateRunning(flag) {
  screensaverRunning = flag;
  document
    .querySelector(".screensaver-layout")
    .classList.toggle("hidden", !screensaverRunning);
}

setInterval(() => {
  if (!lastMouseTime) return;
  if (!screensaverRunning) {
    if (+new Date() - lastMouseTime >= longinsec * 1000) {
      updateRunning(true);
    }
  }
}, 1000);
document.addEventListener("mousemove", () => {
  lastMouseTime = +new Date();
  if (screensaverRunning) {
    updateRunning(false);
  }
});