<?php

   /*
   ** Function Name => strValidation($string, $type='string')
   ** param $string => get string dynamicly
   ** param $type => 'string', 'email', 'url'
   ** return valid string
   ** This function Used to validate the data From The White spaces and Tags to the string
   ** Sanitize and Validate the email and url
   */
   function strValidation($string, $type='string') {
      // if the type string
      if ($type === 'string') {
         // validate the data From The White spaces and Tags
         $valid = trim(strip_tags($string));
         // return the valid data
         return $valid;
      } elseif ($type === 'email') {
         // if the type email
         if (filter_var($string, FILTER_VALIDATE_EMAIL) &&
         filter_var($string, FILTER_SANITIZE_EMAIL)) { // validate and sinitize the email
            $validEmail = $string;
            // return the valid data
            return $validEmail;

         } else {
            // if Invalid
            return $validEmail = '';
         }
      } elseif ($type === 'url') {
         // if the type email
         if (filter_var($string, FILTER_VALIDATE_URL) &&
         filter_var($string, FILTER_SANITIZE_URL)) { // validate and sinitize the email
            $validUrl = $string;
            // return the valid data
            return $validUrl;

         } else {
            // if Invalid
            return $validUrl = '';
         }
      } elseif ($type === 'int') {
         // if the type integer
         $validInt = is_numeric($string) ? intval($string) : '';
         // return
         return $validInt;
      }
   }

   /* start check item count function V1.0 */

   /*
   **function use to count the items rows
   ** function use parameter
   ** $item = use item to count about it [ users | items ]
   ** $table = the required table to count from [ users | product ]
   */

   function countItem($item, $table, $options = null) {
      global $conn;

      $stmt2 = $conn->prepare("SELECT COUNT($item) FROM $table $options");

      $stmt2->execute();

      return $stmt2->fetchColumn();
   }

   /* end check item count function V1.0 */

   /*start latest record function V1.0*/

   /*
   ** function to get the latest items from database [ User | Items | Comments ]
   ** $select = the selected field
   ** $table = the table to choose from
   ** $order = the order way of the data
   ** $limit =  the limit of the select defult = 5
   */

   function getLatest($select, $table, $order, $limit = 5) {
      global $conn;

      $getstmt = $conn->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

      $getstmt->execute();

      $rows = $getstmt->fetchAll();

      return $rows;
   }

   /*end latest record function V1.0*/

   /* Start Get All From */

   function getAllFrom($field, $table, $where = null, $and = null, $orderField = 'id', $ordering = 'ASC', $limit = null)
   {
      global $conn;
      $stmt = $conn->prepare("SELECT $field FROM $table $where $and ORDER BY $orderField $ordering $limit");
      $stmt->execute();
      $all = $stmt->fetchAll();
      return $all;
   }

   function getOneFrom($field, $table, $where = null, $and = null, $orderField = 'id', $ordering = 'ASC', $limit = null)
   {
      global $conn;
      $stmt = $conn->prepare("SELECT $field FROM $table $where $and ORDER BY $orderField $ordering $limit");
      $stmt->execute();
      $all = $stmt->fetch();
      return $all;
   }

   function dd($value)
   {
      echo "<pre>";
         print_r($value);
      echo "</pre>";
      exit();
   }

   function deleteItem($table, $id)
   {
      global $conn;

      $count = countItem($id, $table);
      if ($count > 0) {
         $stmt = $conn->prepare("DELETE FROM $table WHERE id = :id");
         $stmt->bindParam('id', $id);
         $stmt->execute();
         $var = true;
      }else {
         $var = false;
      }
      return $var;
   }




   function RedirectFunc($theMsg, $url = null, $Seconds = 3)
   {
      if($url === null){
         $url = 'index.php';
         $link = "Home Page";
      } else {
         if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
            $url = $_SERVER['HTTP_REFERER'];
            $link = "Prevuios Page";
         }else{
            $url = 'index.php';
            $link = "Home Page";
         }
      }
      echo $theMsg;
      echo "<div class='alert alert-info'>You Will Redirected To $link After $Seconds Seconds</div>";
      header("refresh:$Seconds;url=$url");
   }
   /* End Get All From */

   /* start image validate function */
   function imageValidation($image)
   {
      $dir_name        = "layouts/images/bullding_image/";
      $path            = $image['tmp_name'];//temporary path
      $name            = $image['name'];
      $size            = $image['size'];
      $type            = $image['type']; //image/png
      $error           = $image['error'];
      $mimeTypes = ['image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/x-png', 'image/png'];
      /*Start Check the Image Type&Size*/

      if (!$error && is_uploaded_file($path) && in_array($type, $mimeTypes)){
         $ext = pathinfo($name, PATHINFO_EXTENSION);
         $sha1 = sha1($name);
         $fileName = date("y-m-d-h-i-s") . "_" . $sha1 . '.' . $ext;
               move_uploaded_file($path, $dir_name . $fileName);

         return $dir_name . $fileName;
      } else {
         return false;
      }

   }

   function avatar()
   {
      return "layouts/images/bullding_image/avatar/avatar.jpg";
   }

   /* end image validate function */

   function showBulldingStatistics($year = null)
   {
      global $conn;


      if ($year == null) {

         $year = date('Y');
      }

      $stmt = $conn->prepare("SELECT COUNT(*) AS counting, month FROM `buldings` WHERE `year` = ? GROUP BY `month` ORDER BY month ASC");

      $stmt->execute([$year]);

      $chartBuillding = $stmt->fetchAll();
      // make the array that will have the empty nonth
      $array = [];
      if (isset($chartBuillding[0]['month'])) {
         for($i = 1; $i < $chartBuillding[0]['month']; $i++){
            // assain the array
            $array[] = 0;
         }
      }
      // merge the 2 arrays
      $new = array_merge($array, $chartBuillding);

      return $new;
   }



?>
