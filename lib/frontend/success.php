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

> $rm_info :String
: retrieved information about a raw material (serialized Array)

> $dispersion_info :String
: retrieved information about a dispersion (serialized Array)

================================================================================================

-->

<img src="https://freeiconshop.com/wp-content/uploads/edd/checkmark-flat.png" alt="Success Icon" style="width: 200px; padding: 8px 0px 15px 0px;">
<br>
<div style="width: 100%; text-align: center; font-size: 16px; font-weight: 500;" id="success_msg">
</div>

<script>
    const successMsg = document.getElementById('success_msg');
    successMsg.innerHTML = "<?php echo $success_msg ?>";
</script>