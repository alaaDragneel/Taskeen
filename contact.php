<?php
   include'init.php';
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      unset($_POST['Submit']);
      // set the values in variables
      $name       =   strValidation($_POST['name']);
      $email      =   strValidation($_POST['email'], 'email');
      $phone      =   '0'.strValidation($_POST['phone'], 'int');
      $message    =   strValidation($_POST['message']);
      $formError = array();
      foreach ($_POST as $key => $value) {
         if (empty($value)) {

            $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
         }
      }

      if(!empty($formError)): // if not he array empty
         echo alertStatus('error', null, $formError);
      endif;

      if (empty($formError)) {
         $stmt = $conn->prepare("INSERT INTO `contact`(`name`, `email`, `phone`, `message`) VALUES (:name, :email, :phone, :message)");
         $stmt->execute([
            'name'         => $name,
            'email'        => $email,
            'phone'        => $phone,
            'message'      => $message,
         ]);
         $theMsg = 'The Message Sent Successfully';
      }

   }

if (isset($theMsg)):
   echo alertStatus('success', $theMsg);
endif;

?>
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
        <h2>Contact Us</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="spacer">
        <div class="row contact">
            <div class="col-lg-6 col-sm-6 col-md-offset-3">
               <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <input type="text" class="form-control" name="name" placeholder="Full Name">
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                  <input type="text" class="form-control" name="phone" placeholder="Contact Number">
                  <textarea rows="6" class="form-control" name="message" placeholder="Message"></textarea>
                  <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Modal -->
<?php require_once "loginModal.php"; ?>
<!-- Login Modal -->

<?php include'includes/templates/footer.php';?>
