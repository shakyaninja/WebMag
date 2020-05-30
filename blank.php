<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
include 'inc/header.php';
?>
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<h1>H1 Typography heading.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

				<h2>H2 Typography heading.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

				<h3>H3 Typography heading.</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

				<h4>H4 Typography heading.</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

				<ul class="list-style">
					<li>
						<p>Vix mollis admodum ei, vis legimus voluptatum ut.</p>
					</li>
					<li>
						<p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p>
					</li>
					<li>
						<p>Laudem rationibus vim id. Te per illum ornatus.</p>
					</li>
				</ul>

				<ol class="list-style">
					<li>
						<p>Vix mollis admodum ei, vis legimus voluptatum ut.</p>
					</li>
					<li>
						<p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p>
					</li>
					<li>
						<p>Laudem rationibus vim id. Te per illum ornatus.</p>
					</li>
				</ol>
			</div>
			<!-- aside -->
			<div class="col-md-4">
				<!-- ad -->
				<?php
				$Ads = new ads();
				$ads = $Ads->getAllSimpleAds();
				if (isset($ads[0]) && !empty($ads[0])) {
				?>
					<div class="aside-widget text-center">
						<a href="<?php $ads[0]->url ?>" style="display: inline-block;margin: auto;">
							<?php
							if (isset($ads[0]->image) && !empty($ads[0]->image) && file_exists(UPLOAD_PATH . 'ads/' . $ads[0]->image)) {
								$thumbnail = UPLOAD_URL . 'ads/' . $ads[0]->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
							?>
							<img class="img-responsive" src="<?php echo $thumbnail ?>" alt="Ads">
						</a>
					</div>
				<?php
				}
				?>

				<!-- /ad -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Most Read</h2>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./assets/img/widget-1.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./assets/img/widget-2.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./assets/img/widget-3.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./assets/img/widget-4.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div>
				</div>
				<!-- /post widget -->
			</div>
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php
include 'inc/footer.php';
?>