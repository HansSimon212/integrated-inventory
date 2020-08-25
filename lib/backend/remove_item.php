<?php
session_start();

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'sender'      : relative path (relative to frontend/index.php) of the calling script
    
$_SESSION:
    > 'rm_info'  : array of information about a raw material if one was scanned
    > 'dispersion_info'  : array of information about a dispersion if one was scanned

====================================================================================================
                                    VARIABLES SET BEFORE RETURN
====================================================================================================

$_SESSION:
    > 'status' :String             
    : what status the of the calling page should be (one of    '',    'info')
    
    > 'err_msg' :String 
    : any error message to be used in calling script
    
    > 'success_msg' :String        
    : any success message to be used in calling script 
    
    > 'rm_info' :Array      
    : retrieved information about a raw material
    
    > 'dispersion_info' :Array
    : retrieved information about a dispersion

    ================================================================================================
*/