<?php

    ob_start();
    session_start();


    $pageTitle = 'Buldings';

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
                        Manage Buldings
                    </div>
                </div>

                <div class="panel-body">
                  <h4>there  Buldings/s</h4>
                  <hr>
                      <a href="buldings.php?do=Add" class="btn btn-default">Add Buldings</a>
                      <a href="buldings.php?do=Manage&viewType=Tables" class="btn btn-default"><i class="fa fa-table" aria-hidden="true"></i> Tables</a>
                      <a href="buldings.php?do=Manage&viewType=Cards" class="btn btn-default"><i class="fa fa-square-o" aria-hidden="true"></i> Cards</a>
                  <hr>
                  <?php $viewType = isset($_GET['viewType']) ? $_GET['viewType'] : 'Tables'; // Check if the $viewType is Exixets ?>
                  <?php if ($viewType == 'Tables'): ?>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>ID#</th>
                                      <th>Title</th>
                                      <th>DESC</th>
                                      <th>address</th>
                                      <th>price</th>
                                      <th>rooms</th>
                                      <th>actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $bus = getAllFrom('*', 'buldings', null, null, 'id', 'DESC');
                                  ?>
                                  <?php foreach ($bus as $bu): ?>
                                      <tr>
                                          <td><?php echo $bu['id'] ?></td>
                                          <td><?php echo $bu['title'] ?></td>
                                          <td><?php echo $bu['description'] ?></td>
                                          <td><?php echo $bu['address'] ?></td>
                                          <td><?php echo $bu['price'] ?></td>
                                          <td><?php echo $bu['num_rooms'] ?></td>
                                          <td>
                                              <a href="#" class="btn btn-primary">View</a>
                                              <a href="#" class="btn btn-success">Edit</a>
                                              <a href="#" class="btn btn-danger">Delete</a>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                              </tbody>

                          </table>
                      </div>
                  <?php elseif ($viewType == 'Cards'): ?>
                      <hr>
                      <div class="row">
                          <?php
                          $bus = getAllFrom('*', 'buldings', null, null, 'id', 'DESC');
                          ?>
                          <?php foreach ($bus as $key): ?>
                              <div class="col-md-3 col-sm-1">
                                  <div class="card">
                                      <img class="card-img-top img-responsive" src="http://placehold.it/318x180" alt="Card image cap">
                                      <div class="card-block">
                                          <h4 class="card-title"><?php echo $key['title'] ?></h4>
                                          <p class="card-text"><?php echo $key['description'] ?></p>
                                          <a href="#" class="btn btn-primary">View</a>
                                          <a href="#" class="btn btn-success">Edit</a>
                                          <a href="#" class="btn btn-danger">Delete</a>
                                      </div>
                                  </div>
                              </div>
                          <?php endforeach; ?>
                      </div>
                  <?php endif; ?>
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
                $type               =   strValidation($_POST['type'], 'int');
                $city_id            =   strValidation($_POST['city_id'], 'int');
                $area_id            =   strValidation($_POST['area_id'], 'int');
                $subarea_id         =   strValidation($_POST['subarea_id'], 'int');
                $user_id            =   $_SESSION['id'];
                $categoury_id       =   strValidation($_POST['categoury_id'], 'int');
                $subcategoury_id    =   strValidation($_POST['subcategoury_id'], 'int');

                $formError = array();
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {

                        $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
                    }
                }

                if (empty($formError)) {
                    $stmt = $conn->prepare("INSERT INTO `buldings`(`title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`,
                                                                   `type`, `city_id`, `area_id`, `subarea_id`, `user_id`, `categoury_id`, `subcategoury_id`)
                                            VALUES (:title, :des, :address, :price, :num_pr, :num_kit, :num_rooms, :stauts, :type, :city_id, :areaid,
                                                    :said, :userid, :catid, :scatid)");
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

                    ]);
                    $theMsg = 'The Bulding Added Successfully';
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
                        <?php if (isset($theMsg)): ?>
                            <div class="alert alert-success"><?php echo $theMsg ?></div>
                        <?php endif; ?>
                        <?php if (!empty($formError)): ?>
                            <hr>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($formError as $value): ?>
                                        <li><?php echo $value ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <hr>
                        <?php endif; ?>
                        <form class="form-horizontal" role="form" action="buldings.php?do=Add" method="post">
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
                                <label for="num_pr" class="col-sm-2 control-label">num_pr</label>
                                <div class="col-sm-10">
                                    <input type="number" name="num_pr" id="num_pr" class="form-control" placeholder="num_pr">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_kit" class="col-sm-2 control-label">num_kit</label>
                                <div class="col-sm-10">
                                    <input type="number" name="num_kit" id="num_kit" class="form-control" placeholder="num_kit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_rooms" class="col-sm-2 control-label">num_rooms</label>
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
                                        <option value="0" selected>Flat</option>
                                        <option value="1">Villa</option>
                                        <option value="2">Shops</option>
                                        <option value="3">Lands</option>
                                        <option value="4">Chalet</option>
                                        <option value="5">Buldings</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city_id" class="col-sm-2 control-label">city_id</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="city_id" id="city_id_bulding">
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
                                <label for="area_id" class="col-sm-2 control-label">area_id</label>
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
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Bulding</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($do == 'Edit'): ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Edit
                        </div>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($do == 'Delete'): ?>

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
