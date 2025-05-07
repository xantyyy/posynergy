<?php
  require_once '../../includes/config.php';

  if (isset($_POST['id']) && isset($_POST['status'])) {
      $id = $_POST['id'];
      $status = $_POST['status'];
      $sql = "UPDATE tbl_users SET Status = ? WHERE ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $status, $id);
      if ($stmt->execute()) {
          echo "success";
      } else {
          echo "error";
      }
      $stmt->close();
  }
  $conn->close();
  ?>