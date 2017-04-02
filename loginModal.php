<!-- Modal -->
<div id="loginpop" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="row">
            <div class="col-sm-6 login">
               <h4>Login</h4>
               <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" role="form">
                  <div class="form-group">
                     <label class="sr-only" for="exampleInputEmail2">Email address</label>
                     <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                     <label class="sr-only" for="exampleInputPassword2">Password</label>
                     <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password">
                  </div>
                  <button type="submit" name="submit" class="btn btn-success">Sign in</button>
               </form>
            </div>
            <div class="col-sm-6">
               <h4>New User Sign Up</h4>
               <p>Join today and get updated with all the properties deal happening around.</p>
               <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
            </div>

         </div>
      </div>
   </div>
</div>
<!-- /.modal -->
