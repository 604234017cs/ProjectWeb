<?php
require 'condb.php';
$regis_id = $_GET['id'];
$sql = 'DELETE FROM register WHERE regis_id=?';
$statement = $conn->prepare($sql);
if ($statement->execute([$regis_id])) {
  header("Location: ../Train/show.php");
}