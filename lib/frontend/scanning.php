<!-- Displays QR code scanner, retrieves item information on scan success 

====================================================================================================
EXPECTED VARIABLES
====================================================================================================

> $err_msg :String
: any error message to be used in calling script

================================================================================================

-->

<div id="container">
    <a id="btn-scan-qr">
        <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg" alt="QR Code image not found.">
    </a>
    <canvas hidden="" id="qr-canvas"></canvas>
</div>

<form method="post" action="../lib/backend/get-item-info.php" id="get_info_form" hidden>
    <input type="text" name="item_uid" id="item_uid" hidden>
    <input type="text" name="sender" id="sender" hidden>
</form>

<script src="../js/qr_packed.js"></script>
<script>
    // QR Code elements
    const qrObj = window.qrcode;

    const video = document.createElement("video");
    const canvasElement = document.getElementById("qr-canvas");
    const canvas = canvasElement.getContext("2d");
    const btnScanQR = document.getElementById("btn-scan-qr");

    // $_POST form
    const getInfoForm = document.getElementById('get_info_form');
    const itemUID = document.getElementById('item_uid');
    const itemName = document.getElementById('item_name');
    const itemLocation = document.getElementById('item_location');
    const status = document.getElementById('status');
    const sender = document.getElementById('sender');

    let scanning = false;

    // Stops video stream, shows QR Code scan result and hides canvas
    qrObj.callback = (res) => {
        if (res) {
            scanning = false;
            video.srcObject.getTracks().forEach((track) => {
                track.stop();
            });
            canvasElement.hidden = true;

            // posts empty variables for all other than uid, requests query to database
            itemUID.value = res;
            sender.value = document.getElementById('fileName').getAttribute('content');
            getInfoForm.submit();
        }
    };

    // Starts the video stream, draws result on canvas every tick
    btnScanQR.onclick = () => {
        navigator.mediaDevices
            .getUserMedia({
                video: {
                    facingMode: "environment"
                }
            })
            .then(function(stream) {
                scanning = true;
                btnScanQR.hidden = true;
                canvasElement.hidden = false;
                // required to tell iOS safari we don't want fullscreen
                video.setAttribute("playsinline", true);
                video.srcObject = stream;
                video.play();
                tick();
                scan();
            });
    };

    // Draws result on canvas element every tick
    function tick() {
        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

        scanning && requestAnimationFrame(tick);
    }

    // Attempts to scan QR Code
    function scan() {
        try {
            qrObj.decode();
        } catch (e) {
            setTimeout(scan, 300);
        }
    }
</script>