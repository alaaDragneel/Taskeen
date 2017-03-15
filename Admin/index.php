<?php
    session_start();

    $pageTitle = 'Dshboard';

    if (isset($_SESSION["admin_mail"])) {

        include "init.php";
        // total users Accept Adimns
        $totalUsers = countItem('id', 'users', 'WHERE isadmin = 0');
        $totalBullding = countItem('id', 'buldings');
        $totalUnApprovedBullding = countItem('id', 'buldings', 'WHERE isApproved = 0');
        $totalApprovedBullding = countItem('id', 'buldings', 'WHERE isApproved = 1');
        $chartData = showBulldingStatistics();
        $resentBulldingView = getAllFrom('*', 'buldings', null, null, 'id', 'DESC', 'LIMIT 5');
        $resentPublishiedBulldingView = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'id', 'DESC', 'LIMIT 5');
        $resentWaitingBulldingView = getAllFrom('*', 'buldings', 'WHERE isApproved = 0', null, 'id', 'DESC', 'LIMIT 5');
?>
        <div class="page-content">
        	<div class="row">
                <?php
                    include "includes/templates/sidebar.php";
                ?>
    		  <div class="col-md-10">
             <section class="content">
               <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                           <span class="info-box-text">Users</span>
                           <span class="info-box-number"><?php echo $totalUsers?></span>

                           <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                           </div>
                           <a href="members.php" style="color: #FFF;" class="progress-description">
                              Show All Users
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fa fa-home"></i></span>

                        <div class="info-box-content">
                           <span class="info-box-text">bulldings</span>
                           <span class="info-box-number"><?php echo $totalBullding;?></span>

                           <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                           </div>
                           <a href="buldings.php" style="color: #FFF;" class="progress-description">
                              Show All bulldings
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-building"></i></span>

                        <div class="info-box-content">
                           <span class="info-box-text">Publish Bulldings</span>
                           <span class="info-box-number"><?php echo $totalApprovedBullding;?></span>

                           <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                           </div>
                           <a href="buldings.php?do=published" style="color: #FFF;" class="progress-description">
                              Show All published
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                        <div class="info-box-content">
                           <span class="info-box-text">Waiting Bullding</span>
                           <span class="info-box-number"><?php echo $totalUnApprovedBullding;?></span>

                           <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                           </div>
                           <a href="buldings.php?do=waiting" style="color: #FFF;" class="progress-description">
                              Show All waiting
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->

               <!-- start the chart -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="box box-info">
                        <div class="box-header with-border">
                           <h3 class="box-title">Yearly Bullding Report In Current Year</h3>


                           <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                 <i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <!-- /.box-header -->


                        <div class="box-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <p class="text-center"><strong>Chart Explain The Added Bullding Per Year</strong>
                                 </p>
                                 <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px; width: 1069px;" height="180" width="1069">
                                    </canvas>
                                    <!-- <canvas id="myChart" width="600" height="180"></canvas> -->
                                 </div>
                                 <!-- /.chart-responsive -->
                              </div>
                              <!-- /.col -->
                           </div>
                           <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>

               <!-- end the chart -->

               <div class="row">
                  <div class="col-md-4">
                     <!-- PRODUCT LIST -->
                     <div class="box box-primary">
                        <div class="box-header with-border">
                           <h3 class="box-title">Recently Added 5 Bullding</h3>


                           <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                 <i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <ul class="products-list product-list-in-box">
                              <?php foreach ($resentBulldingView as $bu): ?>
                                 <li class="item">
                                    <div class="product-img">
                                       <img alt="<?php echo $bu['title']?>" src="<?php echo $bu['image']?>">
                                    </div>

                                    <div class="product-info">
                                       <a class="product-title" href="buldings.php?do=Edit&bu_id=<?php echo $bu['id']?>">
                                          <?php echo $bu['title']?>
                                          <span class="label label-info pull-right">Cost: <?php echo $bu['price']?></span>
                                             <span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success'; ?> pull-right" style="margin-right: 5px;">
                                                <?php echo $bu['isApproved'] == 0 ? 'Waiting' : 'Published';?>
                                             </span>
                                       </a>
                                       <span class="product-description"><?php echo $bu['description']?></span>
                                    </div>
                                 </li>
                                 <!-- /.item -->
                              <?php endforeach; ?>

                           </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                           <a class="uppercase" href="buldings.php">View All bulldings</a>
                        </div>
                        <!-- /.box-footer -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                     <!-- PRODUCT LIST -->
                     <div class="box box-success">
                        <div class="box-header with-border">
                           <h3 class="box-title">Recently Added 5 Published Bullding</h3>


                           <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                 <i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <ul class="products-list product-list-in-box">
                              <?php foreach ($resentPublishiedBulldingView as $bu): ?>
                                 <li class="item">
                                    <div class="product-img">
                                       <img alt="<?php echo $bu['title']?>" src="<?php echo $bu['image']?>">
                                    </div>

                                    <div class="product-info">
                                       <a class="product-title" href="buldings.php?do=Edit&bu_id=<?php echo $bu['id']?>">
                                          <?php echo $bu['title']?>
                                          <span class="label label-info pull-right">Cost: <?php echo $bu['price']?></span>
                                             <span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success'; ?> pull-right" style="margin-right: 5px;">
                                                <?php echo $bu['isApproved'] == 0 ? 'Waiting' : 'Published';?>
                                             </span>
                                       </a>
                                       <span class="product-description"><?php echo $bu['description']?></span>
                                    </div>
                                 </li>
                                 <!-- /.item -->
                              <?php endforeach; ?>

                           </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                           <a class="uppercase" href="buldings.php?do=published">View All published bulldings</a>
                        </div>
                        <!-- /.box-footer -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                     <!-- PRODUCT LIST -->
                     <div class="box box-danger">
                        <div class="box-header with-border">
                           <h3 class="box-title">Recently Added 5 Waiting Bullding</h3>


                           <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                 <i class="fa fa-minus"></i>
                              </button>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <ul class="products-list product-list-in-box">
                              <?php foreach ($resentWaitingBulldingView as $bu): ?>
                                 <li class="item">
                                    <div class="product-img">
                                       <img alt="<?php echo $bu['title']?>" src="<?php echo $bu['image']?>">
                                    </div>

                                    <div class="product-info">
                                       <a class="product-title" href="buldings.php?do=Edit&bu_id=<?php echo $bu['id']?>">
                                          <?php echo $bu['title']?>
                                          <span class="label label-info pull-right">Cost: <?php echo $bu['price']?></span>
                                             <span class="label label-<?php echo $bu['isApproved'] == 0 ? 'danger' : 'success'; ?> pull-right" style="margin-right: 5px;">
                                                <?php echo $bu['isApproved'] == 0 ? 'Waiting' : 'Published';?>
                                             </span>
                                       </a>
                                       <span class="product-description"><?php echo $bu['description']?></span>
                                    </div>
                                 </li>
                                 <!-- /.item -->
                              <?php endforeach; ?>

                           </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                           <a class="uppercase" href="buldings.php?do=waiting">View All waiting bulldings</a>
                        </div>
                        <!-- /.box-footer -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </section>
           </div>
        </div>
     </div>

<?php
      include "includes/templates/footer.php";
    }else {
        header ("Location: login.php");
        exit();
    }
?>
