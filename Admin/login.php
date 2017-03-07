<?php

    
    $pageTitle = 'Login';
    $loginPage = "";
    include "init.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];


        $errors = [];
        if (empty($email)) {
            $errors[] = "Email Feild IS Required";
        }
        if(empty($password)) {
            $errors[] = "password Feild IS Required";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
        if (empty($errors)) {
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? AND isadmin = 1 LIMIT 1");
            $stmt->execute([$email, $password]);
            $row   = $stmt->fetch();
            $count = $stmt->rowCount();
            // if count > 0 means database contains information
            echo $count;
        }
    }
?>
	<div class="page-content container" style="margin-top: 70px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
                        <?php if (isset($errors)): ?>
                            <?php foreach ($errors as $e): ?>
                                <div class="alert alert-danger"><?php echo $e ?></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
			            <div class="content-wrap">
			                <h6>Sign In</h6>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <input class="form-control" name="email" type="email" placeholder="E-mail address">
                                <input class="form-control" name="password" type="password" placeholder="Password">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
<?php
    include "includes/templates/footer.php";
?>