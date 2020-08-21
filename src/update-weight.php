<!DOCTYPE html>
<html lang="pt-br">

<?php
/*
 * Possible Status:
 * - icanning: Item has not yet been scanned
 * - info: Item has been successfully scanned, awaiting user request (e.g. input new location)
 * - success: User request was completed successfully
 *
 * POST Variables for each Status:
 * - scanning: status, err_no
 * - info: status, err_no, status, item_uid, item_name, item_location
 * - success: status, err_no, status, item_uid, item_name, item_location
 */

$status = $_POST['status'];
$item_name = $_POST['item_name'];
$item_location = $_POST['item_location'];
$item_uid = $_POST['item_uid'];
$err_no = $_POST['err_no'];
?>

<head>
    <meta charset="UTF-8"/>
    <title>Inventory Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

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
        <h2 class="main_content_title">Update Item Weight</h2>
        <i>Update weight of an item (if container is empty, please
            <a class="inline_page_link" href="remove-item.php">remove item from inventory</a>)</i>
        <hr>

        <?php
        // switch on scanning status
        if ($status == 'scanning') {
            require("../assets/include/scanning.php");
        } elseif ($status == 'info') {
            require("../assets/include/info.php");
        } elseif ($status == 'success') {
            require("../assets/include/success.php");
        } else {
            echo "Invalid status. Status must be one of {'scanning', 'info', 'success'}";
        }

        require("../assets/include/error.php");
        ?>
    </section>
</div>
</body>

</html>