<?php
require 'condb.php';
$message = '';
if ( isset($_POST['Dir_Name']) 
&& isset($_POST['L_Name'])  
&& isset($_POST['Tell']) && isset($_POST['Workplace']) 
&& isset($_POST['Username']) && isset($_POST['Password'])  ){
    // $status_id = $_POST['status_id'];
    $Dir_Name = $_POST['Dir_Name'];
    $L_Name = $_POST['L_Name'];
    $Tell = $_POST['Tell']; 
    $Workplace = $_POST['Workplace']; 
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];  
    $sql = "INSERT INTO lecturer( Dir_Name, L_Name, Tell, Workplace, Username, Password )
    VALUES( '$Dir_Name', '$L_Name','$Tell', '$Workplace', '$Username', '$Password')";
    $statement = $conn->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มวิทยากรสำเร็จ';
        header("Location: showlec.php");
       

    }
} 

?>
