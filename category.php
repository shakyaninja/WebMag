<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
if (isset($_GET) && !empty($_GET)) {
	$cat_id = (int) $_GET['id'];
	if ($cat_id) {
		$Category = new category();
		$category_info = $Category->getCategorybyId($cat_id);
		if ($category_info) {
			$bread = $category_info[0]->categoryname;
		} else {
			redirect('index');
		}
	} else {
		redirect('index');
	}
} else {
	redirect('index');
}
include 'inc/header.php';
?>
<!-- /Header -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php
					// $Blog = new blog();
					$featuredBlog = $Blog->getAllFeaturedBlogByCategoryWithLimit($cat_id, 0, 3);
					if (isset($featuredBlog[0]) && !empty($featuredBlog)) {
					?>
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-thumb">
								<?php
								if (isset($featuredBlog[0]->image) && !empty($featuredBlog[0]->image) && file_exists(UPLOAD_PATH . 'blog/' . $featuredBlog[0]->image)) {
									$thumbnail = UPLOAD_URL . 'blog/' . $featuredBlog[0]->image;
								} else {
									$thumbnail = UPLOAD_URL . 'noimg.jpg';
								}
								?>
								<a class="post-img" href="blog-post?id=<?php echo ($featuredBlog[0]->id) ?>"><img src="<?php echo ($thumbnail); ?>" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$cat_id % 4] ?>" href="#"><?php echo $bread; ?></a>
										<span class="post-date"><?php echo date("M d, Y", strtotime($featuredBlog[0]->created_date)); ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post?id=<?php echo ($featuredBlog[0]->id) ?>"><?php echo $featuredBlog[0]->title; ?></a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->
					<?php
					}
					if (isset($featuredBlog[1]) && !empty($featuredBlog[1]) && isset($featuredBlog[2]) && !empty($featuredBlog[2])) {
					?>

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<?php
								if (isset($featuredBlog[1]->image) && !empty($featuredBlog[1]->image) && file_exists(UPLOAD_PATH . 'blog/' . $featuredBlog[0]->image)) {
									$thumbnail = UPLOAD_URL . 'blog/' . $featuredBlog[1]->image;
								} else {
									$thumbnail = UPLOAD_URL . 'noimg.jpg';
								}
								?>
								<a class="post-img" href="blog-post"><img src="<?php echo $thumbnail ?>" alt="..."></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$cat_id % 4] ?>" href="#"><?php echo $bread ?></a>
										<span class="post-date"><?php echo date("M d, Y", strtotime($featuredBlog[1]->created_date)); ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $featuredBlog[1]->id ?>"><?php echo $featuredBlog[1]->title ?></a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<?php
								if (isset($featuredBlog[2]->image) && !empty($featuredBlog[2]->image) && file_exists(UPLOAD_PATH . 'blog/' . $featuredBlog[0]->image)) {
									$thumbnail = UPLOAD_URL . 'blog/' . $featuredBlog[2]->image;
								} else {
									$thumbnail = UPLOAD_URL . 'noimg.jpg';
								}
								?>
								<a class="post-img" href="blog-post"><img src="<?php echo $thumbnail ?>" alt="..."></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$cat_id] ?>" href="#"><?php echo $bread; ?></a>
										<span class="post-date"><?php echo date("M d, Y", strtotime($featuredBlog[2]->created_date)); ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $featuredBlog[2]->id ?>"><?php echo $featuredBlog[2]->title ?></a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->
					<?php
					}
					?>

					<div class="clearfix visible-md visible-lg"></div>

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

					<?php
					$recentBlogs = $Blog->getAllRecentBlogByCategoryWithLimit($cat_id, 0, 4);
					// debugger($recentBlogs,true);
					if (isset($recentBlogs) && !empty($recentBlogs)) {
						foreach ($recentBlogs as $key => $recentBlog) {
							if (isset($recentBlog->image) && !empty($recentBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $recentBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $recentBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post?id=<?php echo $recentBlog->id ?>"><img src="<?php echo $thumbnail ?>" alt="..."></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$cat_id] ?>" href="#"><?php echo $recentBlog->Category ?></a>
											<span class="post-date"><?php echo date("M d, Y", strtotime($recentBlog->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $recentBlog->id ?>"><?php echo $recentBlog->title ?></a></h3>
										<p><?php echo substr(html_entity_decode($recentBlog->content), 0, 100) . '...<br>' ?></p>
									</div>
								</div>
							</div>
							<!-- /post -->
					<?php
						}
					}
					?>

					<div class="col-md-12">
						<div class="section-row">
							<!-- for this AJAX is needed -->
							<button class="primary-button center-block">Load More</button>
						</div>
					</div>
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

				<!-- most read -->
				<?php
				$popularBlogs = $Blog->getAllPopularBlogByCategoryWithLimit($cat_id, 0, 4);
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
								if($categories){
									foreach ($categories as $key => $category) {
										// debugger($category,true);
										?>
											<li><a href="category?id=<?php echo $category->id?>" class="<?php echo CAT_COLOR[$category->id]?>"><?php echo $category->categoryname?><span>
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
							<li><a href="#">Jan 2018</a></li>
							<li><a href="#">Feb 2018</a></li>
							<li><a href="#">Mar 2018</a></li>
						</ul>
					</div>
				</div>
				<!-- /archive -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php
include 'inc/footer.php';
?>