<?php
require 'condb.php';
$message = '';
if (isset($_POST['T_Name']) && isset($_POST['Address']) 
&& isset($_POST['Date']) && isset($_POST['Time']) 
&& isset($_POST['L_ID'])){
    
    $T_Name = $_POST['T_Name'];
    $Address = $_POST['Address'];
    $Date = $_POST['Date']; 
    $Time = $_POST['Time'];
    $L_ID = $_POST['L_ID'];
    // $Document = $_POST['Document'];

    
    $sql = "INSERT INTO training(T_Name, Address, Date, Time, L_ID)
    VALUES('$T_Name', '$Address', '$Date', '$Time' , '$L_ID')";
    $statement = $conn->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มการอบรมสำเร็จ';
        header("Location: showtrain.php");
    }
  }



?>