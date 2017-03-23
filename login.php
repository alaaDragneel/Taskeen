<?php
ob_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
   unset($_POST['submit']);
   $email         = strValidation($_POST['email'], 'email');
   $password      = strValidation($_POST['password']);
   $hashedpass    = sha1($password);
   $errors = [];
   if (empty($email)) {
      $errors[] = "Email Feild IS Required";
   }

   if(empty($password)) {
      $errors[] = "password Feild IS Required";
   }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email format";
   }

   if (empty($errors)) {
      $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
      $stmt->execute([$email, $hashedpass]);
      $row   = $stmt->fetch();
      $count = $stmt->rowCount();
      // if count > 0 means database contains information
      if ($count > 0) {
         $_SESSION["user_mail"] = $row['email']; //Register the sission name
         $_SESSION["id"] = $row["id"]; //Register the sission ID
         header("Location: profile.php");//Redirect the user to the dashboard
         exit();
      } else {
         $errors[] = 'Email Or Password Wrong Try Again';
      }
   }
}

if(!empty($errors)): // if not he array empty
   echo alertStatus('error', null, $errors);
endif;
?>
