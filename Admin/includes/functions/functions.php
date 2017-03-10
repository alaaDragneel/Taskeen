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

	function countItem($item, $table) {
		global $conn;

		$stmt2 = $conn->prepare("SELECT COUNT($item) FROM $table ");

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

    function getAllFrom($field, $table, $where = null, $and = null, $orderField, $ordering = 'ASC')
    {
        global $conn;
        $stmt = $conn->prepare("SELECT $field FROM $table $where $and ORDER BY $orderField $ordering");
        $stmt->execute();
        $all = $stmt->fetchAll();
        return $all;
    }

    /* End Get All From */


?>
