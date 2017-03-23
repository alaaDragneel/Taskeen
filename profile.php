<?php

ob_start();
include "init.php";


if (isset($_SESSION["user_mail"])) {

   $bus = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], null, 'id', 'DESC');
   $resentBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], null, 'id', 'DESC');
   $resentPublishiedBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], 'AND isApproved = 1', 'id', 'DESC');
   $resentWaitingBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], 'AND isApproved = 0', 'id', 'DESC');
?>
   <!-- banner -->
   <div class="inside-banner">
      <div class="container">
         <span class="pull-right"><a href="#">Home</a> / Profile</span>
         <h2>Profile</h2>
      </div>
   </div>
   <!-- banner -->

   <div class="container">
      <div class="spacer">
         <div class="row">

            <div class="col-md-12">
               <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                     <li class="active"><a href="#all" data-toggle="tab" aria-expanded="true">all Bullding</a></li>
                     <li class=""><a href="#Approved" data-toggle="tab" aria-expanded="false">Approved Bullding</a></li>
                     <li class=""><a href="#UnApproved" data-toggle="tab" aria-expanded="false">UnApproved Bullding</a></li>
                     <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="all">
                        <!-- /.box-header -->
                        <div class="box-body">
                           <div class="row">
                              <?php if (count($bus) > 0): ?>
                                 <ul class="cd-items cd-container">
                                    <?php foreach ($bus as $key): ?>
                                       <li class="cd-item">
                                          <img src="<?php echo $key['image']?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                          <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                                       </li> <!-- cd-item -->
                                       <?php
                                          if ($key['isApproved'] == 1) {
                                             $approved = true;
                                          } else {
                                             $approved = false;
                                          }
                                        ?>
                                    <?php endforeach; ?>
                                 </ul> <!-- cd-items -->

                                 <div class="cd-quick-view">
                                    <div class="cd-slider-wrapper">
                                       <ul class="cd-slider">
                                          <li><img src="images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                                       </ul> <!-- cd-slider -->
                                    </div> <!-- cd-slider-wrapper -->

                                    <div class="cd-item-info">
                                       <h2 class="title"></h2>
                                       <p class="disBox"></p>
                                       <div class="btn-group" role="group" style="margin-left: 19%;">
                                          <a href="#" class="moreBox btn btn-default">Edit</a>
                                          <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                          <span href="#" class="priceBox btn btn-warning"></span>
                                          <span href="#" class="statusBox btn "></span>
                                       </div> <!-- cd-item-action -->
                                    </div> <!-- cd-item-info -->
                                    <a href="#0" class="cd-close">Close</a>
                                 </div> <!-- cd-quick-view -->
                              <?php else: ?>
                                 <div class="alert alert-danger">You Did'nt add Any Buldings</div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="Approved">
                        <!-- /.box-header -->
                        <div class="box-body">
                           <div class="row">
                              <?php if (count($resentPublishiedBulldingView) > 0): ?>
                                 <ul class="cd-items cd-container">
                                    <?php foreach ($resentPublishiedBulldingView as $key): ?>
                                       <li class="cd-item">
                                          <img src="<?php echo $key['image']?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                          <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                                       </li> <!-- cd-item -->
                                    <?php endforeach; ?>
                                 </ul> <!-- cd-items -->

                                 <div class="cd-quick-view">
                                    <div class="cd-slider-wrapper">
                                       <ul class="cd-slider">
                                          <li><img src="images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                                       </ul> <!-- cd-slider -->
                                    </div> <!-- cd-slider-wrapper -->

                                    <div class="cd-item-info">
                                       <h2 class="title"></h2>
                                       <p class="disBox"></p>
                                       <div class="btn-group" role="group" style="margin-left: 19%;">
                                          <a href="#" class="moreBox btn btn-default">Edit</a>
                                          <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                          <span href="#" class="priceBox btn btn-warning"></span>
                                          <span href="#" class="statusBox btn "></span>
                                       </div> <!-- cd-item-action -->
                                    </div> <!-- cd-item-info -->
                                    <a href="#0" class="cd-close">Close</a>
                                 </div> <!-- cd-quick-view -->
                              <?php else: ?>
                                 <div class="alert alert-info">There're no Published Bullding</div>
                              <?php endif; ?>
                           </div>

                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="UnApproved">
                        <!-- /.box-header -->
                        <div class="box-body">
                           <div class="row">
                              <?php if (count($resentWaitingBulldingView) > 0): ?>
                                 <ul class="cd-items cd-container">
                                    <?php foreach ($resentWaitingBulldingView as $key): ?>
                                       <li class="cd-item">
                                          <img src="<?php echo $key['image']?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                          <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                                       </li> <!-- cd-item -->
                                    <?php endforeach; ?>
                                 </ul> <!-- cd-items -->

                                 <div class="cd-quick-view">
                                    <div class="cd-slider-wrapper">
                                       <ul class="cd-slider">
                                          <li><img src="images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                                       </ul> <!-- cd-slider -->
                                    </div> <!-- cd-slider-wrapper -->

                                    <div class="cd-item-info">
                                       <h2 class="title"></h2>
                                       <p class="disBox"></p>
                                       <div class="btn-group" role="group" style="margin-left: 19%;">
                                          <a href="#" class="moreBox btn btn-default">Edit</a>
                                          <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                          <span href="#" class="priceBox btn btn-warning"></span>
                                          <span href="#" class="statusBox btn "></span>
                                       </div> <!-- cd-item-action -->
                                    </div> <!-- cd-item-info -->
                                    <a href="#0" class="cd-close">Close</a>
                                 </div> <!-- cd-quick-view -->
                              <?php else: ?>
                                 <div class="alert alert-warning">there're no Waiting Buldings</div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.tab-pane -->

                     <div class="tab-pane" id="settings">
                        <?php

                        $userId = $_SESSION['id'];

                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editMember'])) {
                           // set the values in variables

                           $name           =   strValidation($_POST['name']);
                           $email          =   strValidation($_POST['email'], 'email');
                           $phone          =   '0'.strValidation($_POST['phone'], 'int');
                           $address        =   strValidation($_POST['address']);
                           $facebook       =   strValidation($_POST['facebook'], 'url');
                           $password       =   $_POST['newPassword'] === '' ? $_POST['oldPassowrd'] : sha1($_POST['newPassword']);

                           /*Start Check the Fileds */
                           $formError = array();

                           foreach ($_POST as $key => $value) {
                              if (empty($value) && $value != 0) {
                                 $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
                              }
                           }

                           // update the data if there are not errors
                           if (empty($formError)) {
                              // select to see the unique email
                              $userInfoSelect = $conn->prepare("SELECT id, email FROM users WHERE email = ? && id != ?");

                              //execute
                              $userInfoSelect->execute([$email, $userId]);

                              // count the data
                              $usersCount = $userInfoSelect->rowCount();
                              if ($usersCount === 1) {
                                 $formError[] = 'This Email Already Taken';
                              } else {
                                 // Update TO database
                                 $userInfoUpdate = $conn->prepare("UPDATE users SET
                                 name = ?, email = ?, phone = ?, address = ?, facebook = ?, password = ?
                                 WHERE
                                 id = ?");

                                 $userInfoUpdate->execute([
                                 $name, $email, $phone, $address, $facebook, $password, $userId,
                                 ]);
                                 $theMsg = 'The info Updated Successfully';
                              }
                           }
                        }

                        // get the user information

                        $getUserInfo = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");

                        // execute the data

                        $getUserInfo->execute([$userId]);

                        // Count the rows

                        $count = $getUserInfo->rowCount();

                        // if there is such id show the form

                        if ($count > 0) {

                           $userInfo = $getUserInfo->fetch();

                        } else{

                           $invalidUserInfo = 'This id is not exesist';
                        }

                        ?>
                        <?php
                        if(!empty($invalidUserInfo)): // appear when the id is incorrect
                        echo alertStatus('error', null, $invalidUserInfo);
                        endif;
                        ?>

                        <?php
                        if(!empty($formError)): // if not he array empty
                        echo alertStatus('error', null, $formError);
                        endif;
                        ?>

                        <?php
                        if (isset($theMsg)):
                        echo alertStatus('success', $theMsg);
                        endif;
                        ?>

                        <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                           <input type="hidden" name="memberId" value="<?php echo $userInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                 <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $userInfo['name'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">email</label>
                              <div class="col-sm-10">
                                 <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $userInfo['email'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="phone" class="col-sm-2 control-label">phone</label>
                              <div class="col-sm-10">
                                 <input type="number" name="phone" class="form-control" placeholder="phone" value="<?php echo $userInfo['phone'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="address" class="col-sm-2 control-label">address</label>
                              <div class="col-sm-10">
                                 <input type="text" name="address" class="form-control" placeholder="address" value="<?php echo $userInfo['address'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="facebook" class="col-sm-2 control-label">facebook</label>
                              <div class="col-sm-10">
                                 <input type="url" name="facebook" class="form-control" placeholder="facebook" value="<?php echo $userInfo['facebook'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="password" class="col-sm-2 control-label">Password Field</label>
                              <div class="col-sm-10">
                                 <input type="hidden" name="oldPassowrd" value="<?php echo $userInfo['password']?>">
                                 <input type="password" name="newPassword"class="form-control" placeholder="Password" >
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                 <button type="submit" class="btn btn-primary" name="editMember">Edit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
               </div>
               <!-- /.nav-tabs-custom -->
            </div>

         </div>
      </div>
   </div>
<?php
   include "includes/templates/footer.php";
} else {
   header ("Location: index.php");
   exit();
}
ob_end_flush();
?>
