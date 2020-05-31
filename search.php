<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    // debugger($search,true);
} else {
    redirect('index');
}
$header = 'Search Results for "' . $search . '"';
// $bread = $header;
include 'inc/header.php';
?>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- aside -->
            <div class="col-md-12">

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2><?php echo $header?></h2>
                    </div>
                    <?php
                    $blogs = $Blog->getAllBlogSearch($search);
                    if (isset($blogs)&&!empty($blogs)) {
                        foreach ($blogs as $key => $blog) {
                            if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
                    ?>
                            <div class="post post-widget">
                                <a class="post-img" href="blog-post.html"><img src="<?php echo $thumbnail?>" alt=""></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post.html"><?php echo $blog->title?></a></h3>
                                </div>
                            </div>
                    <?php
                        }
                    }else{
                        ?>
                        <p>No Search results found for '<span class="red-text"><?php echo $search;?></span>'</p>
                        <?php
                    }
                    ?>
                <!-- /post widget -->

                <!-- ad -->
                <?php
                $Ads = new ads();
                $ads = $Ads->getAllWideAds();
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
include 'inc/footer.php';
?>