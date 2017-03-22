<?php
   require_once "../../connect.php";
?>

<?php

   function cardView()
   {
      $id = $_GET['id'];
      global $conn;
      $areaSelect = $conn->prepare("SELECT * FROM buldings WHERE id = ? LIMIT 1");
      $areaSelect->execute([$id]);
      $areaFetch = $areaSelect->fetch();

      return $areaFetch;
   }

   echo json_encode(cardView());
?>
