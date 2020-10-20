<?php
require 'condb.php';
$id = $_GET['id'];
$sql = 'DELETE FROM cer WHERE id=?';
$statement = $conn->prepare($sql);
if ($statement->execute([$id])) {
  header("Location: showtrain.php");

}