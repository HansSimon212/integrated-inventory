<!-- Error Message Box -->
<div id="err_msg" hidden></div>
<style>
    #err_msg {
        color: firebrick;
        font-size: 16px;
        font-weight: 800;
        text-align: center;
        width: auto;
        padding: 15px;
    }
</style>

<?php
// checks if an error code was passed, displays error message if one was
if ($err_msg != '') {
    ?>
    <script>
        {
            let err_msg = "<?php echo $err_msg ?>";
            let err_msg_box = document.getElementById('err_msg');
            err_msg_box.hidden = false;
            err_msg_box.innerText = err_msg;
        }
    </script>
    <?php
}
?>