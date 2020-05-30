<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
if(isset($_GET)&&!empty($_GET)){
	$blog_id = (int)$_GET['id']; 
	if($blog_id){
		$Blog = new blog();
		$blog_info = $Blog->getBlogbyId($blog_id);
		// $bread = $blog_info[0]->title;
		// $blog_info[0]->view = (int)($blog_info[0]->view) + 1;
		// $success = $Blog->updateBlogById($blog_info,$blog_info[0]->id);
		// debugger($blog_info,true);
	}
}
else{
	redirect('index');
}
include 'inc/header.php';

?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Post content -->
			<div class="col-md-8">
				<div class="section-row sticky-container">
					<div class="main-post">
						<h3><?php echo $blog_info[0]->title ?></h3>
						<p><?php echo html_entity_decode($blog_info[0]->content)?></p>
						<figure class="figure-img">
							<?php
								if (isset($blog_info[0]->image) && !empty($blog_info[0]->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog_info[0]->image)) {
									$thumbnail = UPLOAD_URL . 'blog/' . $blog_info[0]->image;
								} else {
									$thumbnail = UPLOAD_URL . 'noimg.jpg';
								}
							?>
							<img class="img-responsive" src="<?php echo $thumbnail?>" alt="">
							<figcaption>So Lorem Ipsum is bad (not necessarily)</figcaption>
						</figure>
					</div>
					<div class="post-shares sticky-shares">
						<?php
						$Share = new share();
						$shares = $Share->getAllShare();
						if ($shares) {
							foreach ($shares as $key => $share) {
								// debugger($share,true);
						?>
								<a href="<?php echo $share->url ?>" class="<?php echo "share-" . $share->icon_name ?>"><i class="<?php echo $share->class ?>"></i></a>
						<?php
							}
						}
						?>
					</div>
				</div>

				<!-- ad -->
				<?php
				$Ads = new ads();
				$ads = $Ads->getAllWideAds();
				if (isset($ads[0]) && !empty($ads[0])) {
					if (isset($ads[0]->image) && !empty($ads[0]->image) && file_exists(UPLOAD_PATH . 'ads/' . $ads[0]->image)) {
						$thumbnail = UPLOAD_URL . 'ads/' . $ads[0]->image;
					} else {
						$thumbnail = UPLOAD_URL . 'noimg.jpg';
					}
				?>
					<div class="col-md-12">
						<div class="section-row">
							<a href="<?php echo $ads[0]->url ?>">
								<img class="img-responsive center-block" src="<?php echo $thumbnail ?>" alt="">
							</a>
						</div>
					</div>
				<?php
				}
				?>
				<!-- ad -->

				<!-- author -->
				<div class="section-row">
					<div class="post-author">
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="./assets/img/author.png" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3>John Doe</h3>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<ul class="author-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /author -->

				<!-- comments -->
				<div class="section-row">
					<div class="section-title">
						<h2>3 Comments</h2>
					</div>

					<div class="post-comments">
						<!-- comment -->
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="./assets/img/avatar.png" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4>John Doe</h4>
									<span class="time">March 27, 2018 at 8:00 am</span>
									<a href="#" class="reply">Reply</a>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./assets/img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comment -->

						<!-- comment -->
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="./assets/img/avatar.png" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4>John Doe</h4>
									<span class="time">March 27, 2018 at 8:00 am</span>
									<a href="#" class="reply">Reply</a>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</div>
						<!-- /comment -->
					</div>
				</div>
				<!-- /comments -->

				<!-- reply -->
				<div class="section-row">
					<div class="section-title">
						<h2>Leave a reply</h2>
						<p>your email address will not be published. required fields are marked *</p>
					</div>
					<form class="post-reply">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<span>Name *</span>
									<input class="input" type="text" name="name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Email *</span>
									<input class="input" type="email" name="email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Website</span>
									<input class="input" type="text" name="website">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="input" name="message" placeholder="Message"></textarea>
								</div>
								<button class="primary-button">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /reply -->
			</div>
			<!-- /Post content -->

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
				<!-- most read -->
				<?php
				$popularBlogs = $Blog->getAllPopularBlogWithLimit( 0, 4);
				?>
				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Most Read</h2>
					</div>
					<?php
					if (isset($popularBlogs) && !empty($popularBlogs)) {
						foreach ($popularBlogs as $key => $popuarBlog) {
							if (isset($popuarBlog->image) && !empty($popuarBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $popuarBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $popuarBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post?id=<?php echo $popuarBlog->id ?>"><img src="<?php echo $thumbnail?>" alt="..."></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post?id=<?php echo $popuarBlog->id ?>"><?php echo $popuarBlog->title?></a></h3>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				<!-- /post widget -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Featured Posts</h2>
					</div>
					<?php
					$featuredBlogs = $Blog->getAllFeaturedBlogWithLimit(0, 2);
					// debugger($featuredBlogs,true);
					if (isset($featuredBlogs) && !empty($featuredBlogs)) {
						foreach ($featuredBlogs as $key => $featuredBlog) {
							if (isset($featuredBlog->image) && !empty($featuredBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $featuredBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $featuredBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post?id=<?php echo $featuredBlog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$featuredBlog->categoryid%4] ?>" href="#"><?php echo $featuredBlog->Category?></a>
										<span class="post-date"><?php echo date("M d, Y", strtotime($featuredBlog->created_date)); ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post?id=<?php echo $featuredBlog->id ?>"><?php echo $featuredBlog->title ?></a></h3>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				<!-- /post widget -->

				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Catagories</h2>
					</div>
					<div class="category-widget">
						<ul>
							<?php
							$Category = new category();
							$categories = $Category->getAllCategory();
							if ($categories) {
								foreach ($categories as $key => $category) {
									// debugger($category,true);
							?>
									<li><a href="category?id=<?php echo $category->id ?>" class="<?php echo CAT_COLOR[$category->id] ?>"><?php echo $category->categoryname ?><span>
												<?php
												$Count = $Blog->getNumberBlogByCategory($category->id);
												echo $Count[0]->total;
												?>
											</span></a></li>
							<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
				<!-- /catagories -->
				<!-- tags -->
				<div class="aside-widget">
					<div class="tags-widget">
						<ul>
							<li><a href="#">Chrome</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Tutorial</a></li>
							<li><a href="#">Backend</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Development</a></li>
							<li><a href="#">JavaScript</a></li>
							<li><a href="#">Website</a></li>
						</ul>
					</div>
				</div>
				<!-- /tags -->

				<!-- archive -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Archive</h2>
					</div>
					<div class="archive-widget">
						<ul>
							<li><a href="#">January 2018</a></li>
							<li><a href="#">Febuary 2018</a></li>
							<li><a href="#">March 2018</a></li>
						</ul>
					</div>
				</div>
				<!-- /archive -->
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