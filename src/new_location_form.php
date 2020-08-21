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
    const infoArray = document.getElementById('info_array');
    const itemType = document.getElementById('item_type');
    const newItemLocation = document.getElementById('new_item_location');

    sender.innerText = document.getElementById('fileName');
    infoArray.innerText = '<?php echo serialize($passed_array); ?>';
    <?php
    $item_type = $passed_array['name'][strlen($passed_array['name']) - 1];
    ?>
    itemType.innerText = '<?php echo $item_type ?>';
</script>