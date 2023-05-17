<?php
$server="localhost:3306";
$user_name="root";
$password="";
$database="rentHouseSystem";

$conn=new mysqli($server,$user_name,$password,$database);

if($conn->connect_error){

die("Connection Failed : " . $conn->connect_error);
}
?>