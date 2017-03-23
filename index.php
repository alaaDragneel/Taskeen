<?php
   include'init.php';

   $recommendedBullding = getOneFrom('*', 'buldings', 'WHERE isApproved = 1');
   $latestBullding = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'id', 'DESC', 'LIMIT 5');
   $featuredBullding = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'id', 'DESC', 'LIMIT 10');
?>
<div class="">
	<div class="sl-slider-wrapper" id="slider">
		<div class="sl-slider">
         <?php foreach ($latestBullding as $bu): ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice1-scale="2" data-slice2-rotation="-25" data-slice2-scale="2">
               <div class="sl-slide-inner">
                  <div class="bg-img" style="background-image: url(<?php echo $bu['image']?>);"></div>
                  <h2><a href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo sha1($bu['title']) ?>" style="line-height: 1;"><?php echo $bu['num_rooms'];?> Bed Rooms and <?php echo $bu['num_kit'];?> Property <br/> on Sale</a></h2>
                  <blockquote>
                     <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $bu['address'];?></p>
                     <p><?php echo substr($bu['description'], 0, 100).'...';?></p><cite>$ <?php echo $bu['price'];?></cite>
                  </blockquote>
               </div>
            </div>
         <?php endforeach; ?>

		</div>
      <!-- /sl-slider -->
		<nav class="nav-dots" id="nav-dots">
			<span class="nav-dot-current"></span> <span></span> <span></span> <span></span> <span></span>
		</nav>
	</div>
   <!-- /slider-wrapper -->
</div>
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
         <?php foreach ($featuredBullding as $value): ?>
            <div class="properties">
               <div class="image-holder">
                  <img alt="<?php echo $value['title']?>" class="img-responsive" src="<?php echo $value['image']?>" style="width: 200px; height: 130px;">
                  <!-- status -->
                  <div class="status <?php echo $value['status'] == 1 ? 'sold' : 'new'?>">
                     <?php echo $value['status'] == 1 ? 'Rent' : 'Sell'?>
                  </div>
                  <!-- status -->

               </div>

               <h4><a href="property-detail.php"><?php echo $value['title']?></a></h4>

               <p class="price">Price: $<?php echo $value['price']?></p>

               <div class="listing-detail">
                  <span data-original-title="Rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_rooms']?></span>
                  <span data-original-title="Path rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_pr']?></span>
                  <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_kit']?></span>
               </div>

               <a class="btn btn-primary" href="property-detail.php?bu_id=<?php echo $value['id'] ?>&view=<?php echo sha1($value['title']) ?>">View Details</a>
            </div>
         <?php endforeach; ?>

		</div>
	</div>
	<div class="spacer">
		<div class="row">
			<div class="col-lg-6 col-sm-9 recent-view">
				<h3>About Us</h3>
				<p><?php echo substr(getSetting('siteDesc'), 0, 290).'...';?><br>
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
						<li class="" data-slide-to="3" data-target="#myCarousel"></li>
						<li class="" data-slide-to="3" data-target="#myCarousel"></li>
					</ol><!-- Carousel items -->
					<div class="carousel-inner">


                     <div class="item active">
                        <div class="row">
                           <div class="col-lg-4">
                              <img alt="<?php echo $recommendedBullding['title']?>" class="img-responsive" src="<?php echo $recommendedBullding['image']?>" style="width: 132px; height: 75px;">
                           </div>
                           <div class="col-lg-8">
                              <h5><a href="property-detail.php"><?php echo $recommendedBullding['title']?></a></h5>
                              <p class="price">$<?php echo $recommendedBullding['price']?></p><a class="more" href="property-detail.php?bu_id=<?php echo $recommendedBullding['id'] ?>&view=<?php echo sha1($recommendedBullding['title']) ?>">More Detail</a>
                           </div>
                        </div>
                     </div>


                  <?php foreach ($latestBullding as $bu): ?>

                     <div class="item">
                        <div class="row">
                           <div class="col-lg-4">
                              <img alt="<?php echo $bu['title']?>" class="img-responsive" src="<?php echo $bu['image']?>" style="width: 132px; height: 75px;">
                           </div>
                           <div class="col-lg-8">
                              <h5><a href="property-detail.php"><?php echo $bu['title']?></a></h5>
                              <p class="price">$<?php echo $bu['price']?></p><a class="more" href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo sha1($bu['title']) ?>">More Detail</a>
                           </div>
                        </div>
                     </div>

                  <?php endforeach; ?>

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
