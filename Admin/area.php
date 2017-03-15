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
                        Manage area
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT
                                                area.*,
                                                city.name AS CITY_NAME,
                                                city.id AS CITY_ID
                                             FROM
                                                area
                                             INNER JOIN
                                                city
                                             ON
                                               city.id = area.city_id
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

                                    <th>city name</th>

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
                                               <a href="area.php?do=Edit&areaId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                               <a href="area.php?do=Delete&areaId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">Add Areas Please</div>
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

               if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addArea'])) {

                  // set the values in variables
                  $name  =  strValidation($_POST['name']);
                  $city  =  strValidation($_POST['city_id'], 'int');

                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Name Filed Can't be Empty";
                  }

                  if(empty($city)){
                      $formError[] = "city Filed Can't be Empty";
                  }
                  // Insert Into database
                  if (empty($formError)) {
                     $stmt= $conn->prepare("INSERT INTO area(name, city_id) VALUES(:name, :city)");
                     $stmt->execute(array(
                        'name' 		=> $name,
                        'city' 		=> $city,
                     ));
                     $theMsg = 'The Area Added Successfully';
                  }
               }

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Area
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
                      ?>                        <!-- `id`, `name`, `email`, `phone`, `address`, `facebook`, `password`, `isadmin` -->
                        <form class="form-horizontal" role="form" action="area.php?do=Add" method="post">
                           <!-- Area name -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Area Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                           <!-- City name -->
                            <div class="form-group">
                                <label for="city_id" class="col-sm-2 control-label">City Name</label>
                                <div class="col-sm-10">
                                    <select name="city_id" class="form-control">
                                       <?php

                                          $citySelect = $conn->prepare("SELECT * FROM city ORDER BY Name ASC");
                                          $citySelect->execute();
                                          $cityFetch = $citySelect->fetchAll();
                                          foreach($cityFetch as $city):
                                       ?>
                                             <option value="<?php echo $city['id']?>"><?php echo $city['name']?></option>
                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addArea">Add Area</button>
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

             $areaId = isset($_GET['areaId']) && is_numeric($_GET['areaId']) ? intval($_GET['areaId']) : 0;

             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editArea'])) {
                 // set the values in variables

                 // set the values in variables
                 $name  =  strValidation($_POST['name']);
                 $city  =  strValidation($_POST['city_id'], 'int');

                  /*Start Check the Fileds */
                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Area Name Filed Can't be Empty";
                  }

                  if(empty($city)){
                      $formError[] = "city Filed Can't be Empty";
                  }

                  // update the data if there are not errors
                  if (empty($formError)) {
                     // select to see the unique email
                     $areaInfoSelect = $conn->prepare("SELECT * FROM area WHERE name = ? && id != ?");

                     //execute
                     $areaInfoSelect->execute([$name, $areaId]);

                     // count the data
                     $areasCount = $areaInfoSelect->rowCount();
                     if ($areasCount === 1) {
                        $formError[] = 'This Area Already Added';
                     } else {
                       // Update TO database
                       $areaInfoUpdate = $conn->prepare("UPDATE area SET name = ?, city_id = ? WHERE id = ?");

                       $areaInfoUpdate->execute([$name, $city, $areaId]);
                       $theMsg = 'The Area Name Updated Successfully';
                     }
                  }
             }

             // get the user information

             $getAreaInfo = $conn->prepare("SELECT
                                         area.*,
                                         city.name AS CITY_NAME,
                                         city.id AS CITY_ID
                                      FROM
                                         area
                                      INNER JOIN
                                         city
                                      ON
                                        city.id = area.city_id
                                      WHERE
                                          area.id = ?
                                      LIMIT 1");

             // execute the data

             $getAreaInfo->execute([$areaId]);

             // Count the rows

             $count = $getAreaInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {

                 $areaInfo = $getAreaInfo->fetch();



             } else{

                 $invalidAreaInfo = 'This id is not exesist';
             }

        ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">

                          <?php if (!isset($invalidAreaInfo)): ?>
                             Edit Information For The Area <?php echo $areaInfo['name'];?>
                          <?php endif; ?>

                       </div>
                   </div>
                   <div class="panel-body">

                       <?php if (isset($invalidAreaInfo)): // appear when the id is incorrect ?>
                           <?php echo alertStatus('error', null, $invalidAreaInfo);?>
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
                       <form class="form-horizontal" role="form" action="area.php?do=Edit&areaId=<?php echo $areaInfo['id'];?>" method="post">
                          <input type="hidden" name="areaId" value="<?php echo $areaInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $areaInfo['name'];?>" >
                              </div>
                           </div>
                           <!-- City name -->
                            <div class="form-group">
                                <label for="city_id" class="col-sm-2 control-label">City Name</label>
                                <div class="col-sm-10">
                                    <select name="city_id" class="form-control">
                                       <?php

                                            $citySelect = $conn->prepare("SELECT * FROM city ORDER BY Name ASC");
                                            $citySelect->execute();
                                            $cityFetch = $citySelect->fetchAll();

                                            foreach($cityFetch as $city):?>

                                                <option
                                                   value="<?php echo $city['id']?>"
                                                   <?php if($areaInfo['city_id'] === $city['id']) {echo 'selected';} ?> >
                                                   <?php echo $city['name']?>
                                                </option>

                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" name="editArea">Edit Area</button>
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

             $areaId = isset($_GET['areaId']) && is_numeric($_GET['areaId']) ? intval($_GET['areaId']) : 0;

             // get the user information

             $getAreaInfo = $conn->prepare("SELECT * FROM area WHERE id = ? LIMIT 1");

             // execute the data

             $getAreaInfo->execute([$areaId]);

             // Count the rows

             $count = $getAreaInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $areaDelete = $conn->prepare("DELETE FROM area WHERE id = :id");
                 // pind the parameters
                 $areaDelete->bindParam('id', $areaId);
                 // execute the query
                 $areaDelete->execute();
                 // Successfully message
                 $theMsg = 'the area Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=area.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=area.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete Area
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
