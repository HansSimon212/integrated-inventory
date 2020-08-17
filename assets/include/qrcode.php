<!-- Includes all elements for QR code scanner -->

<div id="container">
    <a id="btn-scan-qr">
        <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg">
        <a />
        <canvas hidden="" id="qr-canvas"></canvas>
        <div id="qr-result" hidden="">
            <b>Data:</b> <span id="outputData"></span>
        </div>
</div>
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js">
</script>
<script src="../js/qrcode.js"></script>