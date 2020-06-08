<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
include 'inc/header.php';

// debugger($_SESSION,true);
if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
?>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-center green-text"> <?php echo $_SESSION['success'] ?></h1>
                    <hr>
                    <!-- post widget -->
                    <div class="section-title">
                        <h2>Check out our Most Read Blogs</h2>
                    </div>
                    <?php
                    $popularBlogs = $Blog->getAllPopularBlogWithLimit(0,6);
					if (isset($popularBlogs) && !empty($popularBlogs)) {
						foreach ($popularBlogs as $key => $popuarBlog) {
							if (isset($popuarBlog->image) && !empty($popuarBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $popuarBlog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $popuarBlog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
					?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post?id=<?php echo $popuarBlog->id ?>"><img src="<?php echo $thumbnail ?>" alt="..."></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post?id=<?php echo $popuarBlog->id ?>"><?php echo $popuarBlog->title ?></a></h3>
								</div>
							</div>
					<?php
						}
					}
					?>
                    <!-- /post widget -->
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


                </div>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
<?php
} else {
    redirect('contact');
}

include 'inc/footer.php';
?>