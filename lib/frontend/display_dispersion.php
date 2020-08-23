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
            <td><b>Formula:</b></td>
            <td id="item_info_formula"></td>
        </tr>
        <tr>
            <td><b>MFG:</b></td>
            <td id="item_info_mfg"></td>
        </tr>
        <tr>
            <td><b>Pack Out:</b></td>
            <td id="item_info_packout"></td>
        </tr>
        <tr>
            <td><b>CM:</b></td>
            <td id="item_info_cm"></td>
        </tr>
        <tr hidden="">
            <td><b>Shipping:</b></td>
            <td id="item_info_shipping"></td>
        </tr>
        <tr hidden="">
            <td><b>Notes:</b></td>
            <td id="item_info_notes"></td>
        </tr>
    </table>
</div>

<?php
$item_type = getFullItemType();
$item_name = $passed_array['name'];
$item_uid = $passed_array['uid'];
$item_mfg = $passed_array['MFG'];
$item_formula = $passed_array['formula'];
$item_expdate = $passed_array['Exp_Date'];
$item_quantitykg = $passed_array['quantity_Kg'];
$item_packout = $passed_array['pack_Out'];
$item_cm = $passed_array['CM'];
$item_rackloc = $passed_array['location'];
$item_shipping = $passed_array['shipping'];
$item_notes = $passed_array['notes'];

?>


<script>
    // Sets all item info
    const infoType = document.getElementById('item_info_type');
    const infoName = document.getElementById('item_info_name');
    const infoUID = document.getElementById('item_info_uid');
    const infoMFG = document.getElementById('item_info_mfg');
    const infoFormula = document.getElementById('item_info_formula');
    const infoExpDate = document.getElementById('item_info_expdate');
    const infoQuantityKg = document.getElementById('item_info_quantitykg');
    const infoPackOut = document.getElementById('item_info_packout');
    const infoCM = document.getElementById('item_info_cm');
    const infoRackLoc = document.getElementById('item_info_rackloc');
    const infoShipping = document.getElementById('item_info_shipping');
    const infoNotes = document.getElementById('item_info_notes');

    infoType.innerText = '<?php echo $item_type ?>';
    infoName.innerText = '<?php echo $item_name ?>';
    infoUID.innerText = '<?php echo $item_uid ?>';
    infoMFG.innerText = '<?php echo $item_mfg ?>';
    infoFormula.innerText = '<?php echo $item_formula ?>';
    infoExpDate.innerText = '<?php echo $item_expdate ?>';
    infoQuantityKg.innerText = '<?php echo $item_quantitykg ?>';
    infoPackOut.innerText = '<?php echo $item_packout ?>';
    infoCM.innerText = '<?php echo $item_cm ?>';
    infoRackLoc.innerText = '<?php echo $item_rackloc ?>';
    infoShipping.innerText = '<?php echo $item_shipping ?>';
    infoNotes.innerText = '<?php echo $item_notes ?>';

    // unhideIfNonEmptys the element if its contents are non-empty
    function unhideIfNonEmpty(el) {
        if (el.innerText != '') {
            el.hidden = false;
        }
    }

    unhideIfNonEmpty(infoShipping);
    unhideIfNonEmpty(infoNotes);
</script>