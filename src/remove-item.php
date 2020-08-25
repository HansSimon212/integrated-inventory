<?php
require("../lib/get-session-vars.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Inventory Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta id="fileName" content="remove-item.php">

    <?php
    require("../lib/frontend/import.html");
    ?>
</head>

<body>
    <?php require("../lib/frontend/header.html"); ?>

    <div class="wrapper">
        <?php
        if ($status == '') {
            require("../lib/frontend/scanning.php");
            // TODO: item lookup
        } elseif ($status == 'info') {
            require("../lib/frontend/display_info_remove.php");
        } elseif ($status == 'success') {
            require("../lib/frontend/success_remove.php");
        } else {
            $err_msg = 'Invalid status "' . $status . '"';
            $_SESSION = [];
        }
        require("../lib/frontend/error.php");
        ?>
    </div>

    <footer>
        <nav>
            <a href="find-item.php">
                <i class="fa fa-fw fa-search nav--icon"></i>
            </a>
            <a href="scan.php">
                <i class="fa fa-fw fa-qrcode nav--icon"></i>
            </a>
            <a href="#">
                <i class="fa fa-fw fa-trash nav--icon nav--icon--current"></i>
            </a>
        </nav>
    </footer>
</body>

</html>