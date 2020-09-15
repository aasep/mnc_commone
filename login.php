<?php
#########################################
# FINCON DEV                            #
# OS : WINDOWS                          #
# DB : POSTGRESQL                       #
# CREATOR : ASEP ARIFYAN                #
# EMAIL : asep.arifyan@mncbank.co.id    #
#########################################
session_start();
    require_once('config/config.php');
    require_once('function/function.php');

    if ( !isset ($_GET['status'])) {
    $_SESSION['rnd1']=generateRandomString(40);
    }
    //date_default_timezone_set("Asia/Jakarta");
    if (isset($_SESSION['SESS_USERNAME']) && isset($_SESSION['SESS_STATUS_ACCOUNT']) && isset($_SESSION['SESS_PASSWORD']))
    {
        header("location: home");
        die();
    }
	
	// str_replace(array(';','-'),"", trim(strtolower($_POST['username'])))
    if (isset($_POST['username']))
    {  
       // $password=sha1($_POST['password']);
        $password=hashEncrypted($_POST['password']);
        $query_user=" SELECT * FROM user_account where id_karyawan='".str_replace(array(';','-'),"", trim(strtolower($_POST['username'])))."' and password='$password' ";
        $result_user = pg_query($connection,$query_user);
        $found = pg_num_rows($result_user);

         if ($found >= 1)
         {
              $r_account = pg_fetch_array($result_user);
              $fix_username=$r_account['id_karyawan'];
              $fix_password=$r_account['password'];
              $fix_status_account=$r_account['status_account'];
              $fix_group_user=$r_account['id_group_type'];

              $fix_id_cabang=$r_account['id_cabang'];
              $fix_id_jabatan=$r_account['id_jabatan'];
              $fix_nama_lengkap=$r_account['nama_lengkap'];
              $fix_email=$r_account['email'];

              $fix_id_channel=$r_account['id_channel'];
              $fix_id_pic=$r_account['id_pic'];
              $fix_id_unit=$r_account['id_unit'];
              $fix_tlp=$r_account['tlp'];
              $fix_image=$r_account['image'];
              

              // ==========Cek again password
             
              if ($fix_password != $password){
                    $var=$_SESSION['rnd1'];
                    logLogin("login","$_POST[username]","failed password");
                    //logActivity("login","failed");
                    header("location: login?status=$var&id=1");
                    die();
              }
             
               //======== CHECK account status Active or inactive =======
              if ($fix_status_account == 0){
                    logLogin("login","$_POST[username]","failed inactive");
                    header('location: temp_session_login?status=inactive');
                    die();
              }
              
                $_SESSION['SESS_USERNAME']=$fix_username;
                $_SESSION['SESS_STATUS_ACCOUNT']=$fix_status_account;
                $_SESSION['SESS_PASSWORD'] = $fix_password;
                $_SESSION['SESS_GROUP_USER'] = $fix_group_user;
                $_SESSION['SESS_ID_CABANG']=$fix_id_cabang;
                $_SESSION['SESS_ID_JABATAN']=$fix_id_jabatan;
                $_SESSION['SESS_NAMA_LENGKAP'] = $fix_nama_lengkap;
                $_SESSION['SESS_EMAIL'] = $fix_email;
                $_SESSION['SESS_ID_CHANNEL']=$fix_id_channel;
                $_SESSION['SESS_ID_PIC'] = $fix_id_pic;
                $_SESSION['SESS_ID_UNIT'] = $fix_id_unit;
                $_SESSION['SESS_TLP'] = $fix_tlp;
                $_SESSION['SESS_IMG'] = $fix_image;

                logActivity("login","success");

                header("location: home");


         } else {
        
            $var=$_SESSION['rnd1'];
            logLogin("login","$_POST[username]","failed wrong username or password");
            header("location: login?status=$var&id=2");

             } // else not found


        }  //end isset post username


?>

<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Commone</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="assets/global/css/google_css.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <!-- <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> -->
        <link href="assets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" />
        
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" type="image/x-icon" href="http://www.mncbank.co.id/assets/Addresbarwebsite(Favicon).png"> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
       <div class="logo">
    <a href="login">
    <img src="images/logo-mnc-bank.png" style="height: 130px;" alt=""/>
    </a>
</div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="login" method="post">
                <h3 class="form-title" align="center"> <b>Commone System </b></h3>
                <div class="alert alert-danger display-hide">
                    
                    <span> <i>Enter any username and password. </i></span>
                </div>
                 <?php
        if ( isset ($_GET['status']) && ($_GET['status'])=="$_SESSION[rnd1]")
        {
        echo "<div class='alert alert-danger'></button><span> <i>username or password is wrong...!</i> </span></div>";
        }
        ?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
                <div class="form-actions">
                    
                    <button type="submit" class="btn green pull-right"> Login </button>
                </div>
                
                
                <div class="create-account">
                    <p> Login With Your Account &nbsp;
                        
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            
            
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2016 &copy; PT Bank MNC Internasional Tbk. </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="assets/pages/scripts/login-4.min.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>