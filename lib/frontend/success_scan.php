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
<div class="success_msg" id="success_msg">
</div>


<a href="scan.php" class="another_btn_link"><button class="another_btn">Update Another Item</button></a>


<script>
    const successMsg = document.getElementById('success_msg');
    successMsg.innerHTML = "<?php echo $success_msg ?>";
</script>