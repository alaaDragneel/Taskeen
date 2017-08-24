<?php
   include'init.php';

   $featuredBullding = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'RAND()' , '', 'LIMIT 10');

   $latestBullding = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', 'AND categoury_id = 2', 'price', 'ASC', 'LIMIT 5');

   $latestBulldingSlider = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'price', 'ASC', 'LIMIT 6');
?>
<div class="">
	<div class="sl-slider-wrapper" id="slider">
		<div class="sl-slider"> <!-- 1339 500-->
         <?php foreach ($latestBulldingSlider as $bu): ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice1-scale="2" data-slice2-rotation="-25" data-slice2-scale="2">
               <div class="sl-slide-inner">
                  <div class="bg-img" style="background-image: url(<?php echo $bu['image']?>); background-size: 77.3% 57%;"></div>
                  <h2><a href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo $bu['title'] ?>" style="line-height: 1;"><?php echo $bu['num_rooms'];?> Bed Rooms and <?php echo $bu['num_kit'];?> Property <br/> on Sale</a></h2>
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

   <div class="banner-search">
       <div class="container">
           <!-- banner -->
           <h3>Buy, Sale & Rent</h3>
           <div class="searchbar">
               <div class="row">
                   <div class="col-lg-6 col-sm-6">
                       <div class="search-form">
       					<form action="search.php" method="get">
       						<div class="row">
       							<div class="col-lg-6">
       								<input class="form-control" type="number" name="price_from" value="" placeholder="Price From">
       							</div>
       							<div class="col-lg-6">
       								<input class="form-control" type="number" name="price_to" value="" placeholder="Price To">
       							</div>
       							<div class="col-lg-12 marginSelect">
       								<select class="form-control" name="type">
       									<option value="">Select Type</option>
       									<option value="0">Flat</option>
       									<option value="1">Villa</option>
       									<option value="2">Shops</option>
       									<option value="3">Lands</option>
       									<option value="4">Chalet</option>
       									<option value="5">Buldings</option>
       								</select>
       							</div>
       						</div>
       						<button type="submit" class="btn btn-primary">Find Now</button>
       					</form>
       				</div>
                   </div>
                   <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                       <p>Join now and get updated with all the properties deals Join now and get updated with all the properties deals Join now and get updated with all the properties deals Join now and get updated with all the properties deals Join now and get updated with all the properties deals .</p>
                   </div>
               </div>
           </div>
       </div>
       <!-- banner -->

</div>

<!-- Login Modal -->
<?php require_once "loginModal.php"; ?>
<!-- Login Modal -->
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

               <h4><a href="property-detail.php?bu_id=<?php echo $value['id'] ?>&view=<?php echo $value['title'] ?>"><?php echo $value['title']?></a></h4>

               <p class="price">Price: $<?php echo $value['price']?></p>

               <div class="listing-detail">
                  <span data-original-title="Rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_rooms']?></span>
                  <span data-original-title="Path rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_pr']?></span>
                  <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip"><?php echo $value['num_kit']?></span>
               </div>

               <a class="btn btn-primary" href="property-detail.php?bu_id=<?php echo $value['id'] ?>&view=<?php echo $value['title'] ?>">View Details</a>
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




                  <?php $i = 0; ?>
                  <?php foreach ($latestBullding as $bu): ?>

                     <div class="item <?php echo  $i == 0 ? 'active' : '' ?>">
                        <div class="row">
                           <div class="col-lg-4">
                              <img alt="<?php echo $bu['title']?>" class="img-responsive" src="<?php echo $bu['image']?>" style="width: 132px; height: 75px;">
                           </div>
                           <div class="col-lg-8">
                              <h5><a href="property-detail.php"><?php echo $bu['title']?></a></h5>
                              <p class="price">$<?php echo $bu['price']?></p><a class="more" href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo $bu['title'] ?>">More Detail</a>
                           </div>
                        </div>
                     </div>
                     <?php $i++ ?>
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
