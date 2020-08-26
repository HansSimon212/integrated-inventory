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
    
    > $rm_info :Array      
    : retrieved information about a raw material
    
    > $dispersion_info :Array
    : retrieved information about a dispersion

    > $passed_array :Array
    :  retrieved information about scanned item ($passed_array == $rm_info || $passed_array == $dispersion_info)
    
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

<script>
    // handles recover confirmation button click
    function handleRecoverConfirm() {
        // attempts to recover item
        const recoverItemForm = document.getElementById('recover_item_form');
        recoverItemForm.submit();
    }

    // handles recover confirmation button cancel
    function handleRecoverCancel() {
        // clears all session variables
        <?php $_SESSION = []; ?>
        // returns to scanning page
        window.open("scan.php", "_top");
    }
</script>

<form action="../lib/backend/recover_item.php" id="recover_item_form" method="post" hidden>
    <input type="text" id="sender" name="sender">
</form>

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

<div id="recover_confirmation_wrapper">
    <p id="recover_confirmation_title">Recover Item From Archive?</p>
    <button id="recover_confirmation_cancel" onclick="handleRecoverCancel()">Cancel</button>
    <button id="recover_confirmation_recover" onclick="handleRecoverConfirm()">Recover</button>
</div>