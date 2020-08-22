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
        } else {
            return $dispersion_info;
        }
    }

    // returnItemType(): Void -> String
    // Returns the item type of the scanned item
    function returnItemType()
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
            return 'D';
        }
    }

    $passed_array = getPassedArray();
    $item_info_type = returnItemType();
    $item_name = $passed_array['name'];
    $item_uid = $passed_array['uid'];
    ?>

    itemInfoType.innerText = '<?php echo $item_info_type ?>';
    itemInfoName.innerText = '<?php echo $item_name ?>';
    itemInfoUID.innerText = '<?php echo $item_uid ?>';
</script>

<h3 id="update_info_form_title">New Location:</h3>
<form method="post" action="../lib/backend/update_item_info.php" id="update_info_form">
    <input type="text" name="sender" id="sender" hidden>
    <input type="text" name="item_type" id="item_type" hidden>
    <input type="number" name="new_item_location" id="new_item_location">
    <input type="submit" value="Submit">
</form>

<script>
    // Sets up $_POST form for changing location
    const sender = document.getElementById('sender');
    const itemType = document.getElementById('item_type');

    sender.value = document.getElementById('fileName').getAttribute('content');

    <?php


    $item_type = getItemTypeLetter();

    // sets up retrieved information to be passed
    session_start();
    $_SESSION['info_array'] = getPassedArray();
    ?>

    itemType.value = '<?php echo $item_type ?>';
</script>