/*
    Global variables
*/
var cameraId = null;

// This method will trigger user permissions
Html5Qrcode.getCameras()
  .then((devices) => {
    /**
     * devices would be an array of objects of type:
     * { id: "id", label: "label" }
     */
    if (devices && devices.length) {
      cameraId = devices[0].id;
      // .. use this to start scanning.
    }
  })
  .catch((err) => {
    // handle err
  });

// // Starts using the camera
// const html5QrCode = new Html5Qrcode(
//   /* element id */ "reader",
//   /* verbose */ true
// );
// html5QrCode
//   .start(
//     cameraId,
//     {
//       fps: 10, // Optional frame per seconds for qr code scanning
//       qrbox: 150, // Optional if you want bounded box UI
//     },
//     (qrCodeMessage) => {
//       html5QrCode
//         .stop()
//         .then((ignore) => {
//           // QR Code scanning is stopped.
//         })
//         .catch((err) => {
//           // Stop failed, handle it.
//         });

//       console.log(qrCodeMessage);
//     },
//     (errorMessage) => {
//       console.log(`error: ${errorMessage}`);
//     }
//   )
//   .catch((err) => {
//     console.log(`Failed to start using camera id:${cameraId}`);
//   });

const html5QrCode = new Html5Qrcode(/* element id */ "reader");
// File based scanning
const fileinput = document.getElementById("qr-input-file");
fileinput.addEventListener("change", (e) => {
  if (e.target.files.length == 0) {
    // No file selected, ignore
    return;
  }

  const imageFile = e.target.files[0];
  // Scan QR Code
  html5QrCode
    .scanFile(imageFile, true)
    .then((qrCodeMessage) => {
      // success, use qrCodeMessage
      console.log(qrCodeMessage);
    })
    .catch((err) => {
      // failure, handle it.
      console.log(`Error scanning file. Reason: ${err}`);
    });
});
