<!-- Displays information about a scanned item 

====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

    > $status :String             
    : what status the of the calling page should be (one of    '',    'info')
    
    > $err_msg :String 
    : any error message to be used in calling script
    
    > $success_msg :String        
    : any success message to be used in calling script 
    
    > $rm_info :String             
    : retrieved information about a raw material (serialized Array)
    
    > $dispersion_info :String
    : retrieved information about a dispersion (serialized Array)
    
================================================================================================

-->
<div id="scanned_item_info">
    <h3>Scanned Item Info:</h3>
    <table id="scanned_item_info_table">
        <tr>
            <td><b>Item Type:</b></td>
            <td id="item_info_type"></td>
        </tr>
        <tr>
            <td><b>Name:</b></td>
            <td id="item_info_name"></td>
        </tr>
        <tr>
            <td><b>UID:</b></td>
            <td id="item_info_uid"></td>
        </tr>
    </table>
</div>

<script>
    const itemInfoType = document.getElementById('item_info_type');
    const itemInfoName = document.getElementById('item_info_name');
    const itemInfoUID = document.getElementById('item_info_uid');

    <?php

    // getPassedArray(): Void -> Array
    // Returns which of {$rm_info, $dispersion_info} is nonempty
    function getPassedArray()
    {
        global $rm_info, $dispersion_info;

        if (!empty($rm_info)) {
            return $rm_info;
        } else if (!empty($dispersion_info)) {
            return $dispersion_info;
        } else {
            throw new ErrorException('Both rm_info and dispersion_info are empty');
        }
    }

    // getFullItemType(): Void -> String
    // Returns the full item type of the scanned/looked up item.
    // This item type is displayed to the user for scanning/lookup verification
    function getFullItemType()
    {
        global $rm_info, $dispersion_info;

        if (!empty($rm_info)) {
            return 'Raw Material';
        } else if (!empty($dispersion_info)) {
            return 'Dispersion';
        } else {
            return 'Unrecognized';
        }
    }

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
            throw new ErrorException('Unrecognized item type');
        }
    }

    $passed_array = getPassedArray();

    $item_info_type = getFullItemType();
    $item_name = $passed_array['name'];
    $item_uid = $passed_array['uid'];
    ?>

    itemInfoType.innerText = '<?php echo $item_info_type ?>';
    itemInfoName.innerText = '<?php echo $item_name ?>';
    itemInfoUID.innerText = '<?php echo $item_uid ?>';
</script>

<form method="post" action="../lib/backend/update_item_info.php" id="update_info_form">
    <input type="text" name="sender" id="sender" hidden>
    <input type="text" name="item_type_letter" id="item_type_letter" hidden>
    <label class="update_info_form_label" id="new_item_location_label">Location:</label>
    <input class="update_info_form_input" type="number" name="new_item_location" id="new_item_location">
    <br>
    <label class="update_info_form_label" id="new_item_quantity_kg_label">Quantity (Kg):</label>
    <input class="update_info_form_input" type="number" name="new_item_quantity_kg" id="new_item_quantity_kg">
    <br>
    <input type="submit" value="Update" id="update_info_form_btn">
</form>

<script>
    // Sets up $_POST form for changing location
    const sender = document.getElementById('sender');
    const itemTypeLetter = document.getElementById('item_type_letter');
    const newItemLocation = document.getElementById('new_item_location');
    const newItemQuantity = document.getElementById('new_item_quantity_kg');

    sender.value = document.getElementById('fileName').getAttribute('content');
    <?php
    $item_type_letter = getItemTypeLetter();
    ?>

    itemTypeLetter.value = '<?php echo $item_type_letter ?>';
    newItemLocation.value = <?php echo $passed_array['location'] ?>;
    newItemQuantity.value = <?php echo $passed_array['quantity_Kg'] ?>;
</script>