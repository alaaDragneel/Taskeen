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
                                                <a href="#" class="btn btn-info">edit</a>
                                                <a href="#" class="btn btn-danger">delete</a>
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
        
        <!-- add section -->
        <?php if ($do == 'Add'): ?>
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    // set the values in variables
                    $name           =   $_POST['name'];
                    $email          =   $_POST['email'];
                    $phone          =   $_POST['phone'];
                    $address        =   $_POST['address'];
                    $facebook       =   $_POST['facebook'];
                    $password       =   sha1($_POST['password']);
                    $isadmin        =   $_POST['isadmin'];

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

            ?>
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Members
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($theMsg)): ?>
                            <div class="alert alert-success"><?php echo $theMsg; ?></div>
                        <?php endif; ?>
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
                                    <input type="email" name="email"class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">phone</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone"class="form-control" placeholder="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address"class="form-control" placeholder="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="col-sm-2 control-label">facebook</label>
                                <div class="col-sm-10">
                                    <input type="url" name="facebook"class="form-control" placeholder="facebook">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password Field</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password"class="form-control" placeholder="Password">
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
                                    <button type="submit" class="btn btn-primary">Add Member</button>
                                </div>
                            </div>
                        </form>
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
