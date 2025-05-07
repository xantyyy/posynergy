<?php
  require_once '../../includes/config.php';

  if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $sql = "SELECT Owner, Username, Role FROM tbl_users WHERE ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($row = $result->fetch_assoc()) {
          echo json_encode($row);
      }
      $stmt->close();
  }
  $conn->close();
  ?>