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
  canvas.toBlob(function (blob) {
    const main_content = document.getElementById("main_content");
    var newImg = document.createElement("img"),
      url = URL.createObjectURL(blob);

    newImg.id = "captured_img";

    newImg.onload = function () {
      URL.revokeObjectURL(url);
    };

    newImg.src = url;

    var img2 = document.createElement("img");
    img2.src = "blob:null/4603458a-e748-4f1f-ac36-fa2942a96f04";
    main_content.appendChild(newImg);
    main_content.appendChild(img2);
  });
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
