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
                        Manage sub_area
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT
                                                sub_area.*,
                                                city.name AS CITY_NAME,
                                                city.id AS CITY_ID,
                                                area.name AS AREA_NAME,
                                                area.id AS AREA_ID
                                             FROM
                                                sub_area
                                             INNER JOIN
                                                city
                                             ON
                                               city.id = sub_area.city_id
                                             INNER JOIN
                                                area
                                             ON
                                               area.id = sub_area.area_id
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

                                    <th>area name</th>

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
                                            <td><?php echo $row['AREA_NAME']; ?></td>
                                            <td><?php echo $row['CITY_NAME']; ?></td>
                                            <td>
                                               <a href="sub_area.php?do=Edit&sub_areaId=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
                                               <a href="sub_area.php?do=Delete&sub_areaId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">Add Sub_areas Please</div>
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

               if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addSub_area'])) {

                  // set the values in variables
                  $name  =  strValidation($_POST['name']);
                  $area  =  isset($_POST['area_id']) ? strValidation($_POST['area_id'], 'int') : '';
                  $city  =  strValidation($_POST['city_id'], 'int');
                  $formError = array();
                  if(empty($name)){
                      $formError[] = "Name Filed Can't be Empty";
                  }

                  if(empty($area)){
                      $formError[] = "area Filed Can't be Empty";
                  }

                  if(empty($city)){
                      $formError[] = "city Filed Can't be Empty";
                  }
                  // Insert Into database
                  if (empty($formError)) {
                     $stmt= $conn->prepare("INSERT INTO sub_area(name, area_id, city_id) VALUES(:name, :area, :city)");
                     $stmt->execute(array(
                        'name' 		=> $name,
                        'area'      => $area,
                        'city' 		=> $city,
                     ));
                     $theMsg = 'The Sub_area Added Successfully';
                  }
               }

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Sub_area
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
                        <form class="form-horizontal" role="form" action="sub_area.php?do=Add" method="post">
                           <!-- Sub_area name -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sub_area Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                           <!-- City name -->
                            <div class="form-group">
                                <label for="city_id" class="col-sm-2 control-label">City Name</label>
                                <div class="col-sm-10">
                                    <select name="city_id" class="form-control" id="city">
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
                            <!-- area name -->
                             <div class="form-group" id="area">

                             </div>
                            <!-- submit -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="addSub_area">Add Sub_area</button>
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

             $sub_areaId = isset($_GET['sub_areaId']) && is_numeric($_GET['sub_areaId']) ? intval($_GET['sub_areaId']) : 0;


             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editSub_area'])) {

                 // set the values in variables
                 $name  =  strValidation($_POST['name']);
                 $area  =  isset($_POST['area_id']) ? strValidation($_POST['area_id'], 'int') : '';
                 $city  =  strValidation($_POST['city_id'], 'int');

                 $formError = array();
                 if(empty($name)){
                     $formError[] = "Name Filed Can't be Empty";
                 }

                 if(empty($area)){
                     $formError[] = "area Filed Can't be Empty";
                 }

                 if(empty($city)){
                     $formError[] = "city Filed Can't be Empty";
                 }
                 // Insert Into database
                 if (empty($formError)) {
                     // select to see the unique email
                     $sub_areaInfoSelect = $conn->prepare("SELECT * FROM sub_area WHERE name = ? && id != ?");

                     //execute
                     $sub_areaInfoSelect->execute([$name, $sub_areaId]);

                     // count the data
                     $sub_areasCount = $sub_areaInfoSelect->rowCount();
                     if ($sub_areasCount === 1) {
                        $formError[] = 'This Sub_area Already Added';
                     } else {
                       // Update TO database
                       $sub_areaInfoUpdate = $conn->prepare("UPDATE sub_area SET name = ?, area_id = ?, city_id = ? WHERE id = ?");

                       $sub_areaInfoUpdate->execute([$name, $area, $city, $sub_areaId]);
                       $theMsg = 'The Sub_area Name Updated Successfully';
                     }
                  }
             }

             // get the sub area information

             $getSub_areaInfo = $conn->prepare("SELECT
                                         sub_area.*,
                                         city.name AS CITY_NAME,
                                         city.id AS CITY_ID,
                                         area.name AS AREA_NAME,
                                         area.id AS AREA_ID
                                      FROM
                                         sub_area
                                      INNER JOIN
                                         city
                                      ON
                                        city.id = sub_area.city_id
                                      INNER JOIN
                                         area
                                      ON
                                        area.id = sub_area.area_id
                                      WHERE
                                          sub_area.id = ?
                                      LIMIT 1");

             // execute the data

             $getSub_areaInfo->execute([$sub_areaId]);

             // Count the rows

             $count = $getSub_areaInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {

                 $sub_areaInfo = $getSub_areaInfo->fetch();



             } else{

                 $invalidSub_areaInfo = 'This id is not exesist';
             }

        ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">

                          <?php if (!isset($invalidSub_areaInfo)): ?>
                             Edit Information For The Sub_area <?php echo $sub_areaInfo['name'];?>
                          <?php endif; ?>

                       </div>
                   </div>
                   <div class="panel-body">

                       <?php if (isset($invalidSub_areaInfo)): // appear when the id is incorrect ?>
                           <?php echo alertStatus('error', null, $invalidSub_areaInfo); ?>
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
                       <form class="form-horizontal" role="form" action="sub_area.php?do=Edit&sub_areaId=<?php echo $sub_areaInfo['id'];?>" method="post">
                          <input type="hidden" name="sub_areaId" value="<?php echo $sub_areaInfo['id'];?>">
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">name</label>
                              <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $sub_areaInfo['name'];?>" >
                              </div>
                           </div>
                           <!-- City name -->
                            <div class="form-group">
                                <label for="city_id" class="col-sm-2 control-label">City Name</label>
                                <div class="col-sm-10">
                                    <select name="city_id" class="form-control" id="city">
                                       <?php

                                            $citySelect = $conn->prepare("SELECT * FROM city ORDER BY Name ASC");
                                            $citySelect->execute();
                                            $cityFetch = $citySelect->fetchAll();

                                            foreach($cityFetch as $city):?>

                                                <option
                                                   value="<?php echo $city['id']?>"
                                                   <?php if($sub_areaInfo['city_id'] === $city['id']) {echo 'selected';} ?> >
                                                   <?php echo $city['name']?>
                                                </option>

                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <!-- area name -->
                            <div class="form-group" id="area">
                               <label for="city_id" class="col-sm-2 control-label">area Name</label>
                               <div class="col-sm-10">
                                  <select name="area_id" class="form-control">
                                     <?php

                                     $areaSelect = $conn->prepare("SELECT
                                                                      area.*, city.id AS CITY_ID
                                                                   FROM
                                                                      area
                                                                   INNER JOIN
                                                                      city
                                                                   ON
                                                                      area.city_id = city.id
                                                                   WHERE
                                                                      area.city_id = ?
                                                                   ORDER BY Name ASC");
                                     $areaSelect->execute([$sub_areaInfo['city_id']]);
                                     $areaFetch = $areaSelect->fetchAll();

                                        foreach($areaFetch as $area):?>

                                        <option
                                        value="<?php echo $area['id']?>"
                                        <?php if($sub_areaInfo['area_id'] === $area['id']) {echo 'selected';} ?> >
                                        <?php echo $area['name']?>
                                     </option>

                                  <?php endforeach;?>
                               </select>
                            </div>
                         </div>

                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" name="editSub_area">Edit Sub_area</button>
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

             $sub_areaId = isset($_GET['sub_areaId']) && is_numeric($_GET['sub_areaId']) ? intval($_GET['sub_areaId']) : 0;

             // get the user information

             $getSub_areaInfo = $conn->prepare("SELECT * FROM sub_area WHERE id = ? LIMIT 1");

             // execute the data

             $getSub_areaInfo->execute([$sub_areaId]);

             // Count the rows

             $count = $getSub_areaInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $sub_areaDelete = $conn->prepare("DELETE FROM sub_area WHERE id = :id");
                 // pind the parameters
                 $sub_areaDelete->bindParam('id', $sub_areaId);
                 // execute the query
                 $sub_areaDelete->execute();
                 // Successfully message
                 $theMsg = 'the sub_area Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=sub_area.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=sub_area.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete Sub_area
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
