const player = document.getElementById("player");
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const captureButton = document.getElementById("capture");

const constraints = {
  video: true,
};

captureButton.addEventListener("click", () => {
  player.remove();
  captureButton.remove();
  canvas.style.border = "thick solid #62a845";
  //displays the canvas
  canvas.style.display = "block";
  // Draw the video frame to the canvas.
  context.drawImage(player, 0, 0, canvas.width, canvas.height);
});

// Attach the video stream to the video element and autoplay.
navigator.mediaDevices
  .getUserMedia(constraints)
  .then((stream) => {
    player.srcObject = stream;
  })
  .catch((err) => {
    canvas.remove();
    player.remove();
    captureButton.remove();
    const main_content = document.getElementById("main_content");
    var errorMsg = document.createElement("p");
    errorMsg.innerHTML =
      "Failed to acquire user camera permission. Please reload the page.";
    main_content.appendChild(errorMsg);
  });
