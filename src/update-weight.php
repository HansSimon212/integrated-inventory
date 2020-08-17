<!DOCTYPE html>
<html lang="pt-br">

<?php
include("../assets/include/head.php");
?>

<body>
    <?php
    include("../assets/include/header.php");
    include("../assets/include/vrm.php");
    ?>

    <div class="wrapper">
        <section id="main_content">
            <h2 class="main_content_title">Update Item Weight</h2>
            <i>Update weight of an item (if container is empty, please
                <a class="inline_page_link" href="remove-item.php">remove item from inventory</a>)</i>
            <hr>

            <?php
            include("../assets/include/qrcode.php");
            ?>
        </section>
    </div>
</body>

</html>