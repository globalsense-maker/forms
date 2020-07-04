<?php 
include('db_connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<!-- Main css -->
    <link rel="stylesheet" href="css/my_self.css">

<title>Table with database</title>
<!--fonts css -->


</head>
<body>
<table>
<tr>
<th>Id</th>
<th>fullname</th>
<th>email</th>
<th>pwrd</th>
<th>repeat_pw</th>
</tr>

<?php

$sql = "SELECT * FROM user_tb";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['pwrd'] . "</td>";
                echo "<td>" . $row['repeat_pw'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);

?>
</table>

</body>
</html>