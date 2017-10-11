<?php

$host='localhost';
$user= 'root';
$pass='';
$db='TempChem';

$dbcon=mysqli_connect($host,$user,$pass,$db);

 $querydrop ="SELECT * FROM ChemClasses";
 $resultdrop = mysqli_query($dbcon, $querydrop) or die("error: $query");

?>
