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
?>
