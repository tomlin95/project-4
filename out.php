<?php 


    if(isset($_COOKIE['username']))
    {
        $curr_user = $_COOKIE['username'];
        setcookie('username',$curr_user,time()-900);
        echo 'You have logged out';
    }
    else
    {
        echo 'You are not logged in';
    }


?>