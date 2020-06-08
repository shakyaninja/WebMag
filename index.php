<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';

include 'inc/header.php';
?>
<!-- /Header -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php
			$blogs = $Blog->getAllFeaturedBlogWithLimit(2, 2);
			// debugger($blogs);
			if ($blogs) {
				foreach ($blogs as $key => $blog) {
					if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
						$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
					} else {
						$thumbnail = UPLOAD_URL . 'noimg.jpg';
					}
			?>
					<!-- post -->
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
									<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
			<?php
				}
			}
			?>
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Recent Posts</h2>
				</div>
			</div>
			<?php
			$blogs = $Blog->getAllRecentBlogWithLimit(1, 3);
			// debugger($blogs);
			if ($blogs) {
				foreach ($blogs as $key => $blog) {
					if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
						$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
					} else {
						$thumbnail = UPLOAD_URL . 'noimg.jpg';
					}
			?>
					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
									<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>

							</div>
						</div>
					</div>
					<!-- /post -->
			<?php
				}
			}
			?>

			<div class="clearfix visible-md visible-lg"></div>

		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php
					$blogs = $Blog->getAllBlogWithLimit(0, 9);
					if ($blogs) {
						foreach ($blogs as $key => $blog) {
							if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
							if ($key == 0) {
					?>
								<!-- post -->
								<div class="col-md-12">
									<div class="post post-thumb">
										<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
												<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
											</div>
											<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>
										</div>
									</div>
								</div>
								<!-- /post -->
							<?php
							} else {
							?>
								<!-- post -->
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
												<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
											</div>
											<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>
										</div>
									</div>
								</div>
								<!-- /post -->
							<?php
							}
							if ($key % 2 == 0) {
							?>
								<div class="clearfix visible-md visible-lg"></div>

					<?php
							}
						}
					}
					?>


				</div>
			</div>

			<div class="col-md-4">
				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Most Read</h2>
					</div>
					<?php
					$popularBlogs = $Blog->getAllPopularBlogWithLimit(0, 4);
					if (isset($popularBlogs) && !empty($popularBlogs)) {
						foreach ($popularBlogs as $key => $popuarBlog) {
							if (isset($popuarBlog->image) && !empty($popuarBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $popuarBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $popuarBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post?id=<?php echo $popuarblog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post?id=<?php echo $popuarblog->id ?>"><?php echo $popuarBlog->title ?></a></h3>
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
					$blogs = $Blog->getAllFeaturedBlogWithLimit(2, 2);
					// debugger($blogs);
					if ($blogs) {
						foreach ($blogs as $key => $blog) {
							if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
										<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				<!-- /post widget -->

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
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Featured Posts</h2>
				</div>
			</div>
			<?php
			$blogs = $Blog->getAllFeaturedBlogWithLimit(5, 3);
			// debugger($blogs);
			if ($blogs) {
				foreach ($blogs as $key => $blog) {
					if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
						$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
					} else {
						$thumbnail = UPLOAD_URL . 'noimg.jpg';
					}
			?>
					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid % 4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->Category ?></a>
									<span class="post-date"><?php echo date("M d, Y", strtotime($blog->created_date)) ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
			<?php
				}
			}
			?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Most Read</h2>
						</div>
					</div>
					<?php
					$popularBlogs = $Blog->getAllPopularBlogWithLimit(4, 4);
					if (isset($popularBlogs) && !empty($popularBlogs)) {
						foreach ($popularBlogs as $key => $popuarBlog) {
							if (isset($popuarBlog->image) && !empty($popuarBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $popuarBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $popuarBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post?id=<?php echo $popuarBlog->id ?>"><img src="<?php echo $thumbnail ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$popuarBlog->categoryid % 4] ?>" href="category?id=<?php echo $popuarBlog->categoryid ?>"><?php echo $popuarBlog->Category ?></a>
											<span class="post-date"><?php echo date("M d, Y", strtotime($popuarBlog->created_date)) ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $popuarBlog->id ?>"><?php echo $popuarBlog->title ?></a></h3>
										<p><?php echo html_entity_decode($popuarBlog->content) ?></p>
									</div>
								</div>
							</div>
							<!-- /post -->
					<?php
						}
					}
					?>
				</div>
			</div>

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
							<!-- tags -->
							<?php
							$Tag = new tag();
							$tags = $Tag->getAllTag();
							if ($tags) {
								foreach ($tags as $key => $tag) {
							?>
									<li><a href="search?search=<?php echo $tag->name ?>"><?php echo $tag->name ?></a></li>
							<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
				<!-- /tags -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- Footer -->
<?php
include 'inc/footer.php';
?>