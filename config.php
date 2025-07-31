<?php

//connected to the database
$conn = mysqli_connect("localhost","root","","registration") ;

// cheak connection

if($conn==false){
    dir('error:cannot connected');
}

?>