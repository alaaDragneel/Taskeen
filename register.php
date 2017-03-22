<?php include'init.php';?>

<?php
   ob_start();
   session_start();
   if(isset($_SESSION["user_mail"])){
      header("Location: index.php"); //Redirect the user to the dashboard
      exit();
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // remove the submit name
         unset($_POST['Submit']);
        // set the values in variables
        $name           =   strValidation($_POST['name']);
        $email          =   strValidation($_POST['email'], 'email');
        $phone          =   '0'.strValidation($_POST['phone'], 'int');
        $address        =   strValidation($_POST['address']);
        $facebook       =   strValidation($_POST['facebook'], 'url');
        $password       =   $_POST['password'] === '' ? '' : sha1($_POST['password']);

         /*Start Check the Fileds */
         $formError = array();
         foreach ($_POST as $key => $value) {
             if (empty($value)) {

                 $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
             }
         }

         $stmt = $conn->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
         $stmt->execute([$email]);
         $all = $stmt->rowCount();

         if ($all > 0) {
            $formError[] = 'Sorry This Email Aready Registred';
         }

         // inasert the data if there are not errors
         if (empty($formError)) {
            // Insert Into database
           $stmt= $conn->prepare("INSERT INTO users(name, email, phone, address, facebook, password) VALUES(:name, :email, :phone, :address, :facebook, :password)");
           $stmt->execute(array(
               'name' 		=> $name,
               'email' 	=> $email,
               'phone' 	=> $phone,
               'address' 	=> $address,
               'facebook' 	=> $facebook,
               'password' 	=> $password,
           ));
           $theMsg = 'You Registred Successfully Login Please!';
         }
   }

?>

<!-- banner -->
<div class="inside-banner">
   <div class="container">
      <span class="pull-right"><a href="#">Home</a> / Register</span>
      <h2>Register</h2>
   </div>
</div>
<!-- banner -->


<div class="container">
   <div class="spacer">
      <div class="row register">
         <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               <input type="text" name="name" class="form-control" placeholder="name" >
               <input type="email" name="email" class="form-control" placeholder="email" >
               <input type="number" name="phone" class="form-control" placeholder="phone" >
               <input type="url" name="facebook" class="form-control" placeholder="facebook" >
               <textarea rows="6" class="form-control" placeholder="Address" name="address" ></textarea>
               <input type="password" name="password" class="form-control" placeholder="Password" >
               <button type="submit" class="btn btn-success" name="Submit">Register</button>
            </form>
         </div>
      </div>
   </div>
</div>


<?php
if(!empty($formError)): // if not he array empty
   echo alertStatus('error', null, $formError);
endif;
?>

<?php
if (isset($theMsg)):
   echo alertStatus('success', $theMsg);
   header("refresh: 5;url=index.php");
endif;
?>

<?php include'includes/templates/footer.php';?>
