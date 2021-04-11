<?php
function redirect_home()
{
	
    if(!empty($_SESSION['userid']))
    {  
        redirect ('home');
    }
}

function is_guest()
{
    if(empty($_SESSION['userid']))
    {  
        return TRUE;
    }
    return FALSE;
}

function get_iduser()
{
    if(!is_guest()){
        return $_SESSION['userid']['userid'];
    } else {
        return '-1';
    }
}
?>