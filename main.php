<?php
session_start();
    require_once 'config/config.php';
    error_reporting(0);
date_default_timezone_set("Asia/Jakarta"); 


#########################################
# FINCON DEV                            #
# OS : WINDOWS                          #
# DB : POSTGRESQL                       #
# CREATOR : ASEP ARIFYAN                #
# EMAIL : asep.arifyan@mncbank.co.id    #
#########################################
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Commone System </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets2/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets2/global/plugins/mapplic/mapplic/mapplic.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets2/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets2/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets2/layouts/layout7/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets2/layouts/layout7/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" type="image/x-icon" href="http://www.mncbank.co.id/assets/Addresbarwebsite(Favicon).png"> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="clearfix">
                <!-- BEGIN BURGER TRIGGER -->
                <div class="burger-trigger">
                    <button class="menu-trigger">
                        <img src="assets2/layouts/layout7/img/m_toggler.png" alt=""> </button>
                    <div class="menu-overlay menu-overlay-bg-transparent">
                        <div class="menu-overlay-content">
                            <ul class="menu-overlay-nav text-uppercase">
                                <li>
                                    <a href="login">Login to System</a>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                    <div class="menu-bg-overlay">
                        <button class="menu-close">&times;</button>
                    </div>
                    <!-- the overlay element -->
                </div>
                <!-- END NAV TRIGGER -->
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index">
                        <img src="assets2/layouts/layout7/img/MNC_BANK_logo.png" alt="logo"  width="150"/> </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte --><!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container page-content-inner page-container-bg-solid">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <div class="container-fluid">
                    <h2 class="breadcrumbs-title"> <b> <i class='fa fa-cogs'></i> COMMONE </b></h2>
                    <ol class="breadcrumbs-list">
                        <li>
                            <a class="breadcrumbs-item-link" href="login"> <i class="fa fa-users font-blue"></i> <b>Login to System</b> </a>
                        </li>
                        
                        
                    </ol>
                </div>
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN CONTENT -->
            <div class="container-fluid container-lf-space">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row widget-row">
                    
                    <div class="col-md-9 col-sm-6 col-xs-12 margin-bottom-20">
                        <!-- BEGIN WIDGET GRADIENT -->
                        <div class="clearfix"></div>
                        <div id="carousel-example-generic-v1" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <?php
                           
                            for ($i=0; $i < 5 ; $i++) { 
                                if ($i==0){
                                    $class="class='circle active'";
                                }else {
                                    $class="class='circle'";
                                                                    }
                                echo "<li data-target='#carousel-example-generic-v1' data-slide-to='$i' $class ></li>";
                            }
                            ?>
                               
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php
                            $q_slide_product= " select title,image from product_news order by adddt desc limit 5";
                            $result_sproduct= pg_query($q_slide_product);
                            $z=1;
                            while ($row_sproduct=pg_fetch_array($result_sproduct)){

                               if ($z==1){
                                     echo "<div class='item active'>";
                                } else {
                                     echo "<div class='item'>";
                                   }

                            ?>
                                
                                    <div class="widget-gradient img-responsive"  style="background: url(<?php echo "images/img-prodnews/$row_sproduct[image]";?>)">
                                        <div class="widget-gradient-body">
                                            <h3 class="widget-gradient-title"><?php echo "$row_sproduct[title]";?></h3>
                                            <ul class="widget-gradient-body-actions list-inline">
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                        <?php
                        $z++;
                            }
                        ?>
                            </div>
                        </div>
                        <!-- END WIDGET GRADIENT -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-20">
                        <!-- BEGIN WIDGET WRAP IMAGE -->
                        <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-red">
                            <?php
                           
                            for ($i=0; $i < 5 ; $i++) { 
                                if ($i==0){
                                    $class="class='circle active'";
                                }else {
                                    $class="class='circle'";
                                                                    }
                                echo "<li data-target='#carousel-example-generic-v2' data-slide-to='$i' $class ></li>";
                            }
                            ?>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">

                            <?php
                            $q_slide_promotion= " select title,image from promotion_news order by adddt desc limit 5";
                            $result_spromotion= pg_query($q_slide_promotion);
                            $z=1;
                            while ($row_spromotion=pg_fetch_array($result_spromotion)){

                               if ($z==1){
                                     echo "<div class='item active'>";
                                } else {
                                     echo "<div class='item'>";
                                   }

                            ?>
                                
                                    <div class="widget-wrap-img widget-bg-color-white">
                                        <h3 class="widget-wrap-img-title"><?php echo "$row_spromotion[title]";?></h3>
                                        <img class="widget-wrap-img-element img-responsive" src="<?php echo "images/img-promnews/$row_spromotion[image]";?>" alt=""> </div>
                                </div>
                               
                               <?php
                        $z++;
                            }
                        ?>
                            </div>
                        </div>
                        <!-- END WIDGET WRAP IMAGE -->
                    </div>
                </div>
                <div class="row widget-bg-color-white no-space margin-bottom-20">
                    <div class="col-md-3 col-sm-6 no-space">
                        <!-- BEGIN WIDGET SUBSCRIBE -->
                        <div class="widget-subscribe widget-subscribe-quote widget-bg-color-purple">
                            <h2 class="widget-subscribe-title widget-title-color-purple-dark text-uppercase">Subscribe
                                <br/> Steps</h2>
                            <p class="widget-subscribe-subtitle widget-title-color-purple-light">Lorem ipsum dolor sit amet diam
                                <a class="widget-subscribe-subtitle-link" href="#">check out</a>
                            </p>
                        </div>
                        <!-- END WIDGET SUBSCRIBE -->
                    </div>
                    <div class="col-md-3 col-sm-6 no-space">
                        <!-- BEGIN WIDGET SUBSCRIBE -->
                        <div class="widget-subscribe">
                            <span class="widget-subscribe-no">1</span>
                            <h2 class="widget-subscribe-title widget-title-color-gray-dark text-uppercase">Important
                                <br/> Step</h2>
                            <p class="widget-subscribe-subtitle widget-title-color-dark-light">Lorem ipsum dolor asqudiete sit amet dolore diam sediate dolor diam
                                <a class="widget-subscribe-subtitle-link" href="#">learn more</a>
                            </p>
                        </div>
                        <!-- END WIDGET SUBSCRIBE -->
                    </div>
                    <div class="col-md-3 col-sm-6 no-space">
                        <!-- BEGIN WIDGET SUBSCRIBE -->
                        <div class="widget-subscribe widget-subscribe-border">
                            <span class="widget-subscribe-no">2</span>
                            <h2 class="widget-subscribe-title widget-title-color-gray-dark text-uppercase">Second
                                <br/> Step</h2>
                            <p class="widget-subscribe-subtitle widget-title-color-dark-light">Lorem ipsum dolor asqudiete sit amet dolore diam sediate psum dolor asqudiete sediat dolor diam
                                <a class="widget-subscribe-subtitle-link" href="#">learn more</a>
                            </p>
                        </div>
                        <!-- END WIDGET SUBSCRIBE -->
                    </div>
                    <div class="col-md-3 col-sm-6 no-space">
                        <!-- BEGIN WIDGET SUBSCRIBE -->
                        <div class="widget-subscribe widget-subscribe-border-top">
                            <span class="widget-subscribe-no">3</span>
                            <h2 class="widget-subscribe-title widget-title-color-gray-dark text-uppercase">Final
                                <br/> Action</h2>
                            <p class="widget-subscribe-subtitle widget-title-color-dark-light">Lorem ipsum dolor asqudiete sit amet dolore diam sediate dolor diam
                                <a class="widget-subscribe-subtitle-link" href="#">learn more</a>
                            </p>
                        </div>
                        <!-- END WIDGET SUBSCRIBE -->
                    </div>
                </div>
                <div class="row widget-row"></div>
                <div class="row widget-row">
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                            <h4 class="widget-thumb-heading">Current Balance</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">USD</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                            <h4 class="widget-thumb-heading">Weekly Sales</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red icon-layers"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">USD</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                            <h4 class="widget-thumb-heading">Biggest Purchase</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">USD</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                            <h4 class="widget-thumb-heading">Average Monthly</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">USD</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                </div>
                <div class="row widget-row no-space margin-bottom-20">
                    <div class="col-md-3 col-sm-6 col-xs-12 no-space">
                        <!-- BEGIN WIDGET SOCIALS -->
                        <div class="widget-socials widget-bg-color-gray">
                            <h2 class="widget-socials-title widget-title-color-white text-uppercase">Metronic
                                <br/> 6 Layout Admin</h2>
                            <div class="margin-bottom-20">
                                <strong class="widget-socials-paragraph text-uppercase">Platform</strong>
                                <a class="widget-socials-paragraph" href="#">Bootstrap Framework</a>
                            </div>
                            <strong class="widget-socials-paragraph text-uppercase">Supports</strong>
                            <a class="widget-socials-paragraph" href="#">SASS Solution</a>
                        </div>
                        <!-- END WIDGET SOCIALS -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 no-space">
                        <!-- BEGIN WIDGET SOCIALS -->
                        <div class="widget-socials widget-gradient" style="background: url(assets2/layouts/layout7/img/03.jpg)"></div>
                        <!-- END WIDGET SOCIALS -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 no-space">
                        <!-- BEGIN WIDGET SOCIALS -->
                        <div class="widget-socials widget-bg-color-fb">
                            <i class="widget-social-icon-fb icon-social-facebook"></i>
                            <h3 class="widget-social-subtitle">
                                <a href="#">Follow us
                                    <br/> on Facebook</a>
                            </h3>
                        </div>
                        <!-- END WIDGET SOCIALS -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 no-space">
                        <!-- BEGIN WIDGET SOCIALS -->
                        <div class="widget-socials widget-bg-color-tw">
                            <i class="widget-social-icon-tw icon-social-twitter"></i>
                            <h3 class="widget-social-subtitle">
                                <a href="#">Follow us
                                    <br/> on Twitter</a>
                            </h3>
                        </div>
                        <!-- END WIDGET SOCIALS -->
                    </div>
                </div>
                <div class="row widget-row"></div>
                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a><!-- END QUICK SIDEBAR -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner container-fluid container-lf-space">
                <p class="page-footer-copyright">@2016 PT. BANK MNC , Tbk. 
                    
                </p>
            </div>
            <div class="go2top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
       
        <!-- END QUICK SIDEBAR TOGGLER -->
        <!--[if lt IE 9]>
<script src="assets2/global/plugins/respond.min.js"></script>
<script src="assets2/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets2/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets2/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/mapplic/js/hammer.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/mapplic/js/jquery.easing.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/mapplic/mapplic/mapplic.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets2/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets2/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets2/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets2/layouts/layout7/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets2/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>