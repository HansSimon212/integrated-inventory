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
        <tr>
            <td><b>Current Rack Location:</b></td>
            <td id="item_info_location"></td>
        </tr>
    </table>
</div>

<script>
    const itemInfoType = document.getElementById('item_info_type');
    const itemInfoName = document.getElementById('item_info_name');
    const itemInfoUID = document.getElementById('item_info_uid');
    const itemInfoLocation = document.getElementById('item_info_location');

    <?php

    $passed_array = getPassedArray();
    $item_info_type = returnItemType();
    $item_name = $passed_array['name'];
    $item_uid = $passed_array['uid'];
    $item_location = $passed_array['location'];
    ?>

    itemInfoType.innerText = '<?php echo $item_info_type ?>';
    itemInfoName.innerText = '<?php echo $item_name ?>';
    itemInfoUID.innerText = '<?php echo $item_uid ?>';
    itemInfoLocation.innerText = '<?php echo $item_location ?>';
</script>