<?php
// Retrieves all $_SESSION vars (whether initialized or not)
require("../lib/get-session-vars.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Inventory Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta id="fileName" content="update-item-info.php">

    <?php
    require("../lib/frontend/import.html");
    ?>
</head>

<body>
    <?php
    require("../lib/frontend/header.html");
    require("../lib/frontend/vrm.html");
    ?>

    <div class="wrapper">
        <section id="main_content">
            <h2 class="main_content_title">Change Item Location</h2>
            <i>Update the rack location of an item</i>
            <hr>

            <?php
            // switch on scanning status
            if ($status == '') {
                // QR code scanner
                require("../lib/frontend/scanning.php");
                // TODO: item lookup
            } elseif ($status == 'info') {
                // Displays scanned/looked up item info
                require("../lib/frontend/display_info.php");
            } elseif ($status == 'success') {
                require("../lib/frontend/success.php");
            } else {
                $err_msg = 'Invalid status "' . $status . '"';
            }
            require("../lib/frontend/error.php");
            ?>
        </section>
    </div>
</body>

</html>