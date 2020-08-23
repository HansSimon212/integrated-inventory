<table id="item_info_table">
    <caption>Item Info</caption>
    <thead>
        <tr>
            <th scope="col">Item Type</th>
            <th scope="col">Name</th>
            <th scope="col">UID</th>
            <th scope="col">Period</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td data-label="Item Type" id="item_info_type"></td>
            <td data-label="Name" id="item_info_name"></td>
            <td data-label="UID" id="item_info_uid"></td>
            <td data-label="Quantity (Kg)" id="item_info_quantitykg"></td>
            <td data-label="Expiration Date" id="item_info_expdate"></td>
            <td data-label="Rack Location" id="item_info_rackloc"></td>
            <td data-label="Formula" id="item_info_formula"></td>
            <td data-label="MFG" id="item_info_mfg"></td>
            <td data-label="Pack Out" id="item_info_packout"></td>
            <td data-label="CM" id="item_info_cm"></td>
            <td data-label="Shipping" id="item_info_shipping"></td>
            <td data-label="Notes" id="item_info_notes"></td>
        </tr>
    </tbody>
</table>

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

    // hides table rows with no content
    function hideIfEmpty(el) {
        if (el.innerText === '') {
            el.hidden = true;
        }
    }

    hideIfEmpty(infoShipping);
    hideIfEmpty(infoNotes);
</script>