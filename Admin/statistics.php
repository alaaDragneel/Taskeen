<?php
    session_start();

    $pageTitle = 'Dshboard';

    if (isset($_SESSION["admin_mail"])) {

        include "init.php";

   $year = date('Y');
   $chartData = showBulldingStatistics();
   $year = '';
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $year = strValidation($_POST['year'], 'int');
      $chartData = showBulldingStatistics($year);
   }
?>
        <div class="page-content">
        	<div class="row">
                <?php
                    include "includes/templates/sidebar.php";
                ?>
    		  <div class="col-md-10">
             <section class="content">
                <div class="row">
                   <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                           <h3 class="box-title">Yearly Bullding Report at Year <?php echo $year;?></h3>


                           <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                 <i class="fa fa-minus"></i>
                              </button>


                              <button class="btn btn-box-tool" data-widget="remove" type="button"><i class="fa fa-times"></i></button>
                           </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                           <div class="row">
                              <div class="col-md-12">
                              <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
                                 <div class="row">
                                    <div class="col-md-3">
                                       <select id="year" style="width: 50%;" name="year">
                                          <?php for ($i= 2017; $i < 2100; $i++):?>
                                          <option value="<?php echo $i?>"><?php echo $i?></option>
                                          <?php endfor?>
                                       </select>
                                       <input type="submit" name="submit" value="Show statistics" class="btn btn-primary btn-xs">
                                    </div>
                                 </div>
                              </form>
                                 <p class="text-center">
                                    <strong>statistics Of Adding Bullding Of the Year <?php echo $year;?></strong>

                                 </p>


                                 <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;">
                                    </canvas>
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
