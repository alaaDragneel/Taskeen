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
                        Manage sub_categouries
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT
                                                sub_categouries.*,
                                                categouries.name AS CITY_NAME,
                                                categouries.id AS CITY_ID
                                             FROM
                                                sub_categouries
                                             INNER JOIN
                                                categouries
                                             ON
                                               categouries.id = sub_categouries.categoury_id
                                             ORDER BY
                                                id
                                             DESC");
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

                                    <th>categouries name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php if ($count > 0): ?>
                                    <?php foreach ($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['CITY_NAME']; ?></td>
                                            <td>
                                               <a href="sub_categouries.php?do=Edit&sub_categouriesId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                               <a href="sub_categouries.php?do=Delete&sub_categouriesId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">Add Sub_categouriess Please</div>
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

               if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addSub_categouries'])) {

                  // set the values in variables
                  $name  =  strValidation($_POST['name']);
                  $categouries  =  strValidation($_POST['categoury_id'], 'int');

                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Name Filed Can't be Empty";
                  }

                  if(empty($categouries)){
                      $formError[] = "categouries Filed Can't be Empty";
                  }
                  // Insert Into database
                  if (empty($formError)) {
                     $stmt= $conn->prepare("INSERT INTO sub_categouries(name, categoury_id) VALUES(:name, :categouries)");
                     $stmt->execute(array(
                        'name' 		=> $name,
                        'categouries' 		=> $categouries,
                     ));
                     $theMsg = 'The Sub_categouries Added Successfully';
                  }
               }

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Sub_categouries
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
                        <form class="form-horizontal" role="form" action="sub_categouries.php?do=Add" method="post">
                           <!-- Sub_categouries name -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sub_categouries Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                           <!-- Categouries name -->
                            <div class="form-group">
                                <label for="categoury_id" class="col-sm-2 control-label">Categouries Name</label>
                                <div class="col-sm-10">
                                    <select name="categoury_id" class="form-control">
                                       <?php

                                          $categouriesSelect = $conn->prepare("SELECT * FROM categouries ORDER BY Name ASC");
                                          $categouriesSelect->execute();
                                          $categouriesFetch = $categouriesSelect->fetchAll();
                                          foreach($categouriesFetch as $categouries):
                                       ?>
                                             <option value="<?php echo $categouries['id']?>"><?php echo $categouries['name']?></option>
                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addSub_categouries">Add Sub_categouries</button>
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

             $sub_categouriesId = isset($_GET['sub_categouriesId']) && is_numeric($_GET['sub_categouriesId']) ? intval($_GET['sub_categouriesId']) : 0;

             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editSub_categouries'])) {
                 // set the values in variables

                 // set the values in variables
                 $name  =  strValidation($_POST['name']);
                 $categouries  =  strValidation($_POST['categoury_id'], 'int');

                  /*Start Check the Fileds */
                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Sub_categouries Name Filed Can't be Empty";
                  }

                  if(empty($categouries)){
                      $formError[] = "categouries Filed Can't be Empty";
                  }

                  // update the data if there are not errors
                  if (empty($formError)) {
                     // select to see the unique email
                     $sub_categouriesInfoSelect = $conn->prepare("SELECT * FROM sub_categouries WHERE name = ? && id != ?");

                     //execute
                     $sub_categouriesInfoSelect->execute([$name, $sub_categouriesId]);

                     // count the data
                     $sub_categouriessCount = $sub_categouriesInfoSelect->rowCount();
                     if ($sub_categouriessCount === 1) {
                        $formError[] = 'This Sub_categouries Already Added';
                     } else {
                       // Update TO database
                       $sub_categouriesInfoUpdate = $conn->prepare("UPDATE sub_categouries SET name = ?, categoury_id = ? WHERE id = ?");

                       $sub_categouriesInfoUpdate->execute([$name, $categouries, $sub_categouriesId]);
                       $theMsg = 'The Sub_categouries Name Updated Successfully';
                     }
                  }
             }

             // get the user information

             $getSub_categouriesInfo = $conn->prepare("SELECT
                                         sub_categouries.*,
                                         categouries.name AS CITY_NAME,
                                         categouries.id AS CITY_ID
                                      FROM
                                         sub_categouries
                                      INNER JOIN
                                         categouries
                                      ON
                                        categouries.id = sub_categouries.categoury_id
                                      WHERE
                                          sub_categouries.id = ?
                                      LIMIT 1");

             // execute the data

             $getSub_categouriesInfo->execute([$sub_categouriesId]);

             // Count the rows

             $count = $getSub_categouriesInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {

                 $sub_categouriesInfo = $getSub_categouriesInfo->fetch();



             } else{

                 $invalidSub_categouriesInfo = 'This id is not exesist';
             }

        ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">

                          <?php if (!isset($invalidSub_categouriesInfo)): ?>
                             Edit Information For The Sub_categouries <?php echo $sub_categouriesInfo['name'];?>
                          <?php endif; ?>

                       </div>
                   </div>
                   <div class="panel-body">

                       <?php if (isset($invalidSub_categouriesInfo)): // appear when the id is incorrect ?>
                           <?php echo alertStatus('error', null, $invalidSub_categouriesInfo); ?></div>
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
                       <form class="form-horizontal" role="form" action="sub_categouries.php?do=Edit&sub_categouriesId=<?php echo $sub_categouriesInfo['id'];?>" method="post">
                          <input type="hidden" name="sub_categouriesId" value="<?php echo $sub_categouriesInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $sub_categouriesInfo['name'];?>" >
                              </div>
                           </div>
                           <!-- Categouries name -->
                            <div class="form-group">
                                <label for="categoury_id" class="col-sm-2 control-label">Categouries Name</label>
                                <div class="col-sm-10">
                                    <select name="categoury_id" class="form-control">
                                       <?php

                                            $categouriesSelect = $conn->prepare("SELECT * FROM categouries ORDER BY Name ASC");
                                            $categouriesSelect->execute();
                                            $categouriesFetch = $categouriesSelect->fetchAll();

                                            foreach($categouriesFetch as $categouries):?>

                                                <option
                                                   value="<?php echo $categouries['id']?>"
                                                   <?php if($sub_categouriesInfo['categoury_id'] === $categouries['id']) {echo 'selected';} ?> >
                                                   <?php echo $categouries['name']?>
                                                </option>

                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" name="editSub_categouries">Edit Sub_categouries</button>
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

             $sub_categouriesId = isset($_GET['sub_categouriesId']) && is_numeric($_GET['sub_categouriesId']) ? intval($_GET['sub_categouriesId']) : 0;

             // get the user information

             $getSub_categouriesInfo = $conn->prepare("SELECT * FROM sub_categouries WHERE id = ? LIMIT 1");

             // execute the data

             $getSub_categouriesInfo->execute([$sub_categouriesId]);

             // Count the rows

             $count = $getSub_categouriesInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $sub_categouriesDelete = $conn->prepare("DELETE FROM sub_categouries WHERE id = :id");
                 // pind the parameters
                 $sub_categouriesDelete->bindParam('id', $sub_categouriesId);
                 // execute the query
                 $sub_categouriesDelete->execute();
                 // Successfully message
                 $theMsg = 'the sub_categouries Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=sub_categouries.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=sub_categouries.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete Sub_categouries
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
