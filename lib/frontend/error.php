<!-- Error Message Box 

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
    
================================================================================================

-->

<div id="err_msg" hidden></div>

<?php
// checks if an error code was passed, displays error message if one was
if ($err_msg != '') {
?>
    <script>
        {
            let err_msg = "<?php echo $err_msg ?>";
            let err_msg_box = document.getElementById('err_msg');
            err_msg_box.hidden = false;
            err_msg_box.innerHTML = err_msg;
        }
    </script>
<?php
}
?>