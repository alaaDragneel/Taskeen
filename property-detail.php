<?php include'init.php';?>
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Home</a> / Buy</span>
        <h2>Buy</h2>
    </div>
</div>
<!-- banner -->


<?php
// this query is for bulding informations
$bu_id = isset($_GET['bu_id']) && is_numeric($_GET['bu_id']) ? intval($_GET['bu_id']) : 0;
$bu = getOneFrom('*', 'buldings', 'WHERE id = '.$bu_id, 'AND isApproved = 1');
?>

<div class="container">
	<div class="properties-listing spacer">
		<div class="row">
			<div class="col-lg-3 col-sm-4 hidden-xs">
				<div class="hot-properties hidden-xs">
					<h4>Suggested Buldings</h4>
                    <?php
                    $suggestedbus = getAllFrom("*", 'buldings', 'WHERE categoury_id='.$bu['categoury_id'], 'And subcategoury_id='.$bu['subcategoury_id'] . ' AND isApproved = 1', 'created_at', 'DESC', 'LIMIT 10');
                    ?>
                    <?php foreach ($suggestedbus as $key): ?>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"><img alt="properties" class="img-responsive img-circle" src="<?php echo $key['image'] ?>"></div>
                            <div class="col-lg-8 col-sm-7">
                                <h5><a href="property-detail.php?bu_id=<?php echo $key['id'] ?>&view=<?php echo sha1($key['title']) ?>"><?php echo $key['title'] ?></a></h5>
                                <p class="price">$<?php echo $key['price'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
				</div>
			</div>
            <!-- start property -->
            <?php
            $bu_id = isset($_GET['bu_id']) && is_numeric($_GET['bu_id']) ? intval($_GET['bu_id']) : 0;
            $bu = getOneFrom('*', 'buldings', 'WHERE id = '.$bu_id, 'AND isApproved = 1');
            ?>
            <div class="col-lg-9 col-sm-8">
                <h2><?php echo $bu['title'] ?></h2>
                <h3><?php echo 'The ' . $bu['title'] . ' Has ' . $bu['num_kit'] . ' Kitchens, ' . $bu['num_rooms'] . ' Rooms'?></h3>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div style="height: 350px; width: 100%;" >
                                <img style="height: 100%; width: 100%;" class="img-responsive img-rounded img-thumbnail" src="<?php echo $bu['image'] ?>" alt="">
                            </div>
                            <!-- #Slider Ends -->
                        </div>
                        <div class="spacer">
                            <h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                            <p><?php echo $bu['description'] ?></p>
                        </div>

                        <div class="spacer">
                            <h4><span class="glyphicon glyphicon-th-list"></span> Services</h4>
                            <?php
                                $buservices = getAllFrom('*', 'services', 'WHERE buid = '.$bu_id, null, 'id', 'DESC', null);
                            ?>

                                <?php foreach ($buservices as $service): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="background-color: #fff;border-radius: 5px;box-shadow: 4px 5px 8px #ccc;padding: 10px 20px; max-height: 300px;direction: rtl;">
                                                <h4 class="text-center"><?php echo $service['name'] ?></h4>
                                                <hr>
                                                <p><?php echo $service['describtion'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                <?php endforeach; ?>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="property-info">
                                <p class="price">$ <?php echo $bu['price'] ?></p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $bu['address'] ?></p>
                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Agent Details
                                    <?php
                                    $user = getOneFrom('*', 'users', 'WHERE id = '.$bu['user_id'], null)
                                    ?>
                                    <p>
                                        <?php echo $user['name'] ?>
                                        <br>
                                        phone: <?php echo $user['phone'] ?>
                                        <br>
                                        Email: <?php echo $user['email'] ?> <br>
                                        Facebook: <a class="btn-link" href="<?php echo $user['facebook'] ?>">click here</a>
                                    </p>
                                </div>
                            </div>

                            <div class="listing-detail">
                                <span data-original-title="Path Room" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_pr'] ?></span>
                                <span data-original-title="Rooms" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_rooms'] ?></span>
                                <span data-original-title="Kitchen" data-placement="bottom" data-toggle="tooltip"><?php echo $bu['num_kit'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end property -->
		</div>
	</div>
</div>

<?php include'includes/templates/footer.php';?>
