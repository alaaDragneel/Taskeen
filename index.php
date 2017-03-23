<?php
   include'init.php';
   ob_start();
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
      unset($_POST['submit']);
      $email         = strValidation($_POST['email'], 'email');
      $password      = strValidation($_POST['password']);
      $hashedpass    = sha1($password);
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
         $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
         $stmt->execute([$email, $hashedpass]);
         $row   = $stmt->fetch();
         $count = $stmt->rowCount();
         // if count > 0 means database contains information
         if ($count > 0) {
            $_SESSION["user_mail"] = $row['email']; //Register the sission name
            $_SESSION["id"] = $row["id"]; //Register the sission ID
            // echo "<script>window.location.replace('profile.php')</script>";
            /*
            - because the headers Throw errors and To keep the login code above the form Used the javaScript replace Function for redirect
            -- header("Location: profile.php");//Redirect the user to the dashboard
            */
            header("Location: profile.php");//Redirect the user to the dashboard
            exit();
         }
      }
   }

   if(!empty($errors)): // if not he array empty
      echo alertStatus('error', null, $errors);
   endif;
?>
<div class="">
	<div class="sl-slider-wrapper" id="slider">
		<div class="sl-slider">
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice1-scale="2" data-slice2-rotation="-25" data-slice2-scale="2">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-1"></div>
					<h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
						<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>$ 20,000,000</cite>
					</blockquote>
				</div>
			</div>
			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice1-scale="1.5" data-slice2-rotation="-15" data-slice2-scale="1.5">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-2"></div>
					<h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
						<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>$ 20,000,000</cite>
					</blockquote>
				</div>
			</div>
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice1-scale="2" data-slice2-rotation="3" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-3"></div>
					<h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
						<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>$ 20,000,000</cite>
					</blockquote>
				</div>
			</div>
			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice1-scale="2" data-slice2-rotation="25" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-4"></div>
					<h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
						<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>$ 20,000,000</cite>
					</blockquote>
				</div>
			</div>
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice1-scale="2" data-slice2-rotation="10" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-5"></div>
					<h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
						<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>$ 20,000,000</cite>
					</blockquote>
				</div>
			</div>
		</div><!-- /sl-slider -->
		<nav class="nav-dots" id="nav-dots">
			<span class="nav-dot-current"></span> <span></span> <span></span> <span></span> <span></span>
		</nav>
	</div><!-- /slider-wrapper -->
</div>
<div class="banner-search">
	<div class="container">
		<!-- banner -->
		<h3>Buy, Sale & Rent</h3>
		<div class="searchbar">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<input class="form-control" placeholder="Search of Properties" type="text">
					<div class="row">
						<div class="col-lg-3 col-sm-3">
							<select class="form-control">
								<option>
									Buy
								</option>
								<option>
									Rent
								</option>
								<option>
									Sale
								</option>
							</select>
						</div>
						<div class="col-lg-3 col-sm-4">
							<select class="form-control">
								<option>
									Price
								</option>
								<option>
									$150,000 - $200,000
								</option>
								<option>
									$200,000 - $250,000
								</option>
								<option>
									$250,000 - $300,000
								</option>
								<option>
									$300,000 - above
								</option>
							</select>
						</div>
						<div class="col-lg-3 col-sm-4">
							<select class="form-control">
								<option>
									Property
								</option>
								<option>
									Apartment
								</option>
								<option>
									Building
								</option>
								<option>
									Office Space
								</option>
							</select>
						</div>
						<div class="col-lg-3 col-sm-4">
							<button class="btn btn-success" onclick="window.location.href='buysalerent.php'">Find Now</button>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-lg-offset-1 col-sm-6">
               <?php if(isset($_SESSION["user_mail"])):?>
                  <button class="btn btn-info" onclick="window.location.replace('logout.php');">Logout</button>
               <?php else:?>
                  <p>Join now and get updated with all the properties deals.</p><button class="btn btn-info" data-target="#loginpop" data-toggle="modal">Login</button>
               <?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div><!-- banner -->
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
<div class="container">
	<div class="properties-listing spacer">
		<a class="pull-right viewall" href="buysalerent.php">View All Listing</a>
		<h2>Featured Properties</h2>
		<div class="owl-carousel" id="owl-example">
			<div class="properties">
				<div class="image-holder">
					<img alt="properties" class="img-responsive" src="images/properties/1.jpg">
					<div class="status sold">
						Sold
					</div>
				</div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder">
					<img alt="properties" class="img-responsive" src="images/properties/2.jpg">
					<div class="status new">
						New
					</div>
				</div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/3.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/4.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder">
					<img alt="properties" class="img-responsive" src="images/properties/1.jpg">
					<div class="status sold">
						Sold
					</div>
				</div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder">
					<img alt="properties" class="img-responsive" src="images/properties/2.jpg">
					<div class="status sold">
						Sold
					</div>
				</div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder">
					<img alt="properties" class="img-responsive" src="images/properties/3.jpg">
					<div class="status new">
						New
					</div>
				</div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/4.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/1.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/2.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
			<div class="properties">
				<div class="image-holder"><img alt="properties" class="img-responsive" src="images/properties/3.jpg"></div>
				<h4><a href="property-detail.php">Royal Inn</a></h4>
				<p class="price">Price: $234,900</p>
				<div class="listing-detail">
					<span data-original-title="Bed Room" data-placement="bottom" data-toggle="tooltip">5</span> <span data-original-title="Living Room" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Parking" data-placement="bottom" data-toggle="tooltip">2</span> <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip">1</span>
				</div><a class="btn btn-primary" href="property-detail.php">View Details</a>
			</div>
		</div>
	</div>
	<div class="spacer">
		<div class="row">
			<div class="col-lg-6 col-sm-9 recent-view">
				<h3>About Us</h3>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br>
				<a href="about.php">Learn More</a></p>
			</div>
			<div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
				<h3>Recommended Properties</h3>
				<div class="carousel slide" id="myCarousel">
					<ol class="carousel-indicators">
						<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
						<li class="" data-slide-to="1" data-target="#myCarousel"></li>
						<li class="" data-slide-to="2" data-target="#myCarousel"></li>
						<li class="" data-slide-to="3" data-target="#myCarousel"></li>
					</ol><!-- Carousel items -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="row">
								<div class="col-lg-4"><img alt="properties" class="img-responsive" src="images/properties/1.jpg"></div>
								<div class="col-lg-8">
									<h5><a href="property-detail.php">Integer sed porta quam</a></h5>
									<p class="price">$300,000</p><a class="more" href="property-detail.php">More Detail</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-lg-4"><img alt="properties" class="img-responsive" src="images/properties/2.jpg"></div>
								<div class="col-lg-8">
									<h5><a href="property-detail.php">Integer sed porta quam</a></h5>
									<p class="price">$300,000</p><a class="more" href="property-detail.php">More Detail</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-lg-4"><img alt="properties" class="img-responsive" src="images/properties/3.jpg"></div>
								<div class="col-lg-8">
									<h5><a href="property-detail.php">Integer sed porta quam</a></h5>
									<p class="price">$300,000</p><a class="more" href="property-detail.php">More Detail</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-lg-4"><img alt="properties" class="img-responsive" src="images/properties/4.jpg"></div>
								<div class="col-lg-8">
									<h5><a href="property-detail.php">Integer sed porta quam</a></h5>
									<p class="price">$300,000</p><a class="more" href="property-detail.php">More Detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
   include'includes/templates/footer.php';
   ob_end_flush();
?>
