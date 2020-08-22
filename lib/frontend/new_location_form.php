<h3 id="new_location_form_title">New Location:</h3>
<form method="post" action="../database/move-item.php" id="new_location_form">
    <input type="text" name="sender" id="sender" hidden>
    <input type="text" name="info_array" id="info_array" hidden>
    <input type="text" name="item_type" id="item_type" hidden>
    <input type="number" name="new_item_location" id="new_item_location">
    <input type="submit" value="Submit">
</form>

<script>
    // Sets up $_POST form for changing location
    const sender = document.getElementById('sender');
    // const infoArray = document.getElementById('info_array');
    const itemType = document.getElementById('item_type');
    const newItemLocation = document.getElementById('new_item_location');

    sender.value = document.getElementById('fileName').getAttribute('content');
    <?php
    // getItemTypeLetter(): Void -> String
    // Returns the letter representing the type of item the user scanned
    function getItemTypeLetter()
    {
        global $rm_info, $dispersion_info;

        if (!empty($rm_info)) {
            return 'R';
        } else if (!empty($dispersion_info)) {
            return 'D';
        } else {
            return 'D';
        }
    }
    $item_type = getItemTypeLetter();
    ?>

    itemType.value = '<?php echo $item_type ?>';
</script>