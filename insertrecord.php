<?php

$link = mysqli_connect("localhost", "root", "", "websys");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO infostudtbl (student_name, course_name, address, age) VALUES ('APUANG GERALDS', 'BSIT', 'PASAY', '20')";
if(mysqli_query($link, $sql)){
    echo "Record inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>