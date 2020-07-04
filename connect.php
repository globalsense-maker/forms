<?php
$dbconnect=mysqli_connect ('localhost','root','','mrduro');
if (mysqli_query($dbconnect, $query));
{
    echo " successfully created "
} else{
    mysqli_affeceted_rows ($dbconnect "row")
}


?>