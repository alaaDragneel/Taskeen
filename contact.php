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
            <div class="col-lg-6 col-sm-6 ">
               <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <input type="text" class="form-control" name="name" placeholder="Full Name">
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                  <input type="text" class="form-control" name="phone" placeholder="Contact Number">
                  <textarea rows="6" class="form-control" name="message" placeholder="Message"></textarea>
                  <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
               </form>
            </div>
            <div class="col-lg-6 col-sm-6 ">
                <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
            </div>
        </div>
    </div>
</div>
<?php include'includes/templates/footer.php';?>
