<?php 
 $connect = new mysqli("localhost", "root", "", "exam_api");
  if ($connect->connect_errno) {
    echo "Failed to Connect to SQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

?>