<?php

ob_start();
session_start();


$pageTitle = 'Admin Profile';

if (isset($_SESSION["admin_mail"])) {

   include "init.php";

   $do = isset($_GET['do']) ? $_GET['do'] : 'Manage'; // Check if the $do is Exixets

   $resentBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], null, 'id', 'DESC');
   $resentPublishiedBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], 'AND isApproved = 1', 'id', 'DESC');
   $resentWaitingBulldingView = getAllFrom('*', 'buldings', 'WHERE user_id ='.$_SESSION["id"], 'AND isApproved = 0', 'id', 'DESC');
   ?>
   <div class="page-content">
      <div class="row">
         <?php
         include "includes/templates/sidebar.php";
         ?>
         <?php if ($do == 'Manage'): ?>
            <div class="col-md-10">
               <section class="content">
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
                                    <div class="table-responsive">
                                       <table class="table no-margin">
                                          <thead>
                                             <tr>
                                                 <th>ID#</th>
                                                 <th>Title</th>
                                                 <th style="width: 300px">DESC</th>
                                                 <th>address</th>
                                                 <th>price</th>
                                                 <th>rooms</th>
                                                 <th>Status</th>
                                                 <th>image</th>
                                                 <th>actions</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($resentBulldingView as $bu): ?>
                                                <tr>
                                                    <td><?php echo $bu['id'] ?></td>
                                                    <td><?php echo $bu['title'] ?></td>
                                                    <?php $description = str_split($bu['description'], 100) ?>
                                                    <td><?php echo $description[0] . '...' ?></td>
                                                    <td><?php echo $bu['address'] ?></td>
                                                    <td><?php echo $bu['price'] ?></td>
                                                    <td><?php echo $bu['num_rooms'] ?></td>
                                                    <td><span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success' ?>"><?php echo $bu['isApproved'] == 0 ? 'unapproved' : 'published' ?></span></td>
                                                    <td><img src="../<?php echo $bu['image'] ?>" alt="<?php echo $bu['title'] ?>" width="100"/></td>
                                                    <td>
                                                        <a href="buldings.php?do=Edit&bu_id=<?php echo $bu['id'] ?>" class="btn btn-success">Edit</a>
                                                        <a href="buldings.php?do=Delete&bu_id=<?php echo $bu['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                             <?php endforeach; ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                 </div>
                                 <!-- /.box-body -->

                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="Approved">
                                 <!-- /.box-header -->
                                 <div class="box-body">
                                    <div class="table-responsive">
                                       <table class="table no-margin">
                                          <thead>
                                             <tr>
                                                 <th>ID#</th>
                                                 <th>Title</th>
                                                 <th style="width: 300px">DESC</th>
                                                 <th>address</th>
                                                 <th>price</th>
                                                 <th>rooms</th>
                                                 <th>Status</th>
                                                 <th>image</th>
                                                 <th>actions</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($resentPublishiedBulldingView as $bu): ?>
                                                <tr>
                                                    <td><?php echo $bu['id'] ?></td>
                                                    <td><?php echo $bu['title'] ?></td>
                                                    <?php $description = str_split($bu['description'], 100) ?>
                                                    <td><?php echo $description[0] . '...' ?></td>
                                                    <td><?php echo $bu['address'] ?></td>
                                                    <td><?php echo $bu['price'] ?></td>
                                                    <td><?php echo $bu['num_rooms'] ?></td>
                                                    <td><span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success' ?>"><?php echo $bu['isApproved'] == 0 ? 'unapproved' : 'published' ?></span></td>
                                                    <td><img src="../<?php echo $bu['image'] ?>" alt="<?php echo $bu['title'] ?>" width="100"/></td>
                                                    <td>
                                                        <a href="buldings.php?do=Edit&bu_id=<?php echo $bu['id'] ?>" class="btn btn-success">Edit</a>
                                                        <a href="buldings.php?do=Delete&bu_id=<?php echo $bu['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                             <?php endforeach; ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                 </div>
                                 <!-- /.box-body -->
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="UnApproved">
                                 <!-- /.box-header -->
                                 <div class="box-body">
                                    <div class="table-responsive">
                                       <table class="table no-margin">
                                          <thead>
                                             <tr>
                                                 <th>ID#</th>
                                                 <th>Title</th>
                                                 <th style="width: 300px">DESC</th>
                                                 <th>address</th>
                                                 <th>price</th>
                                                 <th>rooms</th>
                                                 <th>Status</th>
                                                 <th>image</th>
                                                 <th>actions</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($resentWaitingBulldingView as $bu): ?>
                                                <tr>
                                                    <td><?php echo $bu['id'] ?></td>
                                                    <td><?php echo $bu['title'] ?></td>
                                                    <?php $description = str_split($bu['description'], 100) ?>
                                                    <td><?php echo $description[0] . '...' ?></td>
                                                    <td><?php echo $bu['address'] ?></td>
                                                    <td><?php echo $bu['price'] ?></td>
                                                    <td><?php echo $bu['num_rooms'] ?></td>
                                                    <td><span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success' ?>"><?php echo $bu['isApproved'] == 0 ? 'unapproved' : 'published' ?></span></td>
                                                    <td><img src="../<?php echo $bu['image'] ?>" alt="<?php echo $bu['title'] ?>" width="100"/></td>
                                                    <td>
                                                        <a href="buldings.php?do=Edit&bu_id=<?php echo $bu['id'] ?>" class="btn btn-success">Edit</a>
                                                        <a href="buldings.php?do=Delete&bu_id=<?php echo $bu['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                             <?php endforeach; ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.table-responsive -->
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
                                       $phone          =   strValidation($_POST['phone'], 'int');
                                       $address        =   strValidation($_POST['address']);
                                       $facebook       =   strValidation($_POST['facebook'], 'url');
                                       $password       =   $_POST['newPassword'] === '' ? $_POST['oldPassowrd'] : sha1($_POST['newPassword']);
                                       $isadmin        =   1;

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
                                                name = ?, email = ?, phone = ?, address = ?, facebook = ?, password = ?, isadmin  = ?
                                                WHERE
                                                id = ?");

                                                $userInfoUpdate->execute([
                                                $name, $email, $phone, $address, $facebook, $password, $isadmin, $userId,
                                                ]);
                                                $theMsg = 'The User Updated Successfully';
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
               </section>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
        include "includes/templates/footer.php";
    }else {
        header ("Location: login.php");
        exit();
    }
    ob_end_flush();
?>
