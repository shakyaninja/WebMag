<?php
define('BREADCRUMBS', ['contact', 'category', 'about', 'blank']);
define('CAT_COLOR', ['cat-1', 'cat-2', 'cat-3', 'cat-4']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>WebMag<?php echo (isset($header) && !empty($header)) ? ' | ' . $header : "" ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <div id="nav">
            <!-- Main Nav -->
            <div id="nav-fixed">
                <div class="container">
                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="index.php" class="logo"><img src="./assets/img/logo.png" alt=""></a>
                    </div>
                    <!-- /logo -->


                    <!-- nav -->
                    <ul class="nav-menu nav navbar-nav">
                        <?php
                        $Category = new category();
                        $categories = $Category->getAllCategory();
                        ?>
                        <?php
                        if ($categories) {
                            foreach ($categories as $key => $category) {
                        ?>
                                <li class="<?php echo CAT_COLOR[$category->id%4] ?>"><a href="category.php?id=<?php echo $category->id ?>"><?php echo $category->categoryname ?></a></li>
                        <?php
                            }
                        }
                        ?>
                        <!-- <li class="cat-1"><a href="category.html">Web Design</a></li>
                        <li class="cat-2"><a href="category.html">JavaScript</a></li>
                        <li class="cat-3"><a href="category.html">Css</a></li>
                        <li class="cat-4"><a href="category.html">Jquery</a></li> -->
                    </ul>
                    <!-- /nav -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Main Nav -->
            <!-- Aside Nav -->
            <div id="nav-aside">
                <!-- nav -->
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="blank.php">Join Us</a></li>
                        <li><a href="blank.php">Advertisement</a></li>
                        <li><a href="contact.php">Contacts</a></li>
                    </ul>
                </div>
                <!-- /nav -->

                <!-- widget posts -->
                <div class="section-row">
                    <h3>Recent Posts</h3>
                    <?php
                    $Blog = new blog();
                    $recentBlogs = $Blog->getAllRecentBlogWithLimit( 0, 3);
                    // debugger($recentBlogs,true);
                    if (isset($recentBlogs) && !empty($recentBlogs)) {
                        foreach ($recentBlogs as $key => $recentBlog) {
                            if (isset($recentBlog->image) && !empty($recentBlog->image) && file_exists(UPLOAD_PATH . 'blog/' . $recentBlog->image)) {
                                $thumbnail = UPLOAD_URL . 'blog/' . $recentBlog->image;
                            } else {
                                $thumbnail = UPLOAD_URL . 'noimg.jpg';
                            }
                    ?>
                            <div class="post post-widget">
                                <a class="post-img" href="blog-post?id=<?php echo $recentBlog->id ?>"><img src="<?php echo $thumbnail?>" alt="..."></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post?id=<?php echo $recentBlog->id ?>"><?php echo $recentBlog->title?></a></h3>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- /widget posts -->

                <!-- social links -->
                <div class="section-row">
                    <h3>Follow us</h3>
                    <ul class="nav-aside-social">
                        <?php
                        $Icons = new info();
                        $icons = $Icons->getAllInfo();
                        if ($icons) {
                            foreach ($icons as $key => $icon) {
                        ?>
                                <li><a href="<?php echo $icon->url ?>"><i class="<?php echo $icon->class ?>"></i></a></li>
                        <?php
                            }
                        }
                        ?>
                        <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <!-- /social links -->

                <!-- aside nav close -->
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                <!-- /aside nav close -->
            </div>
            <!-- Aside Nav -->
        </div>
        <!-- /Nav -->
        <?php
        if (in_array(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME), BREADCRUMBS)) {
        ?>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <ul class="page-header-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><?php echo isset($bread) && !empty($bread) ? $bread : "" ?></li>
                            </ul>
                            <h1><?php echo isset($bread) && !empty($bread) ? $bread : "" ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </header>