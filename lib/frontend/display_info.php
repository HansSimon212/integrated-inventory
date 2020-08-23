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

$passed_array = getPassedArray(); // finds non-empty info array ($rm_info, $dispersion_info,...)

// What type of material's information do we have?
if (!empty($rm_info)) {
    // We have Raw Material info
    require("../lib/frontend/display_rm.php");
} else if (!empty($dispersion_info)) {
    // We have Dispersion info
    require("../lib/frontend/display_dispersion.php");
} else {
    // If my code gets here I am giving up on Computer Science
    throw new ErrorException('Both RM and Dispersion info arrays are empty.');
}
?>



<form method="post" action="../lib/backend/update_item_info.php" id="update_info_form">
    <input type="text" name="sender" id="sender" hidden>
    <label class="update_info_form_label" id="new_item_location_label">Location:</label>
    <input class="update_info_form_input" type="number" name="new_item_location" id="new_item_location" min="1.0" step="1.0">
    <br>
    <label class="update_info_form_label" id="new_item_quantity_kg_label">Quantity (Kg):</label>
    <input class="update_info_form_input" type="number" name="new_item_quantity_kg" id="new_item_quantity_kg" min="0.00001" step="0.00001">
    <br>
    <input type="submit" value="Update" id="update_info_form_btn">
</form>

<script>
    // Sets up $_POST form for changing location
    const sender = document.getElementById('sender');
    const newItemLocation = document.getElementById('new_item_location');
    const newItemQuantity = document.getElementById('new_item_quantity_kg');

    sender.value = document.getElementById('fileName').getAttribute('content');

    newItemLocation.value = <?php echo $passed_array['location'] ?>;
    newItemQuantity.value = <?php echo $passed_array['quantity_Kg'] ?>;

    // Sets $rm_info and $dispersion info
    <?php
    $_SESSION['rm_info'] = $rm_info;
    $_SESSION['dispersion_info'] = $dispersion_info;
    ?>
</script>