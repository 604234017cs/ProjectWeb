<?php
require 'condb.php';
$message = '';
if ( isset($_POST['Dir_Name']) && isset($_POST['P_Name']) 
&& isset($_POST['Tell'])  && isset($_POST['Username']) && isset($_POST['Password'])){
    // $status_id = $_POST['status_id'];
    $Dir_Name = $_POST['Dir_Name'];
    $P_Name = $_POST['P_Name'];
    $Tell = $_POST['Tell']; 
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];  
    $sql = "INSERT INTO participants( Dir_Name, P_Name, Tell, Username, Password )
    VALUES( '$Dir_Name', '$P_Name', '$Tell', '$Username', '$Password')";
    $statement = $conn->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มผู้เข้าอบรมสำเร็จ';
        header("Location: showparti.php");
    }
}
?>
