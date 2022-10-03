<?php
//echo"<pre>";
//print_r($_REQUEST);
if(isset($_REQUEST["btnlogin"]))
{
    $u=$_REQUEST["txtuname"];
    $p=$_REQUEST["txtpassword"];
    if(($u=="Ram")&&($p=="Avtar"))
    {
        echo "Login Successfull";
    }
    else
    {
        echo "Login Unsuccessfull";
        header("location:login.php");
    }

}
header("location:basic.php");
?>