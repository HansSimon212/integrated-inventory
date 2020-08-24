<!-- Displays green checkmark and success message on user action success (e.g. changing item location) 

====================================================================================================
EXPECTED VARIABLES
====================================================================================================

> $status :String
: what status the of the calling page should be (one of '', 'info')

> $err_msg :String
: any error message to be used in calling script

> $success_msg :String
: any success message to be used in calling script

> $rm_info :Array
: retrieved information about a raw material

> $dispersion_info :Array
: retrieved information about a dispersion

================================================================================================
-->

<img src="https://freeiconshop.com/wp-content/uploads/edd/checkmark-flat.png" alt="Success Icon" style="width: 200px; margin: 30px 0;">
<br>
<div style="width: 100%; text-align: center; font-size: 18px; font-weight: 500;" id="success_msg">
</div>

<div>
    <a href="scan.php"><button>Update Another Item</button></a>
</div>

<script>
    const successMsg = document.getElementById('success_msg');
    successMsg.innerHTML = "<?php echo $success_msg ?>";
</script>