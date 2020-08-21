<?php
// Retrieves all $_SESSION vars (whether initialized or not)
require("../assets/include/get-session-vars.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Inventory Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta id="fileName" content="move-item.php">

    <?php
    require("../assets/include/import.html");
    ?>
</head>

<body>
    <?php
    require("../assets/include/header.html");
    require("../assets/include/vrm.html");
    ?>

    <div class="wrapper">
        <section id="main_content">
            <h2 class="main_content_title">Move Item</h2>
            <i>Update the rack location of an item</i>
            <hr>

            <?php
            // switch on scanning status
            if ($status == '') {
                require("../assets/include/scanning.php");
            } elseif ($status == 'info') {
                require("../assets/include/info.php");
                require("new_location_form.php");
            } elseif ($status == 'success') {
                require("../assets/include/success.php");
            } else {
                $err_msg = 'Invalid status "' . $status . '"';
            }
            require("../assets/include/error.php");
            ?>
        </section>
    </div>
</body>

</html>