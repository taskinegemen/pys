<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\helpers\Helper;
$this->title = 'My Tasks';
//echo print_r(Yii::$app->user);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::$app->homeUrl;?>assets/images/background/tubitak_logo_black_2.png">
    <title>Bekleyen Görevler</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Calendar CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- chartist CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo Yii::$app->homeUrl;?>css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/wizard/steps.css" rel="stylesheet" type="text/css">

    <!--annotator cs-->
    <link href="<?php echo Yii::$app->homeUrl;?>css/annotator.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<style type="text/css">
    .resetallthem {
        all:initial;
        * {
            /*all:unset;*/
        }
    }


</style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!--<img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />-->
                            <!-- Light Logo icon -->
                            <!--<img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                            <!--<img src="http://167.71.254.111/assets/images/background/tubitak_logo.png" alt="homepage" class="light-logo" style="width:40px;"/>-->
                            <img src="<?php echo Yii::$app->homeUrl;?>assets/images/background/tubitak_logo_white_3.png" alt="homepage" class="light-logo" style="width:80%;"/>

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!--
                        <span>
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>-->
                 </a>
                         
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Önceki</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Sonraki</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/user.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <!--<div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>-->
                                            <div class="u-text">
                                                <h4><?php echo Yii::$app->user->identity->user_name." ".Yii::$app->user->identity->user_surname;?></h4>
                                                <p class="text-muted"><?php echo Yii::$app->user->identity->user_email;?></p>
                                                <!--<a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>-->
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <!--<li><a href="#"><i class="ti-user"></i> My Profile</a></li>-->
                                    <li><a href="#"><i class="ti-wallet"></i> Ödemeler</a></li>
                                    <!--<li><a href="#"><i class="ti-email"></i> Inbox</a></li>-->
                                    <!--<li role="separator" class="divider"></li>-->
                                    <li><a href="#"><i class="ti-settings"></i> Ayarlar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/site/logout"><i class="fa fa-power-off"></i> Çıkış</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-tr">
                                
                        </i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> 
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a> 
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->

                <!--<div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">-->
                    <!-- User profile image -->
                    <!--<div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" /> </div>-->
                    <!-- User profile text-->
                    
                    <!--<div class="profile-text">-->

                        <!--<a href="#" role="button" aria-haspopup="true" aria-expanded="true"><?php echo Yii::$app->user->identity->user_name; ?></a>-->
                        <!--
                        <div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a> <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> <a href="/site/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> 
                        </div>
                        -->
                    <!--</div>-->
                <!--</div>-->
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li class="active"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Görevler </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="active">
                                    <a class="active" href="/site/mytasks">
                                        <span class="label label-rounded label-danger">10</span>                                        
                                        Bekleyen Görevler
                                    </a>
                                </li>
                                <li>
                                                                        
                                    <a href="/site/completedtasks"><span class="label label-rounded label-success">10</span>Tamamlanan Görevler</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Template Demos</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../minisidebar/index.html">Minisidebar</a></li>
                                <li><a href="../horizontal/index2.html">Horizontal</a></li>
                                <li><a href="../dark/index3.html">Dark Version</a></li>
                                <li><a href="../material-rtl/index4.html">RTL Version</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Apps</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-calendar.html">Calendar</a></li>
                                <li><a href="app-chat.html">Chat app</a></li>
                                <li><a href="app-ticket.html">Support Ticket</a></li>
                                <li><a href="app-contact.html">Contact / Employee</a></li>
                                <li><a href="app-contact2.html">Contact Grid</a></li>
                                <li><a href="app-contact-detail.html">Contact Detail</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Inbox</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-email.html">Mailbox</a></li>
                                <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                                <li><a href="app-compose.html">Compose Mail</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Ui Elements</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-user-card.html">User Cards</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-tab.html">Tab</a></li>
                                <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                                <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                                <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                                <li><a href="ui-notification.html">Notification</a></li>
                                <li><a href="ui-progressbar.html">Progressbar</a></li>
                                <li><a href="ui-nestable.html">Nestable</a></li>
                                <li><a href="ui-range-slider.html">Range slider</a></li>
                                <li><a href="ui-timeline.html">Timeline</a></li>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                                <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                                <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                                <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                                <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                                <li><a href="ui-list-media.html">List Media</a></li>
                                <li><a href="ui-ribbons.html">Ribbons</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                                <li><a href="ui-carousel.html">Carousel</a></li>
                                <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                                <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Forms</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Basic Forms</a></li>
                                <li><a href="form-layout.html">Form Layouts</a></li>
                                <li><a href="form-addons.html">Form Addons</a></li>
                                <li><a href="form-material.html">Form Material</a></li>
                                <li><a href="form-float-input.html">Floating Lable</a></li>
                                <li><a href="form-pickers.html">Form Pickers</a></li>
                                <li><a href="form-upload.html">File Upload</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-dropzone.html">File Dropzone</a></li>
                                <li><a href="form-icheck.html">Icheck control</a></li>
                                <li><a href="form-img-cropper.html">Image Cropper</a></li>
                                <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                                <li><a href="form-typehead.html">Form Typehead</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                                <li><a href="form-summernote.html">Summernote Editor</a></li>
                                <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="table-basic.html">Basic Tables</a></li>
                                <li><a href="table-layout.html">Table Layouts</a></li>
                                <li><a href="table-data-table.html">Data Tables</a></li>
                                <li><a href="table-footable.html">Footable</a></li>
                                <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                                <li><a href="table-responsive.html">Responsive Table</a></li>
                                <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="table-editable-table.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Widgets</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="widget-apps.html">Widget Apps</a></li>
                                <li><a href="widget-data.html">Widget Data</a></li>
                                <li><a href="widget-charts.html">Widget Charts</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">EXTRA COMPONENTS</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Page Layout</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="layout-single-column.html">1 Column</a></li>
                                <li><a href="layout-fix-header.html">Fix header</a></li>
                                <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                                <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                                <li><a href="layout-boxed.html">Boxed Layout</a></li>
                                <li><a href="layout-logo-center.html">Logo in Center</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Sample Pages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="starter-kit.html">Starter Kit</a></li>
                                <li><a href="pages-blank.html">Blank page</a></li>
                                <li><a href="#" class="has-arrow">Authentication <span class="label label-rounded label-success">6</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="pages-login.html">Login 1</a></li>
                                        <li><a href="pages-login-2.html">Login 2</a></li>
                                        <li><a href="pages-register.html">Register</a></li>
                                        <li><a href="pages-register2.html">Register 2</a></li>
                                        <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                        <li><a href="pages-recover-password.html">Recover password</a></li>
                                    </ul>
                                </li>
                                <li><a href="pages-profile.html">Profile page</a></li>
                                <li><a href="pages-animation.html">Animation</a></li>
                                <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                                <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-treeview.html">Treeview</a></li>
                                <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                                <li><a href="pages-search-result.html">Search result</a></li>
                                <li><a href="pages-scroll.html">Scrollbar</a></li>
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                                <li><a href="pages-gallery.html">Gallery</a></li>
                                <li><a href="pages-faq.html">Faqs</a></li>
                                <li><a href="#" class="has-arrow">Error Pages</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="pages-error-400.html">400</a></li>
                                        <li><a href="pages-error-403.html">403</a></li>
                                        <li><a href="pages-error-404.html">404</a></li>
                                        <li><a href="pages-error-500.html">500</a></li>
                                        <li><a href="pages-error-503.html">503</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Charts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="chart-morris.html">Morris Chart</a></li>
                                <li><a href="chart-chartist.html">Chartis Chart</a></li>
                                <li><a href="chart-echart.html">Echarts</a></li>
                                <li><a href="chart-flot.html">Flot Chart</a></li>
                                <li><a href="chart-knob.html">Knob Chart</a></li>
                                <li><a href="chart-chart-js.html">Chartjs</a></li>
                                <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                <li><a href="chart-extra-chart.html">Extra chart</a></li>
                                <li><a href="chart-peity.html">Peity Charts</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-brush"></i><span class="hide-menu">Icons</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="icon-material.html">Material Icons</a></li>
                                <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                <li><a href="icon-themify.html">Themify Icons</a></li>
                                <li><a href="icon-linea.html">Linea Icons</a></li>
                                <li><a href="icon-weather.html">Weather Icons</a></li>
                                <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                                <li><a href="icon-flag.html">Flag Icons</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Maps</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="map-google.html">Google Maps</a></li>
                                <li><a href="map-vector.html">Vector Maps</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.1</a></li>
                                <li><a href="#">item 1.2</a></li>
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">item 1.3.1</a></li>
                                        <li><a href="#">item 1.3.2</a></li>
                                        <li><a href="#">item 1.3.3</a></li>
                                        <li><a href="#">item 1.3.4</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">item 1.4</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="/site/logout" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">GÖREVLER</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Görevler</a></li>
                            <li class="breadcrumb-item active">Bekleyen görevler</li>
                        </ol>
                    </div>
                    <!--
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                        -->
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div style="width:100%">
                        <!-- Row -->
                        <div class="row">
                            <!-- Column -->
 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                            <!--<a class="btn-close" data-action="close"><i class="ti-close"></i></a>-->
                                        </div>
                                        <h4 class="card-title m-b-0"><span class="round round-info">1</span> Bekleyen görevler</h4>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="table-responsive">
                                            <table class="table product-overview">
                                                <thead>
                                                    <tr>
                                                        <th>Proje No</th>
                                                        <th>Proje Türü</th>
                                                        <th>Proje Başlığı</th>
                                                        <th>Panel Tarihi/Saati</th>
                                                        <th>Görev Durumu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($all_proposals as $proposal) { ?>
                                                    <tr>
                                                        <td><?php echo $proposal->userproposalProposal->proposal_no; ?></td>
                                                        <td>
                                                            <!--<img src="../assets/images/gallery/chair.jpg" alt="iMac" width="80">-->
                                                            <?php echo $proposal->userproposalProposal->proposal_type; ?>
                                                        </td>
                                                        <td><?php echo $proposal->userproposalProposal->proposal_title; ?></td>
                                                        <td>Diğer aşamalarda belirlenecektir!<!--<?php print_r($proposal->userproposal_available_time);?>--></span></td>
                                                        <td>
                                                            <a href="/site/mytasks?proposal_id=<?php echo $proposal->userproposalProposal->proposal_id; ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Kabul"><i class="mdi mdi-checkbox-marked-circle-outline"></i></a> <a href="/site/userproposalacceptancestatus?userproposal_acceptance_status=Ret&userproposal_proposal_id=<?php echo $proposal->userproposalProposal->proposal_id; ?>" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Ret"><i class="mdi mdi-close-octagon-outline"></i></a>
                                                            <span class="label label-<?php echo Helper::helperStatus($proposal->userproposal_acceptance_status);?>
                                                             font-weight-100"><?php echo $proposal->userproposal_acceptance_status;?></span>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php  } ?>
                                                    <!--
                                                    <tr>
                                                        <td>119K450</td>
                                                        <td>
                                                            3501
                                                           <img src="../assets/images/gallery/chair2.jpg" alt="iPhone" width="80">
                                                        </td>
                                                        <td>Bilimsel ve Teknolojik Bilgi Üretiminin Oyun Teorisi ve Dinamik Sistemler ile Modellenmesi</td>
                                                        <td>09-7-2017</td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Kabul"><i class="mdi mdi-checkbox-marked-circle-outline"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Ret"><i class="mdi mdi-close-octagon-outline"></i></a>
                                                            <span class="label label-warning font-weight-100">Bekliyor</span>
                                                        </td>
                                        
                                                    </tr>
                                                    <tr>
                                                        <td>118K430</td>
                                                        <td>
                                                            <img src="../assets/images/gallery/chair3.jpg" alt="apple_watch" width="80">
                                                            1001
                                                        </td>
                                                        <td>Madde bağımlılığı İle Mücadelede Dini Lider Eğitici Eğitimi Programının Farkındalık Oluşturma Ve Öz Yeterlik Üzerine Etkisi</td>
                                                        <td>08-7-2017</td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Kabul"><i class="mdi mdi-checkbox-marked-circle-outline"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Ret"><i class="mdi mdi-close-octagon-outline"></i></a>
                                                            <span class="label label-warning font-weight-100">Bekliyor</span>
                                                        </td>
                                                  
                                                    </tr>
                                                    <tr>
                                                        <td>117K450</td>
                                                        <td>
                                                            1005
                                                            <img src="../assets/images/gallery/chair4.jpg" alt="mac_mouse" width="80">
                                                        </td>
                                                        <td>Artırılmış-Sanal Gerçeklik Uygulamaları ile Ortaöğretim Öğrencilerinin Üst Düzey Soru Çözme Becerilerinin Geliştirilmesi ve PISA Başarılarının Artırılması: Konya İli Örneği</td>
                                                        <td>02-7-2017/18:40</td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Kabul"><i class="mdi mdi-checkbox-marked-circle-outline"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Ret"><i class="mdi mdi-close-octagon-outline"></i></a>
                                                            <span class="label label-danger font-weight-100">Süresi Geçti</span>
                                                        </td>
                                                      
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-md-12">
                            <!--<div class="">-->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-<?php if ($selected_proposal->proposal_id){echo "minus";}else {echo "plus";} ?>"></i></a>
                                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                            <!--<a class="btn-close" data-action="close"><i class="ti-close"></i></a>-->
                                        </div>
                                        <h4 class="card-title m-b-0"><span class="round round-info">2</span> Görev Aşamaları</h4>
                                    </div>
                                    <div class="card-body collapse <?php if ($selected_proposal->proposal_id && isset($selected_userproposal)){
                                        if($selected_userproposal->userproposal_step<=1)
                                        echo "show";

                                    } ?>">
                                        <!--validation vwvizar begin-->
                <!-- Validation wizard -->
                <div class="row">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <!--<h4 class="card-title">Step wizard with validation</h4>
                                <h6 class="card-subtitle">You can us the validation like what we did</h6>-->
                               <form action="#" id="validation-wizard" class="validation-wizard wizard-circle">


                                     <!-- Step 4 -->
                                    <h6>Danışmanların Uyması Gereken İlke ve Etik Kurallar</h6>
                                    <section style="white-space: pre-wrap;">

Proje önerileri bilimsel kural ve kriterler çerçevesinde objektif olarak değerlendirilmeli, fırsat eşitliği, kişisel ya da kurumsal ilişkiler ve yorumlar dikkate alınmamalıdır.
Proje ekibinde bulunan bir kişi ile çıkar çatışması varsa değerlendirme yapılmamalıdır. Bu gibi durumlarda, ilgili Araştırma Destek Grubuna ivedilikle bilgi verilmelidir. Çıkar çatışması olarak yorumlanabilecek ilişki ve durumlar <b>aşağıda</b> belirtilmektedir:

    a. Tez hocası veya öğrencisi olmak,

    b. Son üç yıl içinde makale, tebliğ, proje ve kitap gibi ortak çalışma yapmış, yapmakta veya yakın gelecekte yapacak olmak,

    c. Aynı kurumda çalışıyor olmak veya yakın gelecekte çalışmaları muhtemel olmak,

    d. Proje önerisi hakkında görüş bildirmiş olmak ve/veya projenin hazırlanmasına herhangi bir katkıda bulunmuş olmak,

    e. Daha önce yargıya intikal eden ihtilaflarda taraf olmak,

    f. Akraba olmak ya da akraba veya boşanmış olsalar bile 3.derece dahil kan bağıyla veya 2. derece dahil sıhri hısım olmak,

    g. Tarafsız davranmayı önleyecek derecede olumlu veya olumsuz düşünceye sahip olmak.

Proje önerisi ile ilgili her türlü bilginin (proje danışmanının ismi, danışmanın değerlendirme veya görüşleri, vb.) ve kendileriyle TÜBİTAK arasında yapılan yazışma ve görüşmelerin gizli olduğu bilinerek bu gizliliğe uygun davranılmalıdır.
Proje önerisinin içeriği ile ilgili bilgiler üçüncü kişilere aktarılmamalı ve başkaları tarafından kullanılma olasılığı engellenmelidir.
Proje önerisinin içeriği şahsi amaçlarla kullanılmamalı; elektronik ortamdaki bilgi, yazılı bilgi, bilgi notu, değerlendirme, çalışma ve görüş notları görev tamamlanınca imha edilmelidir.
Proje önerisinin değerlendirilmesiyle ilgili bilgiler hiçbir zaman proje yürütücüsü ve ekibinden (araştırmacı, danışman, bursiyer) herhangi birine aktarılmamalıdır.
Proje önerisi değerlendirmelerinde olumlu ve olumsuz görüşler gerekçelendirilmeli ve bu görüşler Araştırma Destek Grubunun yürütücülere yazılı olarak bildirebileceği şekilde hazırlanmalıdır.
Proje ekibinde yer alan kişilerin aynı veya benzer içerikli projelerinin, ulusal veya uluslararası başka bir kurum veya kuruluşa da sunulmuş olduğunun/başka bir kurum/kuruluş tarafından da desteklenmekte/desteklenmiş olduğunun ya da bilimsel etik kurallara aykırı farklı bir durumun tespiti halinde ilgili Araştırma Destek Grubu yazılı olarak bilgilendirilmeli ve formun “Diğer Görüşler” kısmında bu hususa yer verilmelidir.

                                    </section>                                
                                    <!-- Step 1 -->
                                    <h6>Proje Ekibi</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
<!--proje ekibi begin-->
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-20">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Ad/Soyad/Unvan</th>
                                                <th>Kurum/Kuruluş</th>
                                                <th>Projedeki görevi</th>
                                                <th>Katkı Payı</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="active">
                                                <td><span class="round"><img src="../assets/images/users/2.jpg" alt="user" width="50" /></span></td>
                                                <td>
                                                    <h6>Selda Çayırlıbelek</h6><small class="text-muted">Prof. Dr.</small></td>
                                                <td>Bilkent Üniversitesi</td>
                                                <td><span class="label label-danger">Project Yürütücüsü</span></td>
                                                <td>%100</td>
                                            </tr>                                            
                                            <tr>
                                                <td><span class="round round-primary">A</span></td>
                                                <td>
                                                    <h6>Egemen Taşkın</h6><small class="text-muted">Dr. Öğr. Üyesi</small></td>
                                                <td>Gazi Üniversitesi</td>
                                                <td><span class="label label-success">Araştırmacı</span></td>
                                                <td>%40</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-primary">A</span></td>
                                                <td>
                                                    <h6>Mahzun Demirlibahçe</h6><small class="text-muted">Doç. Dr.</small></td>
                                                <td>ODTÜ</td>
                                                <td><span class="label label-success">Araştırmacı</span></td>
                                                <td>%40</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-primary">A</span></td>
                                                <td>
                                                    <h6>Serkan Fatih Orakçı</h6><small class="text-muted">Doç. Dr.</small></td>
                                                <td>YTÜ</td>
                                                <td><span class="label label-success">Araştırmacı</span></td>
                                                <td>%20</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-warning">D</span></td>
                                                <td>
                                                    <h6>Nevzat Yavuz</h6><small class="text-muted">Dr.</small></td>
                                                <td>Ankara Üniversitesi</td>
                                                <td><span class="label label-warning">Danışman</span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
<!--proje ekibi end-->
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Proje Özeti</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-info ribbon-right">Özet</div>
                                    <p class="ribbon-content" style="white-space: pre-wrap;">

                                        <?php print_r(base64_decode($proposal_body['proposal']['project summary tr']));?>
                                    </p>
                                </div>
                                            </div>
                                        </div>
                                    </section>
                                       <!-- Step 3 -->
                                    <h6>Toplanma Tarih ve Saati</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                    <!--<div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Drag and Drop Your Event</h4>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar-events" class="m-t-20">
                                            <div class="calendar-events" data-class="bg-info">
                                                <i class="fa fa-circle text-info"></i> My Event One</div>
                                            <div class="calendar-events" data-class="bg-success">
                                                <i class="fa fa-circle text-success"></i> My Event Two</div>
                                            <div class="calendar-events" data-class="bg-danger">
                                                <i class="fa fa-circle text-danger"></i> My Event Three</div>
                                            <div class="calendar-events" data-class="bg-warning">
                                                <i class="fa fa-circle text-warning"></i> My Event Four</div>
                                        </div>
                                        
                                        <div class="checkbox">
                                            <input id="drop-remove" type="checkbox">
                                            <label for="drop-remove">
                                                Remove after drop
                                            </label>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn btn-lg m-t-40 btn-danger btn-block waves-effect waves-light">
                                            <i class="ti-plus"></i> Add New Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                                            </div>

                                        </div>
                                    </section>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<!--validation wizard end-->





                                    </div>
                                </div>
                            </div>
                            <!-- Column -->



                            <div class="col-md-12">
                            <!--<div class="">-->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-actions">
                                            <a class="" data-action="collapse"><i class="ti-<?php if ($selected_proposal->proposal_id){echo "minus";}else {echo "plus";} ?>"></i></a>
                                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                            <!--<a class="btn-close" data-action="close"><i class="ti-close"></i></a>-->
                                        </div>
                                        <h4 class="card-title m-b-0"><span class="round round-info">3</span> Proje Önerisi</h4>
                                    </div>
                                    <div class="card-body collapse <?php if ($selected_proposal->proposal_id){echo "show";} ?>">

                <!-- ============================================================== -->
                <!-- Second Card with Nested Nav -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Proje Önerisi</h4>
                        <div class="row">
                            <div class="col-2">
                              <nav id="navbar-example3" class="navbar navbar-light flex-column">
                                <a class="navbar-brand text-muted" href="#">Navbar</a>
                                <nav class="nav nav-pills flex-column">

                                <?php $i=0;
                                if($proposal_body)
                                {
                                foreach ($proposal_body['proposal']['titles'] as $title) 
                                {
                                    $i++;$j=0; 
                                    echo '<a class="nav-link" href="#item-'.$i.'">'.$i.')'.$title['title'].'</a>';
                                    if(is_array($title['content'])){
                                    if(sizeof($title['content'])>0)
                                    {   
                                    echo '<nav class="nav nav-pills flex-column">'; 
                                        foreach ($title['content'] as $subtitle) {
                                            $j++;
                                            echo '<a class="nav-link ml-3 my-1" href="#item-'.$i.'-'.$j.'">'.$i.'.'.$j.')'.$subtitle['title'].'</a>';
                                        }
                                        echo '</nav>';
                                    }
                                }

                                    # code...
                                }

//addition begin
                                foreach ($proposal_body['addition'] as $addition) 
                                {
                                    $i++;$j=0; 
                                    echo '<a class="nav-link" href="#item-'.$i.'">'.$addition['title'].'</a>';
                                    if(is_array($addition['content'])){
                                    if(sizeof($addition['content'])>0)
                                    {   
                                    echo '<nav class="nav nav-pills flex-column">'; 
                                        foreach ($addition['content'] as $subaddition) {
                                            $j++;
                                            echo '<a class="nav-link ml-3 my-1" href="#item-'.$i.'-'.$j.'">'.$subaddition['title'].'</a>';
                                        }
                                        echo '</nav>';
                                    }
                                }

                                    # code...
                                }
//addition end



                            }
                                ?>
<!--
                                  <a class="nav-link" href="#item-1">1)KONUNUN ÖNEMİ VE ÖZGÜN DEĞERİ</a>
                                  <a class="nav-link" href="#item-2">2)ARAŞTIRMA SORUSU VEYA HİPOTEZİ İLE AMACI ve HEDEFİ</a>
                                  <a class="nav-link" href="#item-3">3)YÖNTEM</a>
                                 <a class="nav-link" href="#item-4">4)PROJE YÖNETİMİ</a>
                                  <nav class="nav nav-pills flex-column">
                                    <a class="nav-link ml-3 my-1" href="#item-4-1">4.1)IYönetim Düzeni: İş Paketleri (İP), Görev Dağılımı ve Süreleri</a>
                                    <a class="nav-link ml-3 my-1" href="#item-4-2">4.2)Risk Yönetimi</a>
                                  </nav>
                                 <a class="nav-link" href="#item-5">5)YAYGIN ETKİ</a>
-->
                                </nav>
                              </nav>
                            </div>
                            <div class="col-10">
                              <div data-spy="scroll" id="scroll" data-target="#navbar-example3" data-offset="0" class="position-relative mt-4" style="height: 1200px;overflow: auto;">
                                <div class="resetallthem">
                                <?php 
                                if($proposal_body)
                                {    
                                    $i=0;
                                    foreach ($proposal_body['proposal']['titles'] as $title) {
                                    $i++;$j=0; 
                                    echo '<h4 id="item-'.$i.'">'.$i.')'.$title['title'].'</h4>';

                                    if(is_array($title['content'])){
                                    foreach ($title['content'] as $subtitle) {
                                        $j++;
                                        echo '<h5 id="item-'.$i.'-'.$j.'">'.$i.'.'.$j.')'.$subtitle['title'].'</h5>';# code...
                                        echo '<p>'.base64_decode($subtitle['content']).'</p>';
                                    }
                                }
                                    else
                                        {
                                            echo '<p>'.base64_decode($title['content']).'</p>';
                                        }
                                }


//addition begin
                                    foreach ($proposal_body['addition'] as $addition) {
                                    $i++;$j=0; 
                                    echo '<h4 id="item-'.$i.'">'.$i.')'.$addition['title'].'</h4>';

                                    if(is_array($addition['content'])){
                                    foreach ($addition['content'] as $subaddition) {
                                        $j++;
                                        echo '<h5 id="item-'.$i.'-'.$j.'">'.$i.'.'.$j.')'.$subaddition['title'].'</h5>';# code...
                                        echo '<p>'.base64_decode($subaddition['content']).'</p>';
                                    }
                                }
                                    else
                                        {
                                            echo '<p>'.base64_decode($addition['content']).'</p>';
                                        }
                                }                                
//addition end

                            }
                                    # code...
                                ?>
                                <?php //print_r(base64_decode($proposal_body['proposal']['titles'][0]['content'][0]['content']));?>

                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>



                                    </div>
                                </div>
                            </div>





<!--column ends-->






                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== --> 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 PYS by egemen taşkın
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
<!-- BEGIN MODAL -->
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">
                                    <strong>Add Event</strong>
                                </h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">
                                    <strong>Add</strong> a category</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->

 <?//php print_r(base64_decode($proposal_body['proposal']['project summary tr']));?>


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/popper/popper.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl;?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo Yii::$app->homeUrl;?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo Yii::$app->homeUrl;?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl;?>js/custom.min.js"></script>

    <!--annotator js ve css-->
    <link rel="gettext" type="application/x-po" href="<?php echo Yii::$app->homeUrl;?>locale/tr/annotator.po">
    <script src="<?php echo Yii::$app->homeUrl;?>js/Gettext.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>js/annotator-full.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

    <!--c3 JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/d3/d3.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <!--<script src="<?php echo Yii::$app->homeUrl;?>js/dashboard6.js"></script>-->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


   <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/moment/moment.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/wizard/jquery.steps.js"></script>
    <!--<script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/wizard/jquery.validate.min.js"></script>-->

        <!-- chartist chart -->
<!--
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
-->

    <!-- Calendar JavaScript -->
  
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/moment/moment.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/jquery-ui.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/dist/fullcalendar.min.js"></script>
    <!--<script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/dist/cal-init.js"></script>-->


        <script>

$( document ).ready(function() {


//$('body').annotator().annotator('setupPlugins');

//$('body').annotator().annotator('addPlugin', 'Store');
//var ann = new Annotator(document.body); 


/*$('body').annotator('addPlugin', 'Store', {
  urls: {
    // These are the default URLs.
    create:  '/annotations',
    update:  '/annotations/:id',
    destroy: '/annotations/:id',
    search:  '/search'
  }
});*/

Annotator.Plugin.StoreLogger = function (element) {
  return {
    pluginInit: function () {
      this.annotator
          .subscribe("annotationCreated", function (annotation) {
            console.info("The annotation: %o has just been created!", annotation)
          })
          .subscribe("annotationUpdated", function (annotation) {
            console.info("The annotation: %o has just been updated!", annotation)
          })
          .subscribe("annotationDeleted", function (annotation) {
            console.info("The annotation: %o has just been deleted!", annotation)
          });
    }
  }};

window.annotation = $('#scroll').annotator();
/*window.user_colors = [
  "red",
  "blue",
  "green"
];*/

window.user_colors=[];
 <?php if($userproposal_colors)foreach ($userproposal_colors as $userproposal_color) {

    echo "window.user_colors['".$userproposal_color->userproposalUser->user_id."']='".$userproposal_color->userproposalUser->user_color."';";
     }?>

 //var id=12345
 window.annotationParameters={
    prefix: '/annotation',
    loadFromSearch : {
        page_id : '<?php echo $selected_proposal->proposal_id;?>'
    },
    annotationData : {
        page_id : '<?php echo $selected_proposal->proposal_id;?>',
        user_id :'<?php echo Yii::$app->user->identity->user_id;?>'
    },
    urls: {
        create:  '/store',
        update:  '/update?id=:id',
        destroy: '/delete?id=:id',
        search:  '/search'
    }
  }
window.userIdGlobal='<?php echo Yii::$app->user->identity->user_id;?>';
annotation.annotator('addPlugin', 'Store', window.annotationParameters);

//setInterval(function(){console.log("every 5 seconds repeated!");window.storeController._getAnnotations();},5000);

function arrayDiffByKey(key, ...arrays) {
    return [].concat(...arrays.map( (arr, i) => {
        const others = arrays.slice(0);
        others.splice(i, 1);
        const unique = [...new Set([].concat(...others))];
        return arr.filter( x =>
            !unique.some(y => x[key] === y[key])
        );
    }));
}


setInterval(function(){
        var index;
        jQuery.ajaxSetup({async:false});
        console.log("every 5 seconds repeated!");
        var updatedAnnotations=window.storeController._getAnnotations();
        updatedAnnotations=updatedAnnotations.responseJSON.rows;
        var oldAnnoatations=window.storeController.dumpAnnotations();
        var diffResult=arrayDiffByKey('id', updatedAnnotations, oldAnnoatations);
        if(diffResult.length>0 && oldAnnoatations.length>updatedAnnotations.length)
        {


                    for (index = 0; index < diffResult.length; ++index) {
                        //window.storeController._apiRequest('destroy',diffResult[index],function(){});
                        var particule=$("#scroll").find("[data-annotation-id='"+(diffResult[index].id)+"']");
                        particule.removeClass("annotator-hl").removeAttr("style");
                        window.storeController.unregisterAnnotation(diffResult[index]);

                    }

        }
        jQuery.ajaxSetup({async:true});

    },5000);


annotation.annotator('addPlugin','StoreLogger',function () {
      this.annotator
          .subscribe("annotationCreated", function (annotation) {
            console.info("The annotation: %o has just been created!.....", annotation);
          })
          .subscribe("annotationUpdated", function (annotation) {
            console.info("The annotation: %o has just been updated!", annotation);
          })
          .subscribe("annotationDeleted", function (annotation) {
            console.info("The annotation: %o has just been deleted!", annotation);
          });
    });
//ann.setupPlugins()

        //Custom design form example
        /*$(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onFinished: function (event, currentIndex) {
                swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

            }
        });*/


$("#validation-wizard").show();

        $("#validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                next: "Sonraki",
                previous:"Önceki",
                finish: "Onayla"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                console.log(currentIndex,newIndex);
                if((newIndex+1)==4)
                {
                    console.log("calendar refresh");
                    setTimeout(function(){$("#calendar .fc-month-button").click()},1000);

                }
                return 1;
            },
            onFinishing: function (event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            },
            onFinished: function (event, currentIndex) {
                swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
            }


        });
        


//$.getScript("<?php echo Yii::$app->homeUrl;?>assets/plugins/moment/moment.js");
$.getScript("<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/jquery-ui.min.js");
//$.getScript("<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/dist/fullcalendar.min.js");
$.getScript("<?php echo Yii::$app->homeUrl;?>assets/plugins/calendar/dist/cal-init.js");
$("#calendar .fc-agendaWeek-button").click();

        });



        /*, $(".validation-wizard").validate({
            ignore: "input[type=hidden]",
            errorClass: "text-danger",
            successClass: "text-success",
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element)
            },
            rules: {
                email: {
                    email: !0
                }
            }
        })*/
    </script>

    <style type="text/css">
        .annotator-hl {
    background: <?php echo Yii::$app->user->identity->user_color;?>
    /*#48e245;*/
}
        
    </style>

</body>

</html>