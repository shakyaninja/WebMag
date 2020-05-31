<?php
include $_SERVER['DOCUMENT_ROOT'] . 'config/init.php';
$header = 'Archive';
include 'inc/header.php';
if (isset($_GET) && !empty($_GET)) {
    $Archive = new archive();
    $archive = $Archive->getArchivebyId($_GET['id']);
    if ($archive) {
        $archive = $archive[0];
        $archive_name = date("M d, Y", strtotime($archive->date));
    } else {
        redirect('index');
    }
} else {
    redirect('index');
}
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
                        <h2><?php echo $archive_name ?></h2>
                    </div>
                    <?php
                    $blogs = $Blog->getAllBlogByDate($archive->date);
                    // debugger($blogs,true);
                    if ($blogs) {
                        foreach ($blogs as $key => $blog) {
                            if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH . 'blog/' . $blog->image)) {
								$thumbnail = UPLOAD_URL . 'blog/' . $blog->image;
							} else {
								$thumbnail = UPLOAD_URL . 'noimg.jpg';
							}
                    ?>
                            <div class="post post-widget">
                                <a class="post-img" href="blog-post?id=<?php echo $blog->id?>"><img src="<?php echo $thumbnail?>" alt=""></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id?>"><?php echo $blog->title?></a></h3>
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
                $ads = $Ads->getAllWideAds();
                if (isset($ads[0]) && !empty($ads[0])) {
                ?>
                    <div class="aside-widget text-center">
                        <a href="<?php $ads[0]->url ?>">
                            <?php
                            if (isset($ads[0]->image) && !empty($ads[0]->image) && file_exists(UPLOAD_PATH . 'ads/' . $ads[0]->image)) {
                                $thumbnail = UPLOAD_URL . 'ads/' . $ads[0]->image;
                            } else {
                                $thumbnail = UPLOAD_URL . 'noimg.jpg';
                            }
                            ?>
                            <img class="img-responsive center-block" src="<?php echo $thumbnail ?>" alt="Ads">
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