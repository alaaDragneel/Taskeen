<?php include'init.php';?>

<div class="inside-banner">
	<div class="container">
		<span class="pull-right"><a href="#">Home</a> / About Us</span>
		<h2>About Us</h2>
	</div>
</div><!-- banner -->
<div class="container">
	<div class="spacer">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<img alt="realestate" class="img-responsive thumbnail" src="images/about.jpg">
				<h3>About Us</h3>
				<p><?php echo getSetting('siteDesc');?></p>
			</div>
		</div>
	</div>
</div>
<!-- Login Modal -->
<?php require_once "loginModal.php"; ?>
<!-- Login Modal -->

<?php include'includes/templates/footer.php';?>
