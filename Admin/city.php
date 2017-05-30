<?php

    ob_start();
    session_start();


    $pageTitle = 'City';

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
                    $stmt = $conn->prepare("SELECT * FROM city ORDER BY id DESC");
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
                                               <a href="city.php?do=Edit&cityId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                               <a href="city.php?do=Delete&cityId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
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

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCity'])) {

                    // set the values in variables
                    $name  =  strValidation($_POST['name']);

                    $formError = array();
                    if(empty($name)){
                        $formError[] = "Name Filed Can't be Empty";
                    }

                    // Insert Into database
                    if (empty($formError)) {
                       $stmt= $conn->prepare("INSERT INTO city(name) VALUES(:name)");
                       $stmt->execute(array(
                           'name' 		=> $name,
                       ));
                       $theMsg = 'The City Added Successfully';
                     }
                }

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add City
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
                        <form class="form-horizontal" role="form" action="city.php?do=Add" method="post">
                           <!-- City name -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">City Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addCity">Add City</button>
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

             $cityId = isset($_GET['cityId']) && is_numeric($_GET['cityId']) ? intval($_GET['cityId']) : 0;

             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editCity'])) {
                 // set the values in variables

                 $name =   strValidation($_POST['name']);

                  /*Start Check the Fileds */
                  $formError = array();
                  if(empty($name)){
                      $formError[] = "City Name Filed Can't be Empty";
                  }
                  // update the data if there are not errors
                  if (empty($formError)) {
                     // select to see the unique email
                     $cityInfoSelect = $conn->prepare("SELECT id, name FROM city WHERE name = ? && id != ?");

                     //execute
                     $cityInfoSelect->execute([$name, $cityId]);

                     // count the data
                     $citysCount = $cityInfoSelect->rowCount();
                     if ($citysCount === 1) {
                        $formError[] = 'This City Already Added';
                     } else {
                       // Update TO database
                       $cityInfoUpdate = $conn->prepare("UPDATE city SET name = ? WHERE id = ?");

                       $cityInfoUpdate->execute([$name, $cityId]);
                       $theMsg = 'The City Name Updated Successfully';
                     }
                  }
             }

             // get the user information

             $getCityInfo = $conn->prepare("SELECT * FROM city WHERE id = ? LIMIT 1");

             // execute the data

             $getCityInfo->execute([$cityId]);

             // Count the rows

             $count = $getCityInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {

                 $cityInfo = $getCityInfo->fetch();

             } else{

                 $invalidCityInfo = 'This id is not exesist';
             }

        ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">

                          <?php if (!isset($invalidCityInfo)): ?>
                             Edit Information For The City <?php echo $cityInfo['name'];?>
                          <?php endif; ?>

                       </div>
                   </div>
                   <div class="panel-body">

                       <?php if (isset($invalidCityInfo)): // appear when the id is incorrect ?>
                           <?php echo alertStatus('error', null, $invalidCityInfo);?>
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
                       <form class="form-horizontal" role="form" action="city.php?do=Edit&cityId=<?php echo $cityInfo['id'];?>" method="post">
                          <input type="hidden" name="cityId" value="<?php echo $cityInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $cityInfo['name'];?>" >
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" name="editCity">Edit City Name</button>
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

             $cityId = isset($_GET['cityId']) && is_numeric($_GET['cityId']) ? intval($_GET['cityId']) : 0;

             // get the user information

             $getCityInfo = $conn->prepare("SELECT * FROM city WHERE id = ? LIMIT 1");

             // execute the data

             $getCityInfo->execute([$cityId]);

             // Count the rows

             $count = $getCityInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $cityDelete = $conn->prepare("DELETE FROM city WHERE id = :id");
                 // pind the parameters
                 $cityDelete->bindParam('id', $cityId);
                 // execute the query
                 $cityDelete->execute();
                 // Successfully message
                 $theMsg = 'the city Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=city.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=city.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete City
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
