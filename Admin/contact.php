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
                        Manage Messages
                    </div>
                </div>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM contact ORDER BY id DESC");
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

                                    <th>Name</th>

                                    <th>Email</th>

                                    <th>Phone</th>

                                    <th style="width: 450px;">Message</th>

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
                                            <td><?php echo $row['message']; ?></td>
                                            <td>
                                               <a href="contact.php?do=Delete&messageId=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <div class="alert alert-success">No Messages</div>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

      <?php
           if ($do == 'Delete'):
             // get the user id
             $messageId = isset($_GET['messageId']) && is_numeric($_GET['messageId']) ? intval($_GET['messageId']) : 0;

             // get the user information

             $getMessageInfo = $conn->prepare("SELECT * FROM contact WHERE id = ? LIMIT 1");

             // execute the data

             $getMessageInfo->execute([$messageId]);

             // Count the rows

             $count = $getMessageInfo->rowCount();

             // if there is such id show the form

             if ($count > 0) {
                 // prepare to delete
                 $messageDelete = $conn->prepare("DELETE FROM contact WHERE id = :id");
                 // pind the parameters
                 $messageDelete->bindParam('id', $messageId);
                 // execute the query
                 $messageDelete->execute();
                 // Successfully message
                 $theMsg = 'the Message Deleted Successfully please Wait 3 seconds To reairect back';
                 header("refresh: 3;url=contact.php");
             } else {
                 // error message
                 $formError[] = 'This id is not exist Wait please 3 seconds To reairect back';
                 header("refresh: 3;url=contact.php");
             }?>
             <div class="col-md-10">
                  <div class="content-box-large">
                      <div class="panel-heading">
                          <div class="panel-title">
                              Delete Message
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
