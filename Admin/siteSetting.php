<?php

    ob_start();
    session_start();

    $pageTitle = 'Settings';

    if (isset($_SESSION["admin_mail"])) {

        include "init.php";

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage'; // Check if the $do is Exixets

        $siteSetting = getAllFrom('*', 'sitesetting', null, null);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

           $formError = array();
           unset($_POST['submit']);
           foreach ($_POST as $key => $value) {
               if (empty($value)) {

                   $formError[] = 'The ' . $key . ' Field Can\'t be Empty';
               }
           }

           if (empty($formError)) {
             foreach ($_POST as $key => $req) {
                $siteSettingUpdate = $conn->prepare("UPDATE sitesetting SET value = ? WHERE nameSetting = ? ");
                $siteSettingUpdate->execute([$req, $key]);
             }

             $theMsg = 'The Setting updated Successfully';
           }

         $siteSetting = getAllFrom('*', 'sitesetting', null, null);
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
                     Manage Site Sitteing
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
                  <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                     <?php foreach ($siteSetting as $site):?>
                     <div class="form-group">
                        <label for="<?php echo $site['nameSetting'] ?>" class="col-sm-2 control-label"><?php echo $site['slug'] ?></label>
                        <div class="col-sm-10">
                           <?php if ($site['type'] == 0):?>
                           <input id="<?php echo $site['nameSetting'] ?>"
                           type="text" class="form-control"
                           name="<?php echo $site['nameSetting'] ?>"
                           value="<?php echo $site['value'] ?>">
                        <?php endif;?>
                        <?php if ($site['type'] == 1): ?>
                           <textarea class="form-control" name="<?php echo $site['nameSetting'] ?>"><?php echo $site['value'] ?></textarea>
                        <?php endif; ?>

                        </div>
                     </div>
                     <?php endforeach;?>

                     <div class="form-group">
                        <div class="col-sm-10">
                           <button type="submit" class="btn btn-primary" name="submit"  style="margin-top: 20px;">
                              <i class="fa fa-btn fa-save"></i>  save the site Setting
                           </button>
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
