
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
  ================================================== -->
        <meta charset="utf-8">
        <title>UKMunity - <?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="author" content="Ahmed Saeed">
        <!-- Mobile Specific Metas
  ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/bootstrap.min.css" media="screen">
        <!-- jquery ui css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/jquery-ui-1.10.1.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/customize.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/style.css">
        <!-- flexslider css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/flexslider.css">
        <!-- fancybox -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/js/fancybox/jquery.fancybox.css">
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
                <link rel="stylesheet" href="css/font-awesome-ie7.css">
        <![endif]-->
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/user'); ?>/images/favicon.html">
        <link rel="apple-touch-icon" href="<?php echo base_url('assets/user'); ?>/images/apple-touch-icon.html">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/user'); ?>/images/apple-touch-icon-72x72.html">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/user'); ?>/images/apple-touch-icon-114x114.html">
    </head>

    <body>

        <div id="mainContainer" class="clearfix">

            <!--begain header-->
            <header>
                <div class="upperHeader">
                    <div class="container">
                        <p>
                            Welcome to UKMunity, <a href="#">Login</a> or <a href="<?php echo site_url('user/userRegis'); ?>">Create new account</a>
                        </p>
                    </div><!--end container-->
                </div><!--end upperHeader-->

                <div class="middleHeader">
                    <div class="container">

                        <div class="middleContainer clearfix">

                            <div class="siteLogo pull-left">
                                <h1><a href="index-2.html">UKMunity</a></h1>
                            </div>

                            <div class="pull-right">
                                <form method="#" action="#" class="siteSearch">
                                    <div class="input-append">
                                        <input type="text" class="span2" id="appendedInputButton" placeholder="Search...">
                                        <button class="btn btn-primary" type="submit" name=""><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div><!--end middleCoontainer-->

                    </div><!--end container-->
                </div><!--end middleHeader-->

                <div class="mainNav">
                    <div class="container">
                        <div class="navbar">

                            <ul class="nav">
                                <li class="active"><a href="<?php echo site_url('user/userHome'); ?>"><i class="icon-home"></i></a></li>
<!--                                <li>
                                    <a href="#">Pages &nbsp;<i class="icon-caret-down"></i></a>
                                    <div>
                                        <ul>
                                            <li><a href="index-2.html"> <span>-</span> index1</a></li>
                                            <li><a href="index2.html"> <span>-</span> index2</a></li>
                                            <li><a href="account.html"> <span>-</span> account</a></li>
                                            <li><a href="login.html"> <span>-</span> login</a></li>
                                            <li><a href="register.html"> <span>-</span> register</a></li>
                                            <li><a href="cart.html"> <span>-</span> Cart</a></li>
                                            <li><a href="wishlist.html"> <span>-</span> wishlist</a></li>
                                            <li><a href="checkout.html"> <span>-</span> Checkout</a></li>
                                            <li><a href="compare.html"> <span>-</span> Compare</a></li>
                                            <li><a href="contact.html"> <span>-</span> Contact</a></li>
                                            <li><a href="search.html"> <span>-</span> Search</a></li>
                                            <li><a href="blog.html"> <span>-</span> blog</a></li>
                                            <li><a href="post.html"> <span>-</span> post</a></li>
                                            <li><a href="category_grid.html"> <span>-</span> category grid</a></li>
                                            <li><a href="category_grid.html"> <span>-</span> category list</a></li>
                                            <li><a href="product_details1.html"> <span>-</span> product details1</a></li>
                                            <li><a href="product_details2.html"> <span>-</span> product details2</a></li>
                                        </ul>
                                    </div>
                                </li>-->
                                <li><a href="<?php echo site_url('user/ukmList'); ?>">UKM</a></li>
                                <li><a href="<?php echo site_url('user/artikelList'); ?>">Artikel</a></li>
                            </ul><!--end nav-->

                        </div>
                    </div><!--end container-->
                </div><!--end mainNav-->

            </header>
            <!-- end header -->

            <div class="container">
                <!-- BEGIN SLIDER VIEW -->
                <?php
                if (isset($slide)) {
                    $this->load->view($slide);
                }
                ?>
                <!-- END SLIDER VIEW -->

                <!-- BEGIN VIEW -->
                <?php
                $this->load->view($view);
                ?>
                <!-- END VIEW -->
            </div>

            <!--begain footer-->
            <footer>
<!--                <div class="footerOuter">
                    <div class="container">
                        <div class="row-fluid">

                            <div class="span6">
                                <div class="titleHeader clearfix">
                                    <h3>Usefull Links</h3>
                                </div>


                                <div class="usefullLinks">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <ul class="unstyled">
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> About Us</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Delivery Information</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Privecy Police</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Tarms &amp; Condations</a></li>
                                            </ul>
                                        </div>

                                        <div class="span6">
                                            <ul class="unstyled">
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Surf Brands</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Customer Support</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Special Gifs</a></li>
                                                <li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Browse Site Map</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>end span6

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>Contact Info</h3>
                                </div>

                                <div class="contactInfo">
                                    <ul class="unstyled">
                                        <li>
                                            <button class="btn btn-small">
                                                <i class="icon-volume-up"></i>
                                            </button>
                                            Call Us: <a class="invarseColor" href="#">5246-4697-891</a>
                                        </li>
                                        <li>
                                            <button class="btn btn-small">
                                                <i class="icon-envelope-alt"></i>
                                            </button>
                                            <a class="invarseColor" href="#">shopfine@shopfine.com</a>
                                        </li>
                                        <li>
                                            <button class="btn btn-small">
                                                <i class="icon-map-marker"></i>
                                            </button>
                                            22 Avenue Park, Los Angeles
                                        </li>
                                    </ul>
                                </div>

                            </div>end span3

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>Newslatter</h3>
                                </div>

                                <div class="newslatter">
                                    <form method="#" action="#">
                                        <input class="input-block-level" type="text" name="email" value="" placeholder="Your Name..." Name="">
                                        <input class="input-block-level" type="text" name="email" value="" placeholder="Your E-Mail..." Name="">
                                        <button class="btn btn-block" type="submit" name="">Join Us Now</button>
                                    </form>
                                </div>

                            </div>end span3

                        </div>end row-fluid

                    </div>end container
                </div>end footerOuter-->

                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="payments inline pull-right">
                                <li class="visia"></li>
                                <li class="paypal"></li>
                                <li class="electron"></li>
                                <li class="discover"></li>
                            </ul>
                            <p>© Copyrights 2013 for UKMunity.com</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--end footer-->

        </div><!--end mainContainer-->

        <!-- JS
        ================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
        <!-- jQuery.Cookie -->
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.cookie.js"></script>
        <!-- bootstrap -->
        <script src="<?php echo base_url('assets/user'); ?>/js/bootstrap.min.js"></script>
        <!-- flexslider -->
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.flexslider-min.js"></script>
        <!-- cycle2 -->
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.cycle2.min.js"></script>
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.cycle2.carousel.min.js"></script>
        <!-- tweets -->
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.tweet.js"></script>
        <!-- placeholder -->
        <script src="<?php echo base_url('assets/user'); ?>/js/jquery.placeholder.min.html"></script>
        <!-- fancybox -->
        <script src="<?php echo base_url('assets/user'); ?>/js/fancybox/jquery.fancybox.js"></script>
        <!-- custom function-->
        <script src="<?php echo base_url('assets/user'); ?>/js/custom.js"></script>

    </body>

</html>