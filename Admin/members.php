<?php

    ob_start();
    session_start();


    $pageTitle = 'Dshboard';

    if (isset($_SESSION["admin_mail"])) {

        include "init.php";

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage'; // Check if the $do is Exixets
?>
<div class="page-content">
    <div class="row">
        <?php
        include "includes/templates/sidebar.php";
        ?>
        <?php if ($do == 'Manage'): ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        Manage Members
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id != 1 ORDER BY id DESC");
                    $stmt->execute();
                    $rows = $stmt->fetchAll();
                    $count = $stmt->rowCount();
                ?>
                <div class="panel-body">
                  <h4>there <?php echo $count === 1 ? 'is ' . $count :  'are ' . $count; ?> Member/s</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID#</th>

                                    <th>name</th>

                                    <th>email</th>

                                    <th>phone</th>
                                    <th>address</th>

                                    <th>facebook</th>

                                    <th>Role</th>

                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php if ($count > 0): ?>
                                    <?php foreach ($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['facebook']; ?></td>
                                            <td>
                                                <?php if ($row['isadmin'] == 1): ?>
                                                    <span class="badge">Admin</span>
                                                <?php else: ?>
                                                    <span class="badge">User</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="members.php?do=Edit&memberId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                                <a href="members.php?do=Delete&memberId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">Add Members Please</div>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($do == 'Add'): ?>
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addMember'])) {

                    // set the values in variables
                    $name           =   strValidation($_POST['name']);
                    $email          =   strValidation($_POST['email'], 'email');
                    $phone          =   strValidation($_POST['phone'], 'int');
                    $address        =   strValidation($_POST['address']);
                    $facebook       =   strValidation($_POST['facebook'], 'url');
                    $password       =   $_POST['password'] === '' ? '' : sha1($_POST['password']);
                    $isadmin        =   strValidation($_POST['isadmin'], 'int');

                    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
                    $stmt->execute([$email]);
                    $all = $stmt->fetch();

                     /*Start Check the Fileds */
                     $formError = array();

                     if($all > 0){
                         $formError[] = "This Email Aready Taken";
                     }
                     if(empty($name)){
                         $formError[] = "Name Filed Can't be Empty";
                     }
                     if(empty($email)){
                         $formError[] = "email Filed Can't be Empty";
                     }
                     if(empty($phone)){
                         $formError[] = "phone Filed Can't be Empty";
                     }
                     if(empty($address)){
                         $formError[] = "address Filed Can't be Empty";
                     }
                     if(empty($facebook)){
                         $formError[] = "facebook Filed Can't be Empty";
                     }
                     if(empty($password)){
                         $formError[] = "password Filed Can't be Empty";
                     }
                     // inasert the data if there are not errors
                     if (empty($formError)) {
                        // Insert Into database
                       $stmt= $conn->prepare("INSERT INTO users(name, email, phone, address, facebook, password, isadmin) VALUES(:name, :email, :phone, :address, :facebook, :password, :isadmin)");
                       $stmt->execute(array(
                           'name' 		=> $name,
                           'email' 	=> $email,
                           'phone' 	=> $phone,
                           'address' 	=> $address,
                           'facebook' 	=> $facebook,
                           'password' 	=> $password,
                           'isadmin' 	=> $isadmin
                       ));
                       $theMsg = 'The User Added Successfully';
                     }
                }

            ?>

            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Members
                        </div>
                    </div>
                    <div class="panel-body">

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
                        <!-- `id`, `name`, `email`, `phone`, `address`, `facebook`, `password`, `isadmin` -->
                        <form class="form-horizontal" role="form" action="members.php?do=Add" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">phone</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone" class="form-control" placeholder="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" placeholder="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="col-sm-2 control-label">facebook</label>
                                <div class="col-sm-10">
                                    <input type="url" name="facebook" class="form-control" placeholder="facebook">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password Field</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="isadmin">
                                        <option value="0" selected>User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addMember">Add Member</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php
            if ($do == 'Edit'):
               // get the user id

               $userId = isset($_GET['memberId']) && is_numeric($_GET['memberId']) ? intval($_GET['memberId']) : 0;

               if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editMember'])) {
                  // set the values in variables

                  $name           =   strValidation($_POST['name']);
                  $email          =   strValidation($_POST['email'], 'email');
                  $phone          =   strValidation($_POST['phone'], 'int');
                  $address        =   strValidation($_POST['address']);
                  $facebook       =   strValidation($_POST['facebook'], 'url');
                  $password       =   $_POST['newPassword'] === '' ? $_POST['oldPassowrd'] : sha1($_POST['newPassword']);
                  $isadmin        =   strValidation($_POST['isadmin'], 'int');

                   /*Start Check the Fileds */
                   $formError = array();
                   if(empty($name)){
                       $formError[] = "Name Filed Can't be Empty";
                   }
                   if(empty($email)){
                       $formError[] = "email Filed Can't be Empty";
                   }
                   if(empty($phone)){
                       $formError[] = "phone Filed Can't be Empty";
                   }
                   if(empty($address)){
                       $formError[] = "address Filed Can't be Empty";
                   }
                   if(empty($facebook)){
                       $formError[] = "facebook Filed Can't be Empty";
                   }
                   if(empty($password)){
                       $formError[] = "password Filed Can't be Empty";
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
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">

                           <?php if (!isset($invalidUserInfo)): ?>
                              Edit Information For The Member <?php echo $userInfo['name'];?>
                           <?php endif; ?>

                        </div>
                    </div>
                    <div class="panel-body">

                        <?php if (isset($invalidUserInfo)): // appear when the id is incorrect ?>
                            <?php echo alertStatus('error', null, $invalidUserInfo);?>
                        <?php exit(); endif; ?>

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

                        <!-- `id`, `name`, `email`, `phone`, `address`, `facebook`, `password`, `isadmin` -->
                        <form class="form-horizontal" role="form" action="members.php?do=Edit&memberId=<?php echo $userInfo['id'];?>" method="post">
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
                                <label for="password" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="isadmin">
                                        <option value="0" <?php echo  $userInfo['isadmin'] == 0 ? 'selected' : '';?> >User</option>
                                        <option value="1" <?php echo  $userInfo['isadmin'] == 1 ? 'selected' : '';?> >Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="editMember">Edit Member Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
            if ($do == 'Delete'):
               // get the user id

               $userId = isset($_GET['memberId']) && is_numeric($_GET['memberId']) ? intval($_GET['memberId']) : 0;

               // get the user information

               $getUserInfo = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");

               // execute the data

               $getUserInfo->execute([$userId]);

               // Count the rows

               $count = $getUserInfo->rowCount();

               // if there is such id show the form

               if ($count > 0) {
                  // prepare to delete
                  $userDelete = $conn->prepare("DELETE FROM users WHERE id = :id");
                  // pind the parameters
                  $userDelete->bindParam('id', $userId);
                  // execute the query
                  $userDelete->execute();
                  // Successfully message
                  $theMsg = 'the Member Deleted Successfully please Wait 3 seconds To reairect back';
                  header("refresh: 3;url=members.php");
               } else {
                  // error message
                  $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                  header("refresh: 3;url=members.php");
               }?>
               <div class="col-md-10">
                   <div class="content-box-large">
                       <div class="panel-heading">
                           <div class="panel-title">
                               Delete Member
                           </div>
                       </div>
                       <div class="panel-body">

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
                         
                       </div>
                   </div>
               </div>
         <?php endif;?>
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
