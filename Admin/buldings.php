<?php

    ob_start();
    session_start();

    $pageTitle = 'Buldings';

    if (isset($_SESSION["admin_mail"])) {

        include "init.php";

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage'; // Check if the $do is Exixets


        if ($do == 'changeStatus') {
          $bu_id = isset($_GET['buId']) && is_numeric($_GET['buId']) ? intval($_GET['buId']) : 0;

          $bu = getOneFrom('isApproved', 'buldings', 'WHERE id = '.$bu_id, null, 'id', 'ASC');
          $isApproved = $bu['isApproved'] == 0 ? 1 : 0 ;
          // dd($isApproved);
          $stmt = $conn->prepare("UPDATE `buldings` SET isApproved = ? WHERE id = ?");

          $stmt->execute([$isApproved, $bu_id]);
          header("Location: " . $_SERVER['HTTP_REFERER']);
        }
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
                        Manage Buldings
                    </div>
                </div>

                <div class="panel-body">
                  <h4>there  Buldings/s</h4>
                  <hr>
                      <a href="buldings.php?do=Add" class="btn btn-default">Add Buldings</a>
                      <hr>
                      <div class="row">
                        <?php
                           $bus = getAllFrom('*', 'buldings', null, null, 'id', 'DESC');
                        ?>
                        <ul class="cd-items cd-container">
                           <?php foreach ($bus as $key): ?>
                              <li class="cd-item">
                                 <img src="<?php echo '../' . $key['image'] ?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                 <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                              </li> <!-- cd-item -->
                           <?php endforeach; ?>
                        </ul> <!-- cd-items -->

                        <div class="cd-quick-view">
                           <div class="cd-slider-wrapper">
                              <ul class="cd-slider">
                                 <li><img src="../images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                              </ul> <!-- cd-slider -->
                           </div> <!-- cd-slider-wrapper -->

                           <div class="cd-item-info">
                              <h2 class="title"></h2>
                              <p class="disBox"></p>
                                 <div class="btn-group" role="group" style="margin-left: 10%;">
                                    <a href="#" class="moreBox btn btn-primary">Edit</a>
                                    <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                    <span href="#" class="priceBox btn btn-warning"></span>
                                    <span href="#" class="statusBox btn "></span>
                                    <a href="#" class="btn btn-default changeStatus">publishing/Waiting</a>

                                 </div> <!-- cd-item-action -->
                           </div> <!-- cd-item-info -->
                           <a href="#0" class="cd-close">Close</a>
                        </div> <!-- cd-quick-view -->
                     </div>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($do == 'published'): ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        Manage Approved Buldings
                    </div>
                </div>

                <div class="panel-body">
                  <h4>there  Buldings/s</h4>
                  <hr>
                      <a href="buldings.php?do=Add" class="btn btn-default">Add Buldings</a>
                  <hr>
                     <div class="row">
                       <?php
                           $bus = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'id', 'DESC');
                       ?>
                       <ul class="cd-items cd-container">
                          <?php foreach ($bus as $key): ?>
                             <li class="cd-item">
                                <img src="<?php echo '../' . $key['image'] ?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                             </li> <!-- cd-item -->
                          <?php endforeach; ?>
                       </ul> <!-- cd-items -->

                       <div class="cd-quick-view">
                          <div class="cd-slider-wrapper">
                             <ul class="cd-slider">
                                <li><img src="../images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                             </ul> <!-- cd-slider -->
                          </div> <!-- cd-slider-wrapper -->

                          <div class="cd-item-info">
                             <h2 class="title"></h2>
                             <p class="disBox"></p>
                                <div class="btn-group" role="group" style="margin-left: 10%;">
                                   <a href="#" class="moreBox btn btn-primary">Edit</a>
                                   <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                   <span href="#" class="priceBox btn btn-warning"></span>
                                   <span href="#" class="statusBox btn "></span>
                                   <a href="#" class="btn btn-default changeStatus">publishing/Waiting</a>
                                </div> <!-- cd-item-action -->
                          </div> <!-- cd-item-info -->
                          <a href="#0" class="cd-close">Close</a>
                       </div> <!-- cd-quick-view -->
                    </div>
               </div>
           </div>
       </div>
        <?php endif; ?>
        <?php if ($do == 'waiting'): ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        Manage waiting Buldings
                    </div>
                </div>

                <div class="panel-body">
                  <h4>there  Buldings/s</h4>
                  <hr>
                      <a href="buldings.php?do=Add" class="btn btn-default">Add Buldings</a>
                  <hr>
                     <div class="row">
                       <?php
                           $bus = getAllFrom('*', 'buldings', 'WHERE isApproved = 0', null, 'id', 'DESC');
                       ?>
                       <ul class="cd-items cd-container">
                          <?php foreach ($bus as $key): ?>
                             <li class="cd-item">
                                <img src="<?php echo '../' . $key['image'] ?>" alt="<?php echo $key['title'] ?>" width="257" height="280">
                                <a href="#" class="cd-trigger" data-id="<?php echo $key['id'] ?>" title="Bullding <?php echo $key['title'] ?> Preview">Quick View</a>
                             </li> <!-- cd-item -->
                          <?php endforeach; ?>
                       </ul> <!-- cd-items -->

                       <div class="cd-quick-view">
                          <div class="cd-slider-wrapper">
                             <ul class="cd-slider">
                                <li><img src="../images/bullding_image/avatar/cardAvatar.jpg" class="imgBox" alt="Product 1"></li>
                             </ul> <!-- cd-slider -->
                          </div> <!-- cd-slider-wrapper -->

                          <div class="cd-item-info">
                             <h2 class="title"></h2>
                             <p class="disBox"></p>
                                <div class="btn-group" role="group" style="margin-left: 10%;">
                                   <a href="#" class="moreBox btn btn-primary">Edit</a>
                                   <a href="#" class="deleteBox btn btn-danger">Delete</a>
                                   <span href="#" class="priceBox btn btn-warning"></span>
                                   <span href="#" class="statusBox btn "></span>
                                   <a href="#" class="btn btn-default changeStatus">publishing/Waiting</a>
                                </div> <!-- cd-item-action -->
                          </div> <!-- cd-item-info -->
                          <a href="#0" class="cd-close">Close</a>
                       </div> <!-- cd-quick-view -->
                    </div>
               </div>
           </div>
       </div>
        <?php endif; ?>

        <?php if ($do == 'Add'):

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // `id`, `title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`, `type`, `city_id`, `area_id`,
                // `subarea_id`, `user_id`, `categoury_id`, `subcategoury_id`
                // set the values in variables
                $title              =   strValidation($_POST['title']);
                $description        =   strValidation($_POST['description']);
                $address            =   strValidation($_POST['address']);
                $price              =   strValidation($_POST['price']);
                $num_pr             =   strValidation($_POST['num_pr'], 'int');
                $num_kit            =   strValidation($_POST['num_kit'], 'int');
                $num_rooms          =   strValidation($_POST['num_rooms'], 'int');
                $status             =   strValidation($_POST['status'], 'int');
                $type               =   strValidation($_POST['type']);
                $city_id            =   strValidation($_POST['city_id'], 'int');
                $area_id            =   strValidation($_POST['area_id'], 'int');
                $subarea_id         =   strValidation($_POST['subarea_id'], 'int');
                $user_id            =   $_SESSION['id'];
                $categoury_id       =   strValidation($_POST['categoury_id'], 'int');
                $subcategoury_id    =   strValidation($_POST['subcategoury_id'], 'int');
                $image              =   empty($_FILES['image']['name']) ? avatar() : imageValidation($_FILES['image']);
                $isApproved         =   strValidation($_POST['isApproved'], 'int');


                // for the services
                $requestAll = [
                    'check'                 =>   $_POST['survice_check'],
                    'survice_name'          =>   $_POST['survice_name'],
                    'survice_description'   =>   $_POST['survice_description'],
                ];

                // for the services
                unset($_POST['survice_check']);
                unset($_POST['survice_name']);
                unset($_POST['survice_description']);
                // unset($_POST['isApproved']);



                $formError = array();

                // dd($_POST);

                foreach ($_POST as $key => $value) {
                    if ($value == '') {
                        $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
                    }
                }

                if ($image == false) {
                   $formError[] = 'The image upload faild try another one';
                }

                if (empty($formError)) {
                    $stmt = $conn->prepare("INSERT INTO `buldings`(`title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`, `type`, `city_id`, `area_id`, `subarea_id`, `user_id`, `categoury_id`, `subcategoury_id`, `image`, `month`, `year`, `isApproved`)
                                            VALUES (:title, :des, :address, :price, :num_pr, :num_kit, :num_rooms, :stauts, :type, :city_id, :areaid, :said, :userid, :catid, :scatid, :image, :month, :year, :isApproved)");
                    $stmt->execute([
                        'title'     => $title,
                        'des'       => $description,
                        'address'   => $address,
                        'price'     => $price,
                        'num_pr'    => $num_pr,
                        'num_kit'   => $num_kit,
                        'num_rooms' => $num_rooms,
                        'stauts'    => $status,
                        'type'      => $type,
                        'city_id'   => $city_id,
                        'areaid'    => $area_id,
                        'said'      => $subarea_id,
                        'userid'    => $user_id,
                        'catid'     => $categoury_id,
                        'scatid'    => $subcategoury_id,
                        'image'     => $image,
                        'month'     => date('m'),
                        'year'      => date('Y'),
                        'isApproved' => $isApproved,
                    ]);

                    $buldingid = $conn->lastInsertId();

                    $theMsg = 'The Bulding Added Successfully';

                    for ($i=0; $i < count($requestAll['check']); $i++) {
                      if ($requestAll['survice_name'][$i] != '' && $requestAll['survice_description'][$i] != '') {
                        $stmt = $conn->prepare("INSERT INTO `services` (`name`, `describtion`, `buid`) VALUES (:name, :description, :buid)");
                        $stmt->execute([
                            'name'              => $requestAll['survice_name'][$i],
                            'description'       => $requestAll['survice_description'][$i],
                            'buid'              => $buldingid,
                        ]);
                        $serviceID = $conn->lastInsertId();
                        $stmt = $conn->prepare("INSERT INTO `bu_ser` (`bu_id`, `service_id`) VALUES (:buid, :srid)");
                        $stmt->execute([
                            'buid'       => $buldingid,
                            'srid'       => $serviceID,
                        ]);
                      }
                    }
                }
            }

        ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Add Buldings</h2>
                        </div>
                    </div>
                    <div class="panel-body">
                       <?php
                          if(!empty($formError)): // if not he array empty
                          ?>
                          <div class="alert alert-danger">
                              <ul>
                                  <?php foreach ($formError as $key): ?>
                                      <li><?php echo $key ?></li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>
                          <?php
                          endif;
                       ?>

                          <?php
                          if (isset($theMsg)):
                             echo alertStatus('success', $theMsg);
                          endif;
                          ?>
                        <form class="form-horizontal" role="form" action="buldings.php?do=Add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" class="form-control" placeholder="description" rows="4" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-sm-2 control-label">price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" id="price" class="form-control" placeholder="price">
                                </div>
                            </div>
                            <div class="form-group">
                               <label for="num_pr" class="col-sm-2 control-label">Number Of Pathroom</label>
                               <div class="col-sm-10">
                                   <input type="number" name="num_pr" id="num_pr" class="form-control" placeholder="num_pr">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="num_kit" class="col-sm-2 control-label">Number Of kitchen</label>
                               <div class="col-sm-10">
                                   <input type="number" name="num_kit" id="num_kit" class="form-control" placeholder="num_kit">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="num_rooms" class="col-sm-2 control-label">Number Of Rooms</label>
                               <div class="col-sm-10">
                                   <input type="text" name="num_rooms" id="num_rooms" class="form-control" placeholder="num_rooms">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="status" class="col-sm-2 control-label">status</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="status">
                                       <option value="">Select Status</option>
                                       <option value="1">Rent</option>
                                       <option value="2">Sell</option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="type" class="col-sm-2 control-label">type</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="type">
                                       <option value="">Select Type</option>
                                       <option value="0">Flat</option>
                                       <option value="1">Villa</option>
                                       <option value="2">Shops</option>
                                       <option value="3">Lands</option>
                                       <option value="4">Chalet</option>
                                       <option value="5">Buldings</option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="city_id" class="col-sm-2 control-label">city</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="city_id" id="city_id_bulding">
                                      <option value="">Select City</option>
                                       <?php
                                           $cities = getAllFrom('*', 'city', null, null, 'id', 'ASC');
                                       ?>
                                       <?php foreach ($cities as $city): ?>
                                           <option value="<?php echo $city['id'] ?>"><?php echo $city['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="area_id" class="col-sm-2 control-label">area</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="area_id" id="area_id_bulding">
                                       <option value=""> Select City Frist </option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="subarea_id" class="col-sm-2 control-label">subarea_id</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="subarea_id" id="subarea_id_bulding">
                                       <option value=""> Select Area Frist </option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="categoury_id" class="col-sm-2 control-label">categoury_id</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="categoury_id" id="cat_id_bulding">
                                      <option value="">select categoury</option>
                                       <?php
                                           $cats = getAllFrom('*', 'categouries', null, null, 'id', 'ASC');
                                       ?>
                                       <?php foreach ($cats as $cat): ?>
                                           <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="subcategoury_id" class="col-sm-2 control-label">subcategoury_id</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="subcategoury_id" id="subcat_id_bulding">
                                       <option value=""> Select Categoury Frist </option>
                                   </select>
                               </div>
                           </div>
                            <div class="form-group">
                                <label for="isApproved" class="col-sm-2 control-label">Approve</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="isApproved" id="isApproved">
                                        <option value=""> Select the permision </option>
                                        <option value="0"> unapprove </option>
                                        <option value="1"> published </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">image</label>
                                <div class="col-sm-10">
                                    <input type="file" id="image" class="form-control" name="image">
                                </div>
                            </div>
                            <hr>
                            <h1 style="font-size: 25px;margin-left: 100px;">Bulding Survices</h1>
                            <br>
                            <h1 style="font-size: 15px;margin-left: 100px;color:red;">not required fields</h1>
                            <hr>
                            <a class="btn btn-link" style="margin-left: 100px;" href="#" id="Add_another_service">Add Another Survice</a>
                            <hr>
                            <div class="survices">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">survice name</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="survice_check[]">
                                        <input type="text" name="survice_name[]" class="form-control" placeholder="survice_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">survice description</label>
                                    <div class="col-sm-10">
                                        <textarea name="survice_description[]" maxlength="250" class="form-control textarea" placeholder="description" rows="4" cols="80"></textarea>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Bulding</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($do == 'Edit'):

           $bu_id = isset($_GET['bu_id']) && is_numeric($_GET['bu_id']) ? intval($_GET['bu_id']) : 0;

           $bus = getOneFrom('*', 'buldings', 'WHERE id = '.$bu_id, null, 'id', 'ASC');

           $cities = getAllFrom('*', 'city', null, null, 'id', 'ASC');
           $areas = getAllFrom('area.*, city.id AS CITY_ID', 'area', 'INNER JOIN city ON area.city_id = city.id WHERE area.city_id ='.$bus['city_id'], null, 'name', 'ASC');
           $s_areas = getAllFrom('sub_area.*, area.id AS AREA_ID', 'sub_area', 'INNER JOIN area ON sub_area.area_id = area.id WHERE sub_area.area_id ='.$bus['area_id'], null, 'name', 'ASC');
           $s_cats = getAllFrom('sub_categouries.*, categouries.id AS CAT_ID', 'sub_categouries', 'INNER JOIN categouries ON sub_categouries.categoury_id = categouries.id WHERE sub_categouries.categoury_id ='.$bus['categoury_id'], null, 'name', 'ASC');

           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $busImage = getOneFrom('image', 'buldings', 'WHERE id = '.$bu_id, null, 'id', 'ASC');

               // `id`, `title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`, `type`, `city_id`, `area_id`,
               // `subarea_id`, `user_id`, `categoury_id`, `subcategoury_id`
               // set the values in variables
               $title              =   strValidation($_POST['title']);
               $description        =   strValidation($_POST['description']);
               $address            =   strValidation($_POST['address']);
               $price              =   strValidation($_POST['price']);
               $num_pr             =   strValidation($_POST['num_pr'], 'int');
               $num_kit            =   strValidation($_POST['num_kit'], 'int');
               $num_rooms          =   strValidation($_POST['num_rooms'], 'int');
               $status             =   strValidation($_POST['status'], 'int');
               $type               =   strValidation($_POST['type'], 'int');
               $city_id            =   strValidation($_POST['city_id'], 'int');
               $area_id            =   strValidation($_POST['area_id'], 'int');
               $subarea_id         =   strValidation($_POST['subarea_id'], 'int');
               $categoury_id       =   strValidation($_POST['categoury_id'], 'int');
               $subcategoury_id    =   strValidation($_POST['subcategoury_id'], 'int');
               $image              =   empty($_FILES['image']['name']) ? $busImage['image'] : imageValidation($_FILES['image']);
               $isApproved         =   $_POST['isApproved'];


               // for the services
               $requestAll = [
                   'check'                 =>   $_POST['survice_check'],
                   'survice_name'          =>   $_POST['survice_name'],
                   'survice_description'   =>   $_POST['survice_description'],
               ];

               // for the services
               unset($_POST['survice_check']);
               unset($_POST['survice_name']);
               unset($_POST['survice_description']);


               $formError = array();
               foreach ($_POST as $key => $value) {
                   if (empty($value) && $value != 0) {
                       $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
                   }
               }

               if ($image == false) {
                  $formError[] = 'The image upload faild try another one';
               }
               if (empty($formError)) {
                   $stmt = $conn->prepare("UPDATE `buldings` SET `title`= ?,`description`= ?,`address`= ?,`price`= ?,`num_pr`= ?,`num_kit`= ?, `num_rooms`= ?,`status`= ?,`type`= ?,`city_id`= ?,`area_id`= ?,`subarea_id`= ?,`categoury_id`= ?,`subcategoury_id`= ?, `image` = ?, isApproved = ? WHERE id = ?");

                   $stmt->execute([
                      $title,
                      $description,
                      $address,
                      $price,
                      $num_pr,
                      $num_kit,
                      $num_rooms,
                      $status,
                      $type,
                      $city_id,
                      $area_id,
                      $subarea_id,
                      $categoury_id,
                      $subcategoury_id,
                      $image,
                      $isApproved,
                      $bu_id,
                   ]);

                   for ($i=0; $i < count($requestAll['check']); $i++) {
                       if ($requestAll['check'][$i] != '') {
                           $stmt = $conn->prepare("UPDATE `services` SET `name`= ?,`describtion`= ? WHERE  id = ".$requestAll['check'][$i]);
                           $stmt->execute([
                               $requestAll['survice_name'][$i],
                               $requestAll['survice_description'][$i],
                           ]);
                       }
                       if ($requestAll['check'][$i] == '') {
                           if ($requestAll['survice_name'][$i] != '' && $requestAll['survice_description'][$i] != '') {
                               $stmt = $conn->prepare("INSERT INTO `services` (`name`, `describtion`, `buid`) VALUES (:name, :description, :buid)");
                               $stmt->execute([
                                   'name'              => $requestAll['survice_name'][$i],
                                   'description'       => $requestAll['survice_description'][$i],
                                   'buid'              => $bu_id,
                               ]);
                               $serviceID = $conn->lastInsertId();
                               $stmt = $conn->prepare("INSERT INTO `bu_ser` (`bu_id`, `service_id`) VALUES (:buid, :srid)");
                               $stmt->execute([
                                   'buid'       => $bu_id,
                                   'srid'       => $serviceID,
                               ]);
                           }
                       }
                   }

                   $theMsg = 'Updated Successfully';

                   $bus = getOneFrom('*', 'buldings', 'WHERE id = '.$bu_id, null, 'id', 'ASC');

                   $cities = getAllFrom('*', 'city', null, null, 'id', 'ASC');

                   $areas = getAllFrom('area.*, city.id AS CITY_ID', 'area', 'INNER JOIN city ON area.city_id = city.id WHERE area.city_id ='.$bus['city_id'], null, 'name', 'ASC');

                   $s_areas = getAllFrom('sub_area.*, area.id AS AREA_ID', 'sub_area', 'INNER JOIN area ON sub_area.area_id = area.id WHERE sub_area.area_id ='.$bus['area_id'], null, 'name', 'ASC');

                   $s_cats = getAllFrom('sub_categouries.*, categouries.id AS CAT_ID', 'sub_categouries', 'INNER JOIN categouries ON sub_categouries.categoury_id = categouries.id WHERE sub_categouries.categoury_id ='.$bus['categoury_id'], null, 'name', 'ASC');
               }


           }

      ?>
           <div class="col-md-10">
               <div class="content-box-large">
                   <div class="panel-heading">
                       <div class="panel-title">
                           <h2>Edit Buldings</h2>
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
                        <form class="form-horizontal" role="form" action="buldings.php?do=Edit&bu_id=<?php echo $bus['id'] ?>" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">title</label>
                              <div class="col-sm-10">
                                   <input type="text" name="title" id="title" class="form-control" placeholder="title" value="<?php echo $bus['title'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="description" class="col-sm-2 control-label">description</label>
                              <div class="col-sm-10">
                                   <textarea name="description" id="description" class="form-control" placeholder="description" rows="4" cols="80"><?php echo $bus['description'] ?></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="address" class="col-sm-2 control-label">address</label>
                              <div class="col-sm-10">
                                   <input type="text" name="address" id="address" class="form-control" placeholder="address" value="<?php echo $bus['address'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="price" class="col-sm-2 control-label">price</label>
                              <div class="col-sm-10">
                                   <input type="number" name="price" id="price" class="form-control" placeholder="price" value="<?php echo $bus['price'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="num_pr" class="col-sm-2 control-label">num_pr</label>
                              <div class="col-sm-10">
                                   <input type="number" name="num_pr" id="num_pr" class="form-control" placeholder="num_pr" value="<?php echo $bus['num_pr'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="num_kit" class="col-sm-2 control-label">num_kit</label>
                              <div class="col-sm-10">
                                   <input type="number" name="num_kit" id="num_kit" class="form-control" placeholder="num_kit" value="<?php echo $bus['num_kit'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="num_rooms" class="col-sm-2 control-label">num_rooms</label>
                              <div class="col-sm-10">
                                   <input type="text" name="num_rooms" id="num_rooms" class="form-control" placeholder="num_rooms" value="<?php echo $bus['num_rooms'] ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="status" class="col-sm-2 control-label">status</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="status">
                                       <option value="">Select Status</option>
                                       <option value="1" <?php echo $bus['status'] == 1 ? 'selected' : '' ?>>Rent</option>
                                       <option value="2" <?php echo $bus['status'] == 2 ? 'selected' : '' ?>>Sell</option>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="type" class="col-sm-2 control-label">type</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="type">
                                       <option value="0" <?php echo $bus['type'] == 0 ? 'selected' : '' ?>>Flat</option>
                                       <option value="1" <?php echo $bus['type'] == 1 ? 'selected' : '' ?>>Villa</option>
                                       <option value="2" <?php echo $bus['type'] == 2 ? 'selected' : '' ?>>Shops</option>
                                       <option value="3" <?php echo $bus['type'] == 3 ? 'selected' : '' ?>>Lands</option>
                                       <option value="4" <?php echo $bus['type'] == 4 ? 'selected' : '' ?>>Chalet</option>
                                       <option value="5" <?php echo $bus['type'] == 5 ? 'selected' : '' ?>>Buldings</option>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="city_id" class="col-sm-2 control-label">city_id</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="city_id" id="city_id_bulding">
                                       <?php foreach ($cities as $city): ?>
                                           <option value="<?php echo $city['id'] ?>" <?php echo $bus['city_id'] == $city['id'] ? 'selected' : '' ?>><?php echo $city['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="area_id" class="col-sm-2 control-label">area_id</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="area_id" id="area_id_bulding">
                                       <option value=""> Select City Frist </option>
                                       <?php foreach ($areas as $key): ?>
                                          <option value="<?php echo $key['id'] ?>" <?php echo $bus['area_id'] == $key['id'] ? 'selected' : '' ?>><?php echo $key['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="subarea_id" class="col-sm-2 control-label">subarea_id</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="subarea_id" id="subarea_id_bulding">
                                       <option value=""> Select Area Frist </option>$s_areas
                                       <?php foreach ($s_areas as $key): ?>
                                          <option value="<?php echo $key['id'] ?>" <?php echo $bus['subarea_id'] == $key['id'] ? 'selected' : '' ?>><?php echo $key['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="categoury_id" class="col-sm-2 control-label">categoury_id</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="categoury_id" id="cat_id_bulding">
                                       <?php
                                           $cats = getAllFrom('*', 'categouries', null, null, 'id', 'ASC');
                                       ?>
                                       <?php foreach ($cats as $cat): ?>
                                           <option value="<?php echo $cat['id'] ?>" <?php echo $bus['categoury_id'] == $cat['id'] ? 'selected' : '' ?>><?php echo $cat['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="subcategoury_id" class="col-sm-2 control-label">subcategoury_id</label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="subcategoury_id" id="subcat_id_bulding">
                                       <option value=""> Select Categoury Frist </option>$s_cats
                                       <?php foreach ($s_cats as $key): ?>
                                          <option value="<?php echo $key['id'] ?>" <?php echo $bus['subcategoury_id'] == $key['id'] ? 'selected' : '' ?>><?php echo $key['name'] ?></option>
                                       <?php endforeach; ?>
                                   </select>
                              </div>
                           </div>
                           <div class="form-group">
                               <label for="isApproved" class="col-sm-2 control-label">Approve</label>
                               <div class="col-sm-10">
                                   <select class="form-control" name="isApproved" id="isApproved">
                                       <option> Select the permision </option>
                                       <option value="0" <?php echo $bus['isApproved'] == 0 ? 'selected' : '' ?> > unapprove </option>
                                       <option value="1" <?php echo $bus['isApproved'] == 1 ? 'selected' : '' ?> > published </option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                              <label for="image" class="col-sm-2 control-label">image</label>
                              <div class="col-sm-10">
                                   <input type="file" id="image" class="form-control" name="image">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="image" class="col-sm-2 control-label">image</label>
                              <div class="col-sm-10">
                                   <div class="row">
                                     <div class="col-sm-6">
                                        <div style="padding: 5px; box-shadow: 5px 5px 19px #999;border-radius: 5px;">
                                            <div class="card" style="padding: 2px 4px;">
                                                <img class="card-img-top img-responsive" style="height: 300px; width: 400px;" src="<?php echo '../' . $bus['image'] ?>" alt="<?php echo $bus['title'] ?>">
                                                <div class="card-block">
                                                    <h4 class="card-title"><?php echo $bus['title'] ?></h4>
                                                    <p class="card-text"><?php echo $bus['description'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                     </div>
                                   </div>
                              </div>
                           </div>
                           <hr>
                           <h1 style="font-size: 25px;color:black">Bulding Survices</h1>
                           <a class="btn btn-warning" href="#" id="Add_another_service">Add Another Survice</a>
                           <hr>
                           <?php

                           $stmt = $conn->prepare("SELECT * FROM services WHERE buid = ".$bus['id']);
                           $stmt->execute();
                           $count = $stmt->rowCount();
                           $rows = $stmt->fetchAll();
                           ?>
                           <div class="survices">
                               <?php if ($count > 0): ?>
                                   <?php foreach ($rows as $row): ?>
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">survice name</label>
                                           <div class="col-sm-10">
                                               <input type="hidden" name="survice_check[]" value="<?php echo $row['id'] ?>">
                                               <input type="text" name="survice_name[]" class="form-control" placeholder="survice_name" value="<?php echo $row['name'] ?>">
                                           </div>
                                       </div>
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">survice description</label>
                                           <div class="col-sm-10">
                                               <textarea name="survice_description[]" maxlength="250" class="form-control textarea" placeholder="description" rows="4" cols="80"> <?php echo $row['describtion'] ?></textarea>
                                               <div></div>
                                           </div>
                                       </div>
                                   <?php endforeach; ?>
                               <?php else: ?>
                                   <div class="survices">
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">survice name</label>
                                           <div class="col-sm-10">
                                               <input type="hidden" name="survice_check[]">
                                               <input type="text" name="survice_name[]" class="form-control" placeholder="survice_name">
                                           </div>
                                       </div>
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">survice description</label>
                                           <div class="col-sm-10">
                                               <textarea name="survice_description[]" maxlength="250" class="form-control textarea" placeholder="description" rows="4" cols="80"></textarea>
                                               <div></div>
                                           </div>
                                       </div>
                                   </div>
                               <?php endif; ?>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary">Update Bulding</button>
                              </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
        <?php endif; ?>

        <?php if ($do == 'Delete'):
           $bu_id = isset($_GET['bu_id']) && is_numeric($_GET['bu_id']) ? intval($_GET['bu_id']) : 0;
           $bu_image = getOneFrom('image', 'buldings', 'WHERE id ='.$bu_id);
           $delete = deleteItem('buldings', $bu_id);
         if ($delete == true) {
            $theMsg = "deleted Successfully";
            if ($bu_image['image'] !== avatar()) {
               unlink($bu_image['image']);
            }
         }
         ?>
         <div class="col-md-10">
             <div class="content-box-large">
                 <div class="panel-heading">
                     <div class="panel-title">
                         Delete Buldings
                     </div>
                 </div>

                 <div class="panel-body">
                    <?php
                       if (isset($theMsg)):
                          echo alertStatus('success', $theMsg);
                       endif;
                    ?>
                    <?php RedirectFunc('Succrss Deleted', 'back', 5) ?>
                 </div>
             </div>
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
