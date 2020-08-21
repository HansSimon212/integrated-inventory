<img src="https://freeiconshop.com/wp-content/uploads/edd/checkmark-flat.png" alt="Success Icon"
     style="width: 200px; padding: 8px 0px 15px 0px;">

<br>

<div style="width: 100%; text-align: center; font-size: 16px; font-weight: 500;" id="success_msg">
</div>

<script>
    let itemName = '<?php echo $item_name ?>';
    let itemLocation = '<?php echo $item_location ?>';

    const successMsg = document.getElementById('success_msg');
    successMsg.innerHTML = `Successfully moved<br>${itemName}<br>to<br>Rack ${itemLocation}`;
</script>

