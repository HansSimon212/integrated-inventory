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


<div class="update_info_form_wrapper">
    <div class="myform form ">
        <form action="../lib/backend/update_item_info.php" method="post">
            <div class="form-group">
                <input type="text" name="sender" class="form-control my-input" id="sender" hidden>
            </div>
            <div class="form-group">
                <input type="number" name="new_item_location" class="form-control my-input" id="new_item_location" placeholder="New Rack Location" min="1.0" step="1.0">
            </div>
            <div class="form-group">
                <input type="number" name="new_item_quantity_kg" class="form-control my-input" id="new_item_quantity_kg" placeholder="New Quantity (Kg)" min="0.001" step="0.001">
            </div>
            <div class="text-center ">
                <input type="submit" value="Update Info" id="update_info_form_btn">
            </div>
        </form>
    </div>
</div>

<script>
    // Sets up $_POST form for changing location
    const sender = document.getElementById('sender');
    sender.value = document.getElementById('fileName').getAttribute('content');

    // Sets $rm_info and $dispersion info
    <?php
    $_SESSION['rm_info'] = $rm_info;
    $_SESSION['dispersion_info'] = $dispersion_info;
    ?>
</script>