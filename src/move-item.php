<?php
// Retrieves all $_SESSION vars (whether initialized or not)
require("../assets/include/get-session-vars.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"/>
    <title>Inventory Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
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
        if ($status == 'scanning' || !$status || $status == '') {
            require("../assets/include/scanning.php");
        } elseif ($status == 'info') {
            require("../assets/include/info.php");
            ?>

            <h3 id="new_location_form_title">New Location:</h3>
            <form method="post" action="../database/move-item.php" id="new_location_form">
                <input type="number" name="item_uid" id="item_uid" hidden>
                <input type="text" name="item_name" id="item_name" hidden>
                <input type="number" name="item_location" id="item_location" hidden>
                <input type="number" name="new_item_location" id="new_item_location">
                <input type="text" name="sender" id="sender" hidden>
                <input type="submit" value="Submit">
            </form>

            <script>
                const itemUID = document.getElementById('item_uid');
                const itemName = document.getElementById('item_name');
                const sender = document.getElementById('sender');
                const itemLocation = document.getElementById('item_location');

                // Sets inner text of each to the values given by get-info.php (passed through on way to this page)
                itemUID.value = '<?php echo $item_uid ?>';
                itemName.value = '<?php echo $item_name ?>';
                sender.value = document.getElementById('fileName').getAttribute('content');
                itemLocation.value = '<?php echo $item_location ?>';
            </script>

            <?php
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