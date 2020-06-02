<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-5">
				<div class="footer-widget">
					<div class="footer-logo">
						<a href="index.html" class="logo"><img src="./assets/img/logo.png" alt=""></a>
					</div>
					<ul class="footer-nav">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Advertisement</a></li>
					</ul>
					<div class="footer-copyright">
						<span>&copy;
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<div class="footer-widget">
							<h3 class="footer-title">About Us</h3>
							<ul class="footer-links">
								<li><a href="about">About Us</a></li>
								<li><a href="blank">Join Us</a></li>
								<li><a href="contact">Contacts</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="footer-widget">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<?php
								// $Category = new category();
								// $categories = $Category->getAllCategory();
								if ($categories) {
									foreach ($categories as $key => $category) {
								?>
										<li><a href="category.php?id=<?php echo $category->id ?>"><?php echo $category->categoryname ?></a></li>
								<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="footer-widget">
					<h3 class="footer-title">Join our Newsletter</h3>
					<div class="footer-newsletter">
						<form action="process/join" method="post">
							<input class="input" type="email" name="email" placeholder="Enter your email">
							<button class="newsletter-btn" type="submit"><i class="fa fa-paper-plane"></i></button>
						</form>
					</div>
					<ul class="footer-social">
						<?php
						$Icon = new info();
						$icons = $Icon->getAllInfo();
						if ($icons) {
							foreach ($icons as $key => $icon) {
						?>
								<li><a href="<?php echo $icon->url?>"><i class="<?php echo $icon->class?>"></i></a></li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>