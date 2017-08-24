<?php include'init.php';

	if (isset($_GET['cat_id'])) {
		$catid = 'WHERE categoury_id = '.intval($_GET['cat_id']);
		$approved = ' AND ';
	}else {
		$catid = null;
		$approved = ' WHERE ';
	}

	if (isset($_GET['sub_cat_id']) && isset($_GET['cat_id'])) {
		$subcatid = 'And subcategoury_id = '.intval($_GET['sub_cat_id']);
	}else {
		$subcatid = null;
	}


?>
<div class="inside-banner">
	<div class="container">
		<span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
		<h2>Buy, Sale & Rent</h2>
	</div>
</div><!-- banner -->
<div class="container">
	<div class="properties-listing spacer">
		<div class="row">
			<div class="col-lg-3 col-sm-4">
				<?php if (isset($_GET['cat_id'])): ?>
					<div class="hot-properties hidden-xs">
						<h4>SubCategouries</h4>
						<?php
						$scats = getAllFrom('*', 'sub_categouries',  'WHERE categoury_id='.$_GET['cat_id'],  null, 'id', 'DESC', null);
						foreach ($scats as $scat): ?>
						<div class="row">
							<div class="col-lg-12 col-sm-12">
								<h5><a href="buysalerent.php?cat_id=<?php echo $_GET['cat_id'] ?>&sub_cat_id=<?php echo $scat['id'] ?>"><?php echo $scat['name'] ?></a></h5>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<div class="search-form">
					<!-- // `id`, `title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`, `type`, `city_id`,
					//  `area_id`, `subarea_id`, `user_id`, `categoury_id`,
					//  `subcategoury_id`, `image`, `month`, `year`, `isApproved`, `created_at`, `updated_at` -->
					<h4>
						<span class="glyphicon glyphicon-search"></span> Search for
					</h4>
					<form action="search.php" method="get">
						<div class="row">
							<div class="col-lg-6">
								<input class="form-control" type="number" name="price_from" value="" placeholder="Price From">
							</div>
							<div class="col-lg-6">
								<input class="form-control" type="number" name="price_to" value="" placeholder="Price To">
							</div>
							<div class="col-lg-12 marginSelect">
								<select name="city_id" class="form-control" id="city_id">
									<option value="">Select City</option>
									<?php
									$cities = getAllFrom('*', 'city', null, null, 'id', 'ASC', null);
									?>
									<?php foreach ($cities as $city): ?>
										<option value="<?php echo $city['id'] ?>"><?php echo $city['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-lg-12 hidden marginSelect" id="area_id_cont"></div>
							<div class="col-lg-12 hidden marginSelect" id="sub_area_id_cont"></div>
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
							<div class="col-lg-12 marginSelect">
								<select class="form-control" name="status">
									<option value="">Select status</option>
									<option value="1">Rent</option>
									<option value="2">Sell</option>
								</select>
							</div>
							<div class="col-lg-12">
								<input class="form-control" type="number" name="num_pr" value="" placeholder="Number Of Pathrooms">
							</div>
							<div class="col-lg-12">
								<input class="form-control" type="number" name="num_kit" value="" placeholder="Number Of Kitchens">
							</div>
							<div class="col-lg-12">
								<input class="form-control" type="number" name="num_rooms" value="" placeholder="Number Of Romms">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Find Now</button>
					</form>
				</div>

				<div class="hot-properties hidden-xs">
					<h4>Hot Properties</h4>
					<?php
					$suggested = getAllFrom('*', 'buldings', 'WHERE isApproved = 1', null, 'id', 'DESC', 'LIMIT 5');

					foreach ($suggested as $bu): ?>
					<div class="row">
						<div class="col-lg-4 col-sm-5"><img alt="properties" class="img-responsive img-circle" src="<?php echo $bu['image'] ?>"></div>
						<div class="col-lg-8 col-sm-7">
							<h5><a href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo $bu['title'] ?>"><?php echo $bu['title'] ?> Has <?php echo $bu['num_rooms'] ?> Rooms, <?php echo $bu['num_kit'] ?> Kitchens</a></h5>
							<p class="price">$<?php echo $bu['price'] ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-9 col-sm-8">
				<div class="row">
					<?php

					$bus = getAllApproved('*', 'buldings', $catid, $subcatid, $approved.'isApproved = 1','title', 'DESC', null);

					?>
					<?php foreach ($bus as $bu):  ?>
						<!-- properties -->
						<div class="col-lg-4 col-sm-6">
							<div class="properties">
								<div class="image-holder">
									<img alt="properties" class="img-responsive img-thumbnail" style="height: 200px;" src="<?php echo $bu['image'] ?>">
                           <!-- status -->
                           <div class="status <?php echo $bu['status'] == 1 ? 'sold' : 'new'?>">
                              <?php echo $bu['status'] == 1 ? 'Rent' : 'Sell'?>
                           </div>
                           <!-- status -->

								</div>
								<h4><a href="property-detail.php"><?php echo $bu['title'] ?></a></h4>
								<p class="price">Price: <?php echo $bu['price'] ?> $</p>
								<div class="listing-detail">
                           			<span data-original-title="Rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_rooms'] ?></span>
									<span data-original-title="Path Room" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_pr'] ?></span>
									<span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_kit'] ?></span>
								</div><a class="btn btn-primary" href="property-detail.php?bu_id=<?php echo $bu['id'] ?>&view=<?php echo $bu['title'] ?>">View Details</a>
							</div>
						</div><!-- properties -->
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php if (!isset($_SESSION['user_mail'])): ?>
	<!-- Login Modal -->
	<?php require_once "loginModal.php"; ?>
	<!-- Login Modal -->
<?php endif; ?>

<?php include'includes/templates/footer.php';?>
