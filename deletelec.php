<?php
require 'condb.php';
$L_ID = $_GET['id'];
$sql = 'DELETE FROM lecturer WHERE L_ID=?';
$statement = $conn->prepare($sql);
if ($statement->execute([$L_ID])) {
  header("Location: showlec.php");
}