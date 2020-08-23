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
            <td><b>Quantity (Kg):</b></td>
            <td id="item_info_quantitykg"></td>
        </tr>
        <tr>
            <td><b>Expiration Date:</b></td>
            <td id="item_info_expdate"></td>
        </tr>
        <tr>
            <td><b>Rack Location:</b></td>
            <td id="item_info_rackloc"></td>
        </tr>
        <tr>
            <td><b>LOT:</b></td>
            <td id="item_info_lot"></td>
        </tr>
        <tr>
            <td><b>RM #:</b></td>
            <td id="item_info_rm"></td>
        </tr>
        <tr>
            <td><b>LEI:</b></td>
            <td id="item_info_lei"></td>
        </tr>
        <tr>
            <td><b>YOU:</b></td>
            <td id="item_info_you"></td>
        </tr>
        <tr>
            <td><b>BEN:</b></td>
            <td id="item_info_ben"></td>
        </tr>
        <tr>
            <td><b>EXP:</b></td>
            <td id="item_info_exp"></td>
        </tr>
        <tr>
            <td><b>CS:</b></td>
            <td id="item_info_cs"></td>
        </tr>
        <tr>
            <td><b>ECT:</b></td>
            <td id="item_info_ect"></td>
        </tr>
        <tr>
            <td><b>Container:</b></td>
            <td id="item_info_container"></td>
        </tr>
        <tr>
            <td><b>Notes:</b></td>
            <td id="item_info_notes"></td>
        </tr>
    </table>
</div>

<?php
$item_type = getFullItemType();
$item_name = $passed_array['name'];
$item_uid = $passed_array['uid'];
$item_quantitykg = $passed_array['quantity_Kg'];
$item_expdate = $passed_array['Exp_Date'];
$item_rackloc = $passed_array['location'];
$item_lot = $passed_array['LOT'];
$item_rm = $passed_array['RM'];
$item_lei = $passed_array['LEI'];
$item_you = $passed_array['YOU'];
$item_ben = $passed_array['BEN'];
$item_exp = $passed_array['EXP'];
$item_cs = $passed_array['CS'];
$item_ect = $passed_array['ECT'];
$item_container = $passed_array['Container'];
$item_notes = $passed_array['notes'];
?>


<script>
    // Sets all item info
    const infoType = document.getElementById('item_info_type');
    const infoName = document.getElementById('item_info_name');
    const infoUID = document.getElementById('item_info_uid');
    const infoQuantityKg = document.getElementById('item_info_quantitykg');
    const infoExpDate = document.getElementById('item_info_expdate');
    const infoRackLoc = document.getElementById('item_info_rackloc');
    const infoLot = document.getElementById('item_info_lot');
    const infoRM = document.getElementById('item_info_rm');
    const infoLEI = document.getElementById('item_info_lei');
    const infoYOU = document.getElementById('item_info_you');
    const infoBEN = document.getElementById('item_info_ben');
    const infoEXP = document.getElementById('item_info_exp');
    const infoCS = document.getElementById('item_info_cs');
    const infoECT = document.getElementById('item_info_ect');
    const infoContainer = document.getElementById('item_info_container');
    const infoNotes = document.getElementById('item_info_notes');


    infoType.innerText = '<?php echo $item_type ?>';
    infoName.innerText = '<?php echo $item_name ?>';
    infoUID.innerText = '<?php echo $item_uid ?>';
    infoQuantityKg.innerText = '<?php echo $item_quantitykg ?>';
    infoExpDate.innerText = '<?php echo $item_expdate ?>';
    infoRackLoc.innerText = '<?php echo $item_rackloc ?>';
    infoLot.innerText = '<?php echo $item_lot ?>';
    infoRM.innerText = '<?php echo $item_rm ?>';
    infoLEI.innerText = '<?php echo $item_lei ?>';
    infoYOU.innerText = '<?php echo $item_you ?>';
    infoBEN.innerText = '<?php echo $item_ben ?>';
    infoEXP.innerText = '<?php echo $item_exp ?>';
    infoCS.innerText = '<?php echo $item_cs ?>';
    infoECT.innerText = '<?php echo $item_ect ?>';
    infoContainer.innerText = '<?php echo $item_container ?>';
    infoNotes.innerText = '<?php echo $item_notes ?>';
</script>