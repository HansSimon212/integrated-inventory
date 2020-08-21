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
            <h2 class="main_content_title">Home</h2>
            <hr>
            <?php
            require("../assets/include/error.php");
            ?>
        </section>
    </div>

</body>

</html>