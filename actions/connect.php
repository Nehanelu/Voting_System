<?php

$con = mysqli_connect("localhost" , "root" ,"", "votingsystem");
if($con){
    echo "connection successful";
}
else {
    echo "not connected";
}

?>