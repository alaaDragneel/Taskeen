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
        <!-- manage section -->
        <?php if ($do == 'Manage'): ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        Manage Cities
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM categouries ORDER BY id DESC");
                    $stmt->execute();
                    $rows = $stmt->fetchAll();
                    $count = $stmt->rowCount();
                ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID#</th>

                                    <th>name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php if ($count > 0): ?>
                                    <?php foreach ($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                               <a href="categouries.php?do=Edit&categouriesId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                               <a href="categouries.php?do=Delete&categouriesId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">Add cities Please</div>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- add section -->
        <?php if ($do == 'Add'): ?>
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCategouries'])) {

                    // set the values in variables
                    $name  =  strValidation($_POST['name']);

                    $formError = array();
                    if(empty($name)){
                        $formError[] = "Name Filed Can't be Empty";
                    }

                    // Insert Into database
                    if (empty($formError)) {
                       $stmt= $conn->prepare("INSERT INTO categouries(name) VALUES(:name)");
                       $stmt->execute(array(
                           'name' 		=> $name,
                       ));
                       $theMsg = 'The Categouries Added Successfully';
                     }
                }

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Categouries
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
                        <form class="form-horizontal" role="form" action="categouries.php?do=Add" method="post">
                           <!-- Categouries name -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Categouries Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addCategouries">Add Categouries</button>
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

             $categouriesId = isset($_GET['categouriesId']) && is_numeric($_GET['categouriesId']) ? intval($_GET['categouriesId']) : 0;

             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editCategouries'])) {
                 // set the values in variables

                 $name =   strValidation($_POST['name']);

                  /*Start Check the Fileds */
                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Categouries Name Filed Can't be Empty";
                  }
                  // update the data if there are not errors
                  if (empty($formError)) {
                     // select to see the unique email
                     $categouriesInfoSelect = $conn->prepare("SELECT id, name FROM categouries WHERE name = ? && id != ?");

                     //execute
                     $categouriesInfoSelect->execute([$name, $categouriesId]);

                     // count the data
                     $categouriessCount = $categouriesInfoSelect->rowCount();
                     if ($categouriessCount === 1) {
                        $formError[] = 'This Categouries Already Added';
                     } else {
                       // Update TO database
                       $categouriesInfoUpdate = $conn->prepare("UPDATE categouries SET name = ? WHERE id = ?");

                       $categouriesInfoUpdate->execute([$name, $categouriesId]);
                       $theMsg = 'The Categouries Name Updated Successfully';
                     }
                  }
             }

             // get the user information

             $getCategouriesInfo = $conn->prepare("SELECT * FROM categouries WHERE id = ? LIMIT 1");

             // execute the data

             $getCategouriesInfo->execute([$categouriesId]);

             // Count the rows

             $count = $getCategouriesInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {

                 $categouriesInfo = $getCategouriesInfo->fetch();

             } else{

                 $invalidCategouriesInfo = 'This id is not exesist';
             }

        ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">

                          <?php if (!isset($invalidCategouriesInfo)): ?>
                             Edit Information For The Categouries <?php echo $categouriesInfo['name'];?>
                          <?php endif; ?>

                       </div>
                   </div>
                   <div class="panel-body">

                       <?php if (isset($invalidCategouriesInfo)): // appear when the id is incorrect ?>
                           <?php echo alertStatus('error', null, $invalidCategouriesInfo);?>
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
                       <form class="form-horizontal" role="form" action="categouries.php?do=Edit&categouriesId=<?php echo $categouriesInfo['id'];?>" method="post">
                          <input type="hidden" name="categouriesId" value="<?php echo $categouriesInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $categouriesInfo['name'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" name="editCategouries">Edit Categouries Name</button>
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

             $categouriesId = isset($_GET['categouriesId']) && is_numeric($_GET['categouriesId']) ? intval($_GET['categouriesId']) : 0;

             // get the user information

             $getCategouriesInfo = $conn->prepare("SELECT * FROM categouries WHERE id = ? LIMIT 1");

             // execute the data

             $getCategouriesInfo->execute([$categouriesId]);

             // Count the rows

             $count = $getCategouriesInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $categouriesDelete = $conn->prepare("DELETE FROM categouries WHERE id = :id");
                 // pind the parameters
                 $categouriesDelete->bindParam('id', $categouriesId);
                 // execute the query
                 $categouriesDelete->execute();
                 // Successfully message
                 $theMsg = 'the categouries Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=categouries.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=categouries.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete Categouries
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
