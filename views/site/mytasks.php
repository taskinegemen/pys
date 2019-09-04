
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
<html lang="en">

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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
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
                <div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" /> </div>
                    <!-- User profile text-->
                    
                    <div class="profile-text"> 

                        <a href="#" role="button" aria-haspopup="true" aria-expanded="true"><?php echo Yii::$app->user->identity->user_name; ?></a>
                        <div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a> <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> <a href="/site/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>

                    </div>
                </div>
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
                                    <div class="card-body collapse <?php if ($selected_proposal->proposal_id){echo "show";} ?>">
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
                                    <section>

Proje önerileri bilimsel kural ve kriterler çerçevesinde objektif olarak değerlendirilmeli, fırsat eşitliği, kişisel ya da kurumsal ilişkiler ve yorumlar dikkate alınmamalıdır.
Proje ekibinde bulunan bir kişi ile çıkar çatışması varsa değerlendirme yapılmamalıdır. Bu gibi durumlarda, ilgili Araştırma Destek Grubuna ivedilikle bilgi verilmelidir. Çıkar çatışması olarak yorumlanabilecek ilişki ve durumlar aşağıda belirtilmektedir:
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
                                    <p class="ribbon-content">
                                        <?php echo $selected_proposal->proposal_abstract_tr ?>
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
                                  <a class="nav-link" href="#item-1">1)KONUNUN ÖNEMİ VE ÖZGÜN DEĞERİ</a>
                                  <a class="nav-link" href="#item-2">2)ARAŞTIRMA SORUSU VEYA HİPOTEZİ İLE AMACI ve HEDEFİ</a>
                                  <a class="nav-link" href="#item-3">3)YÖNTEM</a>
                                 <a class="nav-link" href="#item-4">4)PROJE YÖNETİMİ</a>
                                  <nav class="nav nav-pills flex-column">
                                    <a class="nav-link ml-3 my-1" href="#item-4-1">4.1)IYönetim Düzeni: İş Paketleri (İP), Görev Dağılımı ve Süreleri</a>
                                    <a class="nav-link ml-3 my-1" href="#item-4-2">4.2)Risk Yönetimi</a>
                                  </nav>
                                 <a class="nav-link" href="#item-5">5)YAYGIN ETKİ</a>

                                </nav>
                              </nav>
                            </div>
                            <div class="col-10">
                              <div data-spy="scroll" data-target="#navbar-example3" data-offset="0" class="position-relative mt-4" style="height: 600px;overflow: auto;">
                                <h4 id="item-1">1)KONUNUN ÖNEMİ VE ÖZGÜN DEĞERİ</h4>
                                <p>Bu projenin konusu, Türk- İslam kültürünün baş yapıtlarından biri olan “Kutadgu Bilig’in disiplinlerarası okuması”dır. Kutadgu Bilig (1069), Karahanlı Devleti (932-1212) zamanında Balasagunlu Yusuf (Yusuf Has Hacib) tarafından ortaya konan ilk Türk-İslam eseridir (Dilaçar, 2016: 13). Balasagunlu Yusuf, Kutadgu Bilig’i yazarken eski Türk geleneklerine sıkı sıkıya bağlı kalmış, bu kitabı bir töre ve yasa kitabı olarak düzenlemiştir (Dilaçar, 2016: 28-29). Türk kültüründen unsurlar içeren, Türk atasözleri ve hikmetli sözlerle yoğrulmuş olan Kutadgu Bilig, birçok açıdan ele alınabilecek çok yönlü ve hacimli bir metindir. 
Yusuf Has Hacib’in 1069’da Karahanlı Türkçesi ile kaleme aldığı, İslami Türk edebiyatının ilk eseri sayılan Kutadgu Bilig, bir el kitabı hüviyetinde olup ferdî hayattan aile hayatına, toplumsal hayattan devlet yönetimine kadar pek çok konuyu ihtiva etmekte ve tür olarak da Türk edebiyatında ilk siyasetnâme olarak kabul edilmektedir (Kalkışım, 2013: 93). Türk düşünce tarihinin önemli kaynaklarından biri ve Türk dilinde yazılan ilk İslami eser olan Kutadgu Bilig, her ne kadar esas itibarıyla hükümdara önerilerde bulunmak amacıyla yazılmış bir siyasetname örneği olarak telakki edilse de, Kutadgu Bilig’de hükümdara yönelik öneriler, salt devlet yönetimi ile sınırlı değildir. Toplumsal hayatın her alanına ilişkin olan öneriler, bir anlamda toplumun genelinde belirli düzenlemeler gerçekleştirilmeden devlet yapısında düzenlemelere gidilmesinin uygun olmayacağını, dolayısıyla iktidarın salt devlet ile sınırlı olmadığını ifade etmektedir (Aydemir, 2013: 805). Sembolik bir yapı üzerine inşa edilmiş olan Kutadgu Bilig’deki dört karakter temsilî  bir nitelik taşımaktadır: Kün Toğdı “adâlet”i, Ay Toldı “saâdet”i, Ögdülmiş “akl”ı, Odgurmış “âkıbet”i temsil etmektedir (Arat, 1985: 36). Ahlâk ve siyaset felsefesi açısından bir klasik olarak nitelendirilebilecek olan bu eser, ideal bir insanda bulunması gereken özellikleri manzum bir hikâye şeklinde ortaya koymaktadır. <br><br>
Kutadgu Bilig’in üç nüshası bulunmaktadır: Bunlar Viyana, Kahire ve Fergana nüshalarıdır. Türk Dil Kurumu 1942 ve 1943 yıllarında bu nüshaların tıpkıbasımlarını yapmıştır. Reşit Rahmeti Arat, bu nüshaları karşılaştırmalı olarak ele almış ve 1947’de Kutadgu Bilig’in çeviriyazısını yayımlamıştır (Ayşegül Çakan, 2019: xi). Mesnevi nazım şekli ile yazılmış olan eser 6645 beyitten oluşmaktadır. Bununla birlıkte Yusuf Has Hacib’e ait olmayan bir mensur mukaddime ile 77 beyitlik bir manzum mukaddime bulunmaktadır. Mukaddime kısımlarında eser ve yazarı hakkındaki bilgilere değinilmektedir (Taş, 2010: 1881). “Mutluluk Veren Bilgi” anlamına gelen Kutadgu Bilig, hemen bütün tarihçilerin ittifakıyla Türk tarihinde en önemli dönüm noktası olarak nitelendirilen İslamiyet'in kabulünün, gerek şekil ve gerekse içerik bakımlarından ilk söyleyicilerinden biridir. Dolayısıyla Türk ve İslam kültürünün kaynaştığı ve bu açıdan tarihî ve sosyo-kültürel bir geçişi yansıtan kıymetli bir eserdir (Feyzioğlu, 2005: 155). Son derece zengin ve farklı okumalara elverişli olan Kutadgu Bilig din, mitoloji ve dinler tarihi, felsefe, ruhbilim, bilgi kuramı, eğitim-öğretim, aile düzeni, ahlâk, kadın, içki, atasözü bilimi, yasa ve töre bilgisi, devlet ve saray örgütü, siyaset ve diplomatlık, strateji ve taktik, tarih, coğrafya, budun bilgisi, tören ve şölen düzeni, sofra görgüsü, çocuk eğitimi, ulusal spor ve oyunlar, düş yorma, gökbilim, matematik, zooloji, edebiyat, şiir sanatı, sahne sanatı, sağlık bilgisi, aşçılık, tarım, hayvancılık ve ürünler, tecim, mal, el sanatları, maliye, para, ulaşım, halk bilimi gibi alanlarda dikkate değer veriler sunmaktadır (Dilaçar, 1988: 145).<br> <br>
Literatür taraması yapıldığında Kutadgu Bilig’in çoğunlukla dil bilgisi yönüyle çeşitli incelemelere konu edildiği görülmektedir. Daha çok fonetik, morfoloji, sentaks, etimoloji alanlarına dair çalışmalar mevcuttur. Dönmez’in ifade ettiği gibi “Kutadgu Bilig, bir ayağı Türk dünyasına bir ayağı İslamî esaslara dayanan özgün bir eserdir. Elimizdedir. Malumumuzdur. Ancak esefle bildirmek gerekir ki, henüz farklı cephelerden ele alınmak suretiyle tatmin edici bir incelemeye tabi tutulmamıştır. Öyle ki, Müslümanlaşan Türklerin düşünce dünyasındaki değişmeler ve İslam sonrası Türk tefekkürü, İslam öncesine göre daha çok ilgi duyulan bir dönem olmasına rağmen, İslamlaşma sürecinin bir ürünü olan Kutadgu Bilig üzerine yapılan araştırmalar, maalesef, sınırlı kalmıştır. Son dönemlerde dikkat çeken birkaç sıra dışı “okuma” istisna edilirse, Türk tefekkürünün belkemiği mesabesinde olan pek çok diğer “malum eser” gibi, Kutadgu Bilig’in de payına düşen daha çok kütüphane raflarında unutulmak olmuştur” (2013: 66). Ancak Gümüş’ün de belirttiği gibi (2015: 597) bundan sonra yapılacak çalışmalar daha çok eserin mesajı, işlevi ve söylemi üzerine olmalıdır. Yapılacak bu tür incelemeler Türk kültüründeki süreklilik olgusunu açığa çıkaracak, toplumsal zihniyetin belirlenmesine yardımcı olacaktır. Böylelikle Türk kültür evreni içerisinde tarihsel metinlerimizin önemi vurgulanmış olacaktır. “Bu noktada, dilin sadece gramer incelemelerinin değil, genel olarak toplumsal bilimlerin temel faaliyet alanı olarak da değerlendirilmesi gerekmektedir.” (Aydemir 2013: 804). Dolayısıyla yapılacak çalışmalar bu eseri tanıtmanın ve önemini vurgulamanın ötesine geçerek, eseri disiplinlerarası bir bakış açısıyla derinlemesine incelemek şeklinde gerçekleşmelidir. <br> <br>
Bunun yanında Kutadgu Bilig’i halk kültürü ve kültür tarihi bakımından bütüncül bir yaklaşımla ele alan müstakil bir çalışma bulunmamaktadır. Yapılan çalışmalarda Kutadgu Bilig sadece bir yönü ile ele alınarak değerlendirilmiştir: Ahat Üstüner “Kutadgu Bilig’de Atasözleri” başlıklı makalesinde (1991) Kutadgu Bilig’deki atasözlerini tespit ederek değerlendirmiştir. Mustafa Ünal 1998 yılında yayınladığı “Kutadgu Bilig ve Divanü Lügat-it Türk’deki Halk İnanışlarına Fenomenolojik Bir Bakış” makalesinde, dinler tarihi, inanç ve uygulamalar bağlamında Kutadgu Bilig’e temas etmiştir. Fahri Dağı “Türk Halk Anlatılarında Halk Hekimliği Üzerine Bir Araştırma” adlı doktora tezinde (2013) ve bu tezden ürettiği “İlk İslami Türk Metinlerinde (Kutadgu Bilig, Divânü Lûgati’t Türk, Atebetü’l-Hakâyık, Divân-ı Hikmet) Halk Hekimliği” makalesinde (2017) Kutadgu Bilig’deki halk hekimliği konusuna temas etmiştir. Döner Çot “Kutadgu Bilig’de Mitoloji” adlı yüksek lisans tezinde (2011) Kutadgu Bilig’deki mitolojik unsurları tespit ederek değerlendirmiştir. Zafer Önler ise “Kutadgu Bilig’de Toplumsal Kabul ve Geleneklerden Yansımalar” başlıklı makalesinde (2008)  kadına bakış, çocuklar ve çocuğun eğitimi, ziyafet ve benzeri gelenekleri ele almıştır. Süleyman Dönmez ve Şemseddin Koçak’ın birlikte hazırladıkları “Kutadgu Bilig’de Çocuk Eğitimi” başlıklı makalede (2018) çocuk eğitimi açısından Kutadgu Bilig ele alınmıştır. Nesrin Feyzioğlu, “Geçiş Döneminin Kutadgu Bilig'deki Yansımaları Üzerine Bir Değerlendirme” başlıklı makalesinde (2005) Kutadgu Bilig’in yazıldığı dönem, eski- yeni unsurlar ve özellikler, yeni bakış açsı ve yaklaşımlar bağlamında geçiş dönemini temsil eden bir eser olarak ele almış ve değerlendirmiştir. Zekiye Gizem Debreli, “Kutadgu Bilig’de Kadın” adlı makalesini 2016 yılında yayınlamış ve Yusuf Has Hacip’in “kadın” ile ilgili görüşlerini özetlemiştir. Fatih Kaya ve Erdal Akpınar’ın birlikte hazırladıkları  “Kutadgu Bilig'de Türk Yemek Adabı ve Kültürü” başlıklı makalede (2017) Türk yemek adabı ve kültürü ile ilgili Kutadgu Bilig’de var olan beyitler belirlenerek değerlendirilmiştir. Varis Çakan “Yusuf Has Hâcip’in Türk Düşünce Tarihi’ndeki Yeri” başlıklı makalesini 2017 yılında yayınlamış Kutadgu Bilig’deki kahramanların tasvirinden ve onlardan nakledilen ahlâkî ve felsefî görüşlerden hareketle değerlendirme yapmıştır. Kemal Beslen 1985 yılında “Kutadgu Bilig’de Eğitim” başlıklı tezinde Sait Başer 1990 yılında yayınladığı “Kutadgu Bilig’de Kut ve Töre” adlı kitabında, Umay Günay 1993 yılında yayınladığı “Kutadgu Bilig ve Kültür Değişmesi” başlıklı makalesinde Kutadgu Bilig’i farklı yönlerden ele almışlardır.<br> <br>
Yapılan çalışmalar hiç şüphesiz bunlarla sınırlı değildir. Yukarıda zikredilen çalışmalardan da anlaşılacağı gibi Kutadgu Bilig’i bütüncül bir yaklaşımla kültürel açıdan ele alan müstakil bir çalışma yoktur, mevcut çalışmalar ise sınırlı ve yetersizdir. Yapılan çalışmalar Kutadgu Bilig’i sadece bir yönü ile veya tek bir motif ve unsurdan hareketle konu edinmiştir. Oysaki bu projedeki en önemli amaç, Kutadgu Bilig’i disiplinlerarası bir bakış açısıyla, bütüncül bir yaklaşımla derinlemesine incelemektir. Kutadgu Bilig, metin merkezli, yapısal ve işlevsel yöntemlerle ele alınarak Türk Kültür Tarihine katkı sunulacaktır.
Kutadgu Bilig ile ilgili çalışmaların bilbiyografyasını hazırlayan ve bu çalışmasını düzenli aralıklarla güncelleyen Uçar’ın (2019: 140) da belirttiği gibi UNESCO’nun 2019’u Kutadgu Bilig yılı ilan etmesiyle birlikte 2019 yılında Kutadgu Bilig hakkında yeni çalışmaların artması beklenmektedir. Bilindiği gibi Kutadgu Bilig hakkındaki ilk çalışma Fransız şarkiyatçı Pierre Amédée JAUBERT tarafından 1825 yılında yapılmıştır ve 1825’ten 2018 yılına kadar Kutadgu Bilig’le ilgili yapılmış çalışmaların sayısı 1118’dir (Uçar, 2019). Sadece Türkiye’de değil Orta Asya’da, Rusya’da, Avrupa’da, Amerika’da ve Çin’de birçok araştırmaya konu olan Kutadgu Bilig (Bkz. Jamal ve Kafkasyalı: 2016) artık dünya çapında bilinen bir eser hâlini almıştır. Bu çalışmalar da göstermektedir ki, Kutadgu Bilig, asırlardır güncelliğini koruyan bir eser olmakla birlikte, eserin Yusuf Has Hacib tarafından yazılışının 950. yıl dönümü (1069) UNESCO’nun 30 Ekim-14 Kasım 2017 tarihlerinde gerçekleştirilen 39. Genel Konferansı’nda 39 C/15 sayılı belgesi çerçevesinde alınan karar gereğince “Kutadgu Bilig’in Yusuf Has Hacib tarafından Yazılışının 950. Yıl Dönümü” Azerbaycan ve Kazakistan’ın desteğiyle 2019 UNESCO Anma ve Kutlama Yıl Dönümleri arasına alınmıştır (UNESCO Türkiye Millî Komisyonu, 2019). Bu yıl içerisinde literatüre yeni bir bakış açısıyla katkı sağlayacak çalışmalar konunun güncelliğini de hem akademik alanda destekleyecek hem de kamuoyunda farkındalık yaratılmasına katkı sağlayacaktır. Bu bağlamda “Kutadgu Bilig Üzerine Disiplinlerarası Okumalar” adlı bu projenin Kutadgu Bilig araştırmalarına katkı sunacağı düşünülmektedir. Projede Kutadgu Bilig’in retorik yapısı, eserdeki karakterleştirme teknikleri, halk kültürü unsurları, alegorik yapı, anasır-ı erbaa (dört unsur) ve ruh sağlığı verileri üzerine incelemeler yapılacaktır. Kutadgu Bilig’i birey, toplum ve metin boyutlarıyla ortaya koymayı amaçlayan bu proje, eserin üç ana perspektifinin ortak olarak ele alındığı ve literatürdeki tek alana dayalı çalışmaların oluşturduğu eksikliği tamamlayacak ilk çalışma olması yönüyle özgün bir nitelik taşımaktadır. Bunun yanında proje neticesinde Kutadgu Bilig’in yapısal, söylemsel, edebî, sosyolojik, psikolojik ve folklorik boyutlarını ihtiva eden çok perspektifli disiplinlerarası bir çalışmanın ortaya konması planlanmaktadır. 
Projede, ruh sağlığı, halk bilimi, göstergebilim ve dilbilim disiplinlerinin ortak okumasıyla elde edilen veriler Kutadgu Bilig’in birey, toplum ve metin bakımından bütüncül bir incelemesini ortaya koyacaktır. Projenin akademik alana katkısı yanında kamuoyunda konunun farkındalığını artırmak ve Kutadgu Bilig’i gelecek nesillere kültürel bir değer olarak aktarmak için proje çıktılarının orta öğretim öğrencileriyle paylaşılması hedeflenmektedir. Elde edilen veriler, birey, toplum ve metin başlıkları altında ortaöğretim öğrencilerinin dikkatini çekecek bir anlatımla yeniden düzenlenecek; metinde verilen mesajlar ve tasvir edilen sahneler, modernize edilmiş resim ve grafiklerden oluşan bir sergi vasıtasıyla görsellerle birleştirilerek interaktif bir sunumla İzmir İl Milli Eğitim Müdürlüğü’nün öngördüğü ortaöğretim okullarındaki öğrencilerle paylaşılacaktır (Sunum yapılacak okulların sayısı “beş” olarak düşünülmüş ve daha ziyade İzmir’in dezavantajlı bölgelerindeki okulların seçilmesi yönünde karar alınmıştır). Bu noktadaki amaç metnin dört ana karakterinin temsil ettikleri değerleri (Kün Toğdı “adâlet”i, Ay Toldı “saâdet”i, Ögdülmiş “akl”ı, Odgurmış “âkıbet”i temsil eder) öğrencilere görsel uyaranlarla destekleyerek sunmak, metnin içerdiği bireysel ve toplumsal bilgiyi onlara aktarmak ve Kutadgu Bilig’in genç kuşakların dikkatine sunulmasını sağlamaktır. </p>
                                <h4 id="item-2">2)ARAŞTIRMA SORUSU VEYA HİPOTEZİ İLE AMACI ve HEDEFİ</h4>
                                <p>Kutadgu Bilig üzerine yapılan çalışmalara bakıldığında bunların genellikle “Türk düşüncesi”, “Türklerde devlet bilgisi ve siyaset anlayışı”, “Türklerde evlenme, aile ve çocuk yetiştirme geleneği”, “Türklerin ahlâk ve felsefe dünyası” gibi Türklük bilgisine has kategoriler; Kutadgu Bilig’de yer alan hikmetli sözler; askeriye, tıp, botanik ve zooloji gibi alanlara ait terimleşmeler; Türkçenin gramerine ait unsurlar ile diğer dillerden Türkçeye geçen sözcükler üzerine yapılan araştırmalar üzerinde yoğunlaştığı görülmektedir (Uçar, 2018: 139-239).  Kısaca günümüze kadar Kutadgu Bilig üzerine yapılan çalışmalar Türkçenin gramerini çıkararak, Türk kültürüne ait birtakım motifleri ortaya koymuştur. Yapılan bu çalışmaların literatürdeki bazı eksiklikleri giderdiği yadsınamaz bir gerçektir. Kutadgu Bilig, Türk diline ve kültürüne ışık tutmasının yanında zamanın hükümdarına, insanlarına birçok konuda ders ve öğüt vermeyi amaçlayan bir metindir. Söz konusu amacın gerçekleştirilmesi için metinde temsilî dört karakter kurgulanmış, onların başından geçen olaylar alegoriye başvurularak ve “kurgunun imkânlarından faydalanılarak” aktarılmıştır. Alegori ve kurgusallığın iç içe geçtiği metinde anlatısallık, karakterleştirme, zaman, mekân, olay örgüsü, söylem unsurları, retorik özellikler vb. henüz incelemeye tabi tutulmamıştır. Diğer bir deyişle metin, kurgusal bir anlatı olarak henüz ele alınmamıştır. Bu projede Kutadgu Bilig literatüründeki söz konusu eksikliğin giderilmesi amaçlanmaktadır. <br><br>

Metinde kurgulanan dört ana karakterden Kün Toğdı “adâlet”i, Ay Toldı “saâdet”i, Ögdülmiş “akl”ı, Odgurmış “âkıbet”i temsil eder. Bu temsilin alegorik bir görünüm sunmasının yanında metindeki karakterlerin sürekli birbiriyle diyalog hâlinde olduğu görülür. Bu yönüyle bir tiyatro metnini de andıran anlatıda, anlatıcı da diyalogların bağlanmasına, olayların aktarılmasına ve  yaşanan olaylardan çıkarılan derslerin sunulmasına hizmet eder. Burada ana hatlarıyla aktarılan özelliklerin ayrıntılı sonuçlarına ulaşabilmek, Kutadgu Bilig’in disiplinlerarası bir anlayışla okunmasını gerektirmektedir. Bilindiği gibi günümüzün bilimsel ortamında disiplinlerarası uygulamalar oldukça yaygınlaşmıştır. Disiplinlerarasılık terimi “tek bir disiplin ya da uzmanlık alanı tarafından layıkıyla ele alınamayacak kadar ka rmaşık ya da kapsamlı bir konunun ya da sorunun çözülmesine yönelik bir süreci”  ifade etmektedir (Akgül ve Akdağ, 2018: 2). Karakterlerin anlatı içindeki karakterleştirilme süreçleri ve anlatıcının bu sürece katkısı, karakterlerin psikolojileri ve esere yansıyan diğer psikolojik süreçler; alegorik unsurların kurguya hizmeti; eserdeki söyleyiş tonu, söylem tercihleri ve retorik özellikler, eserdeki olayların kurgulanışı, söz konusu olayların eserin bütününe ve vermek istediği mesaja katkısı, eserdeki anasır-ı erbaa çağrışımları, folklorik unsurlar gibi pek çok hususun bu proje kapsamında ele alınması amaçlanmaktadır. Konunun derinliği, hacmi ve karmaşıklığı düşünüldüğünde Kutadgu Bilig’in disiplinlerarası bir yaklaşımla incelenmesi elzemdir. Projede üzerinde durulması planlanan başlıklar ve içerikleri şu şekildedir:<br><br>


Kutadgu Bilig’in Retoriği Üzerine<br><br>

Karahanlı Devleti zamanında, Balasagunlu Yusuf Has Hacib tarafından Türk dilinde yazılan ilk İslami eser olan Kutadgu Bilig (1069), iletmek istediği mesajları verirken kullandığı retorik stratejiler açısından incelenmeye değer veriler sunan bir eserdir. Bir siyasetname, nasihatname veya ahlâkname olarak nitelendirilen eserde Yusuf Has Hacib’in metni cazip kılmak, okuyucuyu etkileyebilmek ve ikna edebilmek için birçok söylem ve retorik stratejisi kullandığı görülmektedir. Bu bağlamda eserde retorik başlığı altında şu konular üzerinde durulacaktır: Üslupla ilgili tercihler, biçim-içerik analizi, dil kullanımı, bakış açısı, diyalog stratejisi, akıl yürütme biçimleri, ikna stratejileri, söylem analizi, pragmatik (edimbilim) ve söz edimleri bağlamında karşılıklı konuşmaların ve kullanılan tonun analizi, dilbilimsel analiz, kelime tercihleri, sözün ve düşüncenin temsilinde kullanılan söylem çeşitleri ve hangi sıklıkta/hangi amaçla kullanıldıkları, kullanılan retorik figürleri, ideolojik söylem analizi, kimlik inşasında kullanılan retorik stratejiler, olay örgüsünün düzenlenişi, metnin altında yatan retorik yapının ortaya konması vb. Şimdiye kadar Kutadgu Bilig’in retoriğiyle ilgili kapsamlı bir çalışmanın yapılmamış olması da dikkat çekicidir. Bu bağlamda çalışmamız, bu eksikliğin fark edilmesi ve araştırmacıların bu konuya teşvik edilmesi açısından önem arz etmektedir. <br><br>       
  

Kurgusal Anlatıda Karakterleştirme ve Kutadgu Bilig Örneği 
Karakterleştirme; anlatıda belirgin özellikleri olan bir karakter yaratmak için metindeki bir eyleyene bilgi atfetmek, bir karaktere bir özellik yüklemek olarak tarif edilebilir (Jannidis, 2013). En genel tanımıyla karakterleştirme analizi ise kurmaca eserlerdeki karakterlerin sahip oldukları kişisel özellikleri, söz konusu kişilik özelliklerinin yaratılma yollarını araştırmayı ve bulmayı amaçlar.  Bu incelemede kimin (özne), kimi (nesne) ne olarak/ ne şekilde (hangi özelliklerle) karakterleştirdiği önem kazanır (Jahn, 2012: 112). Buna göre karakterleştirme teknikleri üç temel değişken üzerine temellenir: (1) Figüral karakterleştirmeye karşı anlatıcı tarafından yapılan karakterleştirme (2) Açık karakterleştirmeye karşı kapalı karakterleştirme (kişilik özellikleri kelimelere mi yükleniyor yoksa kişinin davranışlarıyla mı ima ediliyor) (3) Kendini karakterize etmeye (oto-karakterizasyon) karşı başkasını karakterize etme (Jahn, 2012: 112). Karakterleştirmeyi analiz etmek, aynı zamanda, kendine has birtakım özelliklere sahip olan ve kurgusal karakterler oluşturmakta kullanılan anlatı araçlarını incelemek demektir. Burada şu soru ön plana çıkar: “Kim kimi hangi özellikleri kullanarak karakterleştirir?” Örneğin anlatıcıya özgü karakterleştirme ile figüral karakterleştirmeyi birbirinden ayırırken karakterleştirmenin anlatıcı tarafından mı yoksa başka karakterler tarafından mı yapıldığını belirlemek önemlidir. Figüral karakterleştirmede karakterleştiren özne yine bir karakterdir, anlatıcıya özgü karakterleştirmede karakterleştiren özne anlatıcıdır. Daha ileri ayrımlar kişisel (self) ve oto-karakterleştirmede ve diğerleri tarafından yapılan (altero-karakterleştirme) karakterleştirmeler arasında yapılabilir. Dahası bir özelliğin doğrudan belirtilmesi veya bir karakterin davranışlarından ötürü dolaylı olarak buna ulaşılmasına göre açık ve kapalı karakterleştirme ayrımına da gidilebilir (Neumann ve Nünning, 2008: 2013).<br><br>
Kutadgu Bilig özelinde karakterleştirme analizi de yukarıda ana hatları ile belirtilen tekniklerin metne uygulanması ile yapılacaktır. Metinde yer alan Kün Toğdı, Ay Toldı, Ögdülmiş ve Odgurmış karakterlerinin metindeki işlevleri, nasıl karakterleştirildikleri, karakterlerin başlarından geçen olaylar, karakterleştirmenin dolaylı mı dolaysız mı yapıldığı, metinde uygulanan karakterleştirme tekniklerinin anlatının bütününe ve sunmak istediği mesaja katkısı üzerinde durulacaktır.<br><br>
Kutadgu Bilig’de Dört Unsur (Anasır-ı Erbaa)
Pek çok filozofun felsefî sisteminde yer alan anasır-ı erbaa dünyadaki varlıkların yapıtaşlarıdır. Düşünürler eski tarihlerden itibaren dünyanın yaratılışını, varlıkların ana maddesini merak etmişler ve kültür, coğrafya farklılıklarına göre bu unsurları yorumlamışlardır. Gerek sözlü gerekse yazılı ürünlerden hareketle kollektif şuuraltında kök salmış olan madde imgelemi üzerinde yapılan çalışmalar da azımsanmayacak ölçüdedir. Yusuf Has Hacib, eserine kâinatın Allah tarafından yaratılışının hikâyesiyle başlayarak hayatın temeli olan dört unsurdan söz eder. Eserde gerek kişilerden gerekse tabiat unsurlarından hareketle maddelerin Türk-Müslüman hayatında çağrışımlarını, yorumlanış şekillerini tespit etmek mümkündür. İslamiyet etkisinde yazılan Kutadgu Bilig’de Kuran’dan gelen dinî yorumlarla birlikte eski Türk kültür hayatında maddelerden doğan zengin bir imaj dünyasından söz edebiliriz. Bu tür çalışmalar şüphesiz daha sonraki dönem eserlerinde yapılacak arketip, mit, imaj çalışmalarına katkı sağlayacaktır.<br><br>
Kutadgu Bilig’de Halk Kültürü Unsurları ve Sözlü Kültür İlişkisi 
Türk kültürünün mirasları içinde kültürel bilgi ve birikimi öğütlerle aktaran bir hazine niteliğindeki Kutadgu Bilig’de halk kültürüyle ilgili oldukça zengin veri yer almaktadır. Kutadgu Bilig, birçok bilim ve bilgi dalında olduğu gibi halkbilimi ve halk edebiyatı bakımından da önemli bir kaynaktır. Kutadgu Bilig gibi eserler sayesinde halk kültürüne ait pek çok değer, yüzyıllar öncesinden günümüze kadar ulaşabilmektedir. Kutadgu Bilig’de  Atasözleri, deyimler, halk şiiri, doğumdan ölüme ritüeller ve halk felsefesi, halk hekimliği yanında çocuk oyunları, yemek kültürü, atla ilgili maddi ve kültürel birikime uzanan geniş bir yelpazededir. Ancak,  literatürde yer alan çalışmalar halk kültürü noktasında  makale ve bildiri gibi dar kapsamlı çalışmalar olup halk kültürü unsurları bütüncül bir bakış açısıyla incelenmemiştir. Bu projede yukarıda örnekleri verilen halk kültürü unsurları tespit edilecek ve metin merkezli halk bilimi kuramları kullanılarak yapısal ve işlevsel açıdan analiz edilecektir. Bu tespitlerin, yazılı kültüre ait Kutadgu Bilig eserinde, sözlü kültürün etkisi ve fonksiyonlarının değerlendirilmesi için önemli veriler sunacağı ön görülmektedir. <br><br>
Türk dili, edebiyatı ve kültür tarihiyle ilgili olarak yapılan disiplinlerarası çoğu çalışmanın odak noktasının Türk halk bilimi olduğunu söylemek mümkündür.  Kutadgu Bilig’in de özünü oluşturan ana kaynak halk kültürüdür. Bu proje kapsamında Kutadgu Bilig’in titizlikle taranması sonucunda, Türk kültürüne ve Türk mitolojisine ait birçok ögenin Kutadgu Bilig’de başarılı bir şekilde kullanılmasından hareketle, eserde yer alan halk kültürü unsurları tespit ve tahlil edilecektir. Bu çalışma kültür araştırmalarına önemli bir katkı sunacaktır. <br><br>
Kutadgu Bilig "pendname" (öğüt kitabı), "düs-turname" (kural kitabı) ve "siyasetname" (siyaset kitabı) olarak, karşılıklı diyalog yani soru cevap şeklinde yazılmıştır. Bu diyalogları, gençlerin elektronik ortamdaki güncel yazışma ve söylemlerine benzetmek mümkündür. Soru-cevap şeklindeki diyaloglar, sözlü anlatıma dayanmaktadır. Kutadgu Bilig’in bu özelliğine gençlerin dikkatini çekmek ve bakış açısı ortaklığını vurgulamak önemlidir. Farklı disiplindeki gençlerle ortak bir çizgide yani güncel bir söylemle günümüzde buluşmak için Kutadgu Bilig’i disiplinlerarası bakış açısıyla senkronize eden bir çalışma yapılacaktır. Ruh sağlığı, Dilbilim, Edebiyat, Göstergebilim ve Halk bilimi bakış açısıyla Kutadgu Bilig’in söylem ve içerik boyutu, güncel yöntemlerle incelenecek, yeni bir anlatımla bir paket halinde gençlere sunulacaktır. Kutadgu Bilig’in ideal insan-ideal toplum ve milli kimlik inşasındaki rolü, halk kültürü unsurları ve sözlü kültür ilişkisi bağlamında değerlendirilecektir.<br><br>
Kutadgu Bilig’de Ruh Sağlığı
İslâmî Türk Edebiyatı sahasında, eseri günümüze ulaşan ilk Türk yazarı Yusuf Has Hacip eserinde; siyaset ve dini halk yönetimini biçimlemede yansıtırken, aslında ruh hali iyi olan birey aile ve toplum yapılanmasını inşa etmiştir. Özellikle yaşamın doğum ve ölüm arasında geçtiği, bu sürede yaşama dair iletişim, beslenme, liderlik, örf adet, öfke, kaygı, çatışma, uyku, rüya, astronomi gibi kavramları ruh sağlığı iyi olan bireyler geliştirmede öğütleri ile tasvir etmiştir. Özellikle hükümdarın gizli baba, vezirin gizli anne, halkın ise gizli çocuk imgelemesi ödipal bir ortam sunmaktadır. Tüm bu yaşama dair kavramlar ölüm  gerçekliği ile yeni bir nesle devredilmektedir. Aslında Kutadgu Bilig ruhsal yapının sağlıklı halini öğütlerle bireye ve topluma öğretmiştir. Bu projede tüm bu kavramlar yukarıda belirtildiği çerçevede analiz edilecektir. Ruh sağlığı hizmetlerinin modern yapıda sunulmadığı Kutadgu Bilig’in yazıldığı 11. yüzyılda, aslında topluma önemli tedavi edici, iyileştirici mesajlar verdiği ve günümüz insanının bu gözle eseri değerlendirmesi için bu projenin fırsat sunacağı öngürülmektedir. <br><br>

Projenin araştırma soruları şunlardır:<br><br>

    1. Kurgusal bir metin olan Kutadgu Bilig’de nasıl bir retorik yapı vardır?<br>
    2. Kutadgu Bilig’de hangi karakterleştirme teknikleri kullanılmıştır?<br>
    3. Kutadgu Bilig’de anlatıcının kurguya katkısı ne şekildedir?<br>
    4. Kutadgu Bilig bir edebî metin olarak hangi türün kapsamına girer?<br>
    5. Kutadgu Bilig’de başvurulan alegorinin kurguya katkısı nedir? <br>
    6. Kutadgu Bilig’de karakterlerin psikolojileri nasıl ele alınmıştır ve psikolojik süreçler metne nasıl yansıtılmıştır?<br>
    7. Kutadgu Bilig’de ruh sağlığı açısından ne gibi veriler tespit edilebilir ve bunlar nasıl yorumlanabilir? <br>
    8. Kutadgu Bilig’de anasır-ı erbaa nasıl işlenmiştir ve Türk-Müslüman hayatındaki çağrışımları nelerdir?<br>  
    9. Kutadgu Bilig’deki halk kültürüne ilişkin unsurlar nelerdir ve bunlar nasıl yorumlanabilir?<br>
    10. Kutadgu Bilig’de yazılı ve  sözlü kültür ilişkisi nasıl kurulmuştur?<br>
    11. Kutadgu Bilig’de ne gibi söylem stratejileri kullanılmıştır?<br>
    12. Kutadgu Bilig’deki karakterler görsel olarak nasıl ifade edilir?<br>

<br><br>
Amaç ve Hedefler
<br><br>
Projenin temel amacı Türk-İslam kültürünün baş yapıtlarından biri olan Kutadgu Bilig’in disiplinlerarası yaklaşımlar (edebiyat, retorik, dilbilim, pragmatik, anlatıbilim, gösterge bilim, psikoloji ve halk bilimi) ışığında kurgusal anlatıya has kategoriler açısından (anlatıcı, olay örgüsü, karakterler, zaman, mekân, üslup, söylem, retorik yapı vb.) ele alınarak disiplinler arası bir ekip çalışmasıyla analiz edilerek sonuçların kitap olarak yayınlanması ve elde edilen bulguların interaktif bir sunumla genç kuşaklarla paylaşılmasıdır.  Z kuşağı olarak tanımlanan kuşağın iletişim ortamını ağırlıklı olarak internet ve sosyal medya oluşturmaktadır. Dolayısıyla söz konusu kuşağın ilgisini çekmek ve iletişim kurabilmek için söz konusu bilgiyi görsellerle desteklemek gerekmektedir ve bu nedenle projenin sunum kısmında Kutadgu Bilig’de yer alan adalet, doğruluk, akıl vb. değerler ve bu değerleri temsil eden karakterle ilgili anlatmalar seçilerek resimlendirilecektir.
 <br><br>
Araştırmanın bu temel amaç doğrultusunda hedefleri analiz ve sunum şeklinde birbiriyle ilişkili iki hedefi vardır. 
Projenin analize ilişkin hedefleri şunlardır:
<br>
    1. Türkçenin başvuru kaynaklarından biri olan Kutadgu Bilig’in aynı zamanda kurgusal bir metin olduğu gerçeğinden hareketle, metnin kurgulanma sürecinin analiz edilmesi <br>
    2. Kutadgu Bilig’de anlatılan olayların kurgunun imkânları açısından ele alınması<br>
    3. Kutadgu Bilig’de başvurulan karakterleştirme tekniklerinin belirlenerek bunların kurguya katkısının tespit edilmesi<br>
    4. Metinde anlatıcının işlevinin ve karakterleştirmeye katkısının belirlenmesi<br>
    5. Metinde zaman ve mekân unsurlarının kullanımı ve bunların kurguya katkısının incelenmesi<br>
    6. Kutadgu Bilig’de benimsenen üslup ve söylem tercihlerinin belirlenmesi<br>
    7. Kutadgu Bilig’de yer alan alegorik unsurların ve metindeki alegorinin anlatı kategorileri ile ilişkisinin tespiti<br>
    8. Metindeki karakterlerin psikolojik süreçleri ve bunların kurguya yansıma biçimlerinın belirlenmesi<br>
    9. Kutadgu Bilig’de benimsenen anlatısal tercihler ile anlatının okuyucuya sunmak istediği mesajlar arasındaki ilişkinin tespiti<br>
    10. Kutadgu Bilig’de anasır-ı erbaanın Türk-Müslüman hayatındaki yansımalarının tespiti<br>
    11. Proje kapsamındaki çalışmaların kitap olarak yayınlanması. <br>

Projenin sunuma ilişkin hedefleri ise şunlardır:<br><br>
 
    1. Kutadgu Bilig’le ilgili disiplinlerarası analize dayalı bulguların genç kuşaklarla paylaşılarak hem konunun hem de çalışmanın güncelliğinin sağlanarak genç kuşaklarca farkındalığının artırılmasıdır.  <br>
    2. Metinde yer alan dört ana karakter ile bireysel ve toplumsal değer ve mesajların resimleri/grafikleri hazırlanmak suretiyle oluşturulacak sunum, öğrencilerin görsel olarak da iletişim sağlayacağı bir yapıda kazandırılacaktır.  <br>
    3. Yazılı ve sözlü sunumun yanında görsel ögelerin de yer alacağı interaktif bir sunum olarak planlanan bu aşamanın hedef kitlesi İzmir İl Milli Eğitim Müdürlüğü’nün yönlendireceği ortaöğretim düzeyindeki okullardaki öğrencilerdir. </p>
                                <h4 id="item-3">3)YÖNTEM</h4>
                                <p>Proje kapsamında yürütülecek olacak araştırmanın mahiyetine uygun olarak nitel yaklaşım kullanılacak ve metin analizi, söylem analizi, retorik analiz, dilbilimsel analiz temelli incelemeler yapılacaktır. Disiplinlerarası bir hüviyete sahip olan projemiz, bu nedenle, farklı araştırma/inceleme yöntemlerini bir arada kullanmayı gerekli kılmaktadır. Aşağıda ayrıntılı olarak yer vereceğimiz bu yöntemlerin tamamının ortak noktası ise yapısalcı bakış açısıdır. Edebiyatta yapısalcılık bir metnin incelemesinde, belli bir bölge veya anlatı grubundaki ortak yapıları belirleyerek, bunların bir formül haline getirilmesi ve bu formülün evrensel seviyede uygulanabilir olmasını bekler (Ekici 2013: 119). Ancak, projemizi tek bir metin etrafında şekillendirdiğimiz için, yapısalcı bakış açısının “karşılaştırarak genelleme yapma” prensibinden ziyade, metni belirli ölçütlere göre parçalara ayırma ve bu parçaların bütün içerisindeki rolünü belirleme prensibinden faydalanacağız. Bunun için ilk olarak klasik yapısalcı yöntemin uygulanması; yani metnin epizot esaslı olarak bölümlenmesi gerekmektedir; çünkü Kutadgu Bilig’in sözlü edebiyat ürünleriyle ilişkisi bu klasik yapısalcı inceleme yönteminin uygulanmasını gerekli kılar. Sonrasında ise özellikle Roland Barthes’ın öncülüğünü yaptığı, epizot esaslı değil “göstergeler” esaslı bir bölümleme yapılması gerekmektedir (Barthes 2016). Bu yöntem ile metin, farklı disiplinlerin incelemesi için gerekli olan parçalara ayrılmış bir hale getirilecektir. Halk bilimi alanında ise metin merkezli inceleme yöntemleri (Oğuz, Ekici vd. 2010; Çobanoğlu 2002) kullanılarak yapısal çözümleme yapılacak ve elde edilen veriler işlevsel olarak analiz edilecektir. Yapısal olarak halk kültürüne ait yukarıda örneklerine yer verilen başlıklardaki unsurların tespit edilmesinin ardından halk kültürü unsurlarının işlevleri değerlendirilecektir. 
Böylesi bir yöntemsel eğilime sahip olan projemizde, bu aşamadan sonra takip edeceğimiz yol “yapısal içerik analizi”dir. Bir metnin içerik unsurlarından hareketle genel sosyal/gerçek hayat hakkında tutarlı bilgi sunmayı vadeden bu yöntem, sosyal bilimlerin farklı alanlarındaki araştırmacılar tarafından tercih edilmiştir. Hüseyin Aksoy (2019), bu yöntemi takip ettiği çalışmasında, içerik analizi hakkındaki görüşleri kısaca şöyle sunmuştur: Klaus Krippendorff’a göre içerik analizi; “İletişimin yazılı/açık (manifest) özelliklerinden yazılı/açık (manifest) olmayan içerik özelliklerine yönelik çıkarımlar yapmayı” amaçlamaktadır (Gökçe, 1995: 24). Krippendorff’tan hareketle Merten’in geliştirdiği tanım ise şöyledir: “İçerik çözümlemesi, sosyal gerçeğin yazılı/açık (manifest) içeriklerinin özelliklerinden, içeriğin yazılı/açık olmayan özellikleri hakkında çıkarımlar yapmak yoluyla sosyal gerçeği araştıran bir yöntemdir” (Gökçe, 1995: 24). George Gerbner de içerik analizinin amacını şu şekilde ifade etmiştir: “Herhangi bir içerik analizinin amacı görünürde açık olmayan bir şey hakkında olanaklı, görünür çıkarımlar yapmaktır” (Güngör ve Binark, 1993: 126). İçerik analizi, Duverger’e göre bir metnin öğelerinin önceden saptanmış bulunan kategorilere göre sınıflandırılmasına dayanmaktadır (Duvarger, 1989: 144). Cartwright tarafından, “Her türlü sembolik davranışın betimlenmesinde ve içeriğinin analizinde kullanılan sistematik, nicel ve nesnel bir yöntem” olarak tanımlamaktadır (Bilgin, 2000: 1). “Sözel veya yazılı verilerin belirli bir problem veya amaç bakımından sınıflandırılması, özetlenmesi, belirli değişken veya kavramların ölçülmesi ve bunlardan belirli bir anlam çıkarılması için taranarak kategorilere ayrılması” (Tavşancıl-Aslan, 2001: 20) olarak da tanımlanan bu yöntem; “Araştırma Sorusu veya Hipotezi ile Amacı ve Hedefi” başlığı altında belirttiğimiz gibi Kutadgu Bilig’in çok yönlü analizi amacına sahip olan projemizin yapılabilirliğini destekleyici mahiyettedir.<br><br>
Yapısal içerik analizi ile ortaya koyacağımız Kutadgu Bilig’deki anlam dünyasına dair bilgi birikimi, “Projeden Beklenen Yaygın Etki Tablosu”nda belirttiğimiz “Kutadgu Bilig’in lise öğrencilerine yeniden sunumu” için gerekli veriyi bize sunacaktır. Metindeki anlamları doğuran gösterge ve gösterenler arasındaki ilişkiyi doğru bir şekilde belirleyebilmek ve metni hedef kitlemizin dikkatine sunmak için, öncülüğünü Jacques Derrida’nın yaptığı “yapısöküm (deconstruction) yöntemi”nden faydalanmamız gerekmektedir. Yapısökümü, bir cümlede yer alan sözcüklerin dizilişini bozmak, bir bütünün parçalarını ayırmak, bir başka yere taşımak maksadıyla dizelerin yapısını çözmek ve ölçüyü bozmak ve bu dizeleri nesire benzetmek manalarında kullanmıştır. Bununla birlikte Derrida ise bu kavramı olumsuz manada kullanmadığını da açıklamaya çalışmıştır. “Bu manada Derrida’ya göre yapısökümü yıkmaktan çok bir bütünlüğün nasıl inşa edildiğini anlamaya ve onu yeniden inşa etmeye yani yapmaya çalışmaktır.” (Yanık, 2016, 93-94). Post-modernist bakış açısıyla, Kutadgu Bilig’in sınırsız bir anlamlar bütününü içeren bir metin olduğunu ifade edebiliriz. Nitekim projemiz bu sınırsız anlamlar bütününü, sınırlı bir okuma ve hedef kitle için yeniden kurgulamayı esas almaktadır. 
Araştırmanın tasarımında 3 aşama yer almaktadır: <br><br>
Ön Araştırma: Bu noktada ortak terim ve kavramlar tespit edilecek ve projenin akademik çıktıları başta olmak üzere uygulama aşamasında yer alan interaktif sunumda da farklı disiplinlerin birlikte çalışmasına rağmen terminoloji ortaklığı sağlanacaktır. <br>
İnceleme: Projede yer alan araştırmacıların çalıştıkları disiplinin araştırma ve inceleme yöntemlerine bağlı olarak Kutadgu Bilig metnini analiz edecekleri bu aşamanın akademik çıktılarının bir kitap bütünlüğünde yayınlanarak akademik dünyayla projenin sonuçlarının paylaşılması bu aşamanın öncelikli hedefidir. Projenin inceleme kısmı iki ana aşamada tamamlanacaktır:<br><br>
İnceleme 1. Aşama- Metinlerin Analizi: Disiplinlerin araştırma ve inceleme yöntemleri uyarınca  Kutadgu Bilig’in analizini içeren bu aşamada gerçekleştirimesi planlanan çalışma yöntemi aşağıdadır:<br><br>
Kutadgu Bilig metninin, “karakterlerin eylem alanları” odaklı epizotlarına ayrılması (klasik yapısalcı analiz): Bu yolla, Kutadgu Bilig’in “geleneksel anlatı kalıpları” ile ilişkisi ortaya koyulacaktır. Dünyada var olan bir olguyu yansıtmak için oluşturulan bir metnin manası metnin yapı ve içerik unsurları ve o olgu arasındaki ilişkide saklıdır; çünkü okuyucu/dinleyici aktarılan olayla doğrudan muhatap olmamıştır ve metnin kendisine sunduğu anlam dünyasıyla yetinmek durumundadır. Bu nedenle, belirli bir kompozisyona sahip bir metinde anlamın veya gerçeğin ortaya çıkmasında etkin olan unsurun onun sunuş şekli; yani yapı ve türe dair özellikleri olduğu görülmektedir. Dolayısıyla, dağınık haldeki bilgi yığınının daha önceden toplum tarafından belirlenmiş kalıplarla sunulmasının, onun genel kabul görmesinde etkili olduğunu iddia edebiliriz. Çünkü bilindik bir kalıpla sunulan bilgi, geleneksel bir hüviyete sahip olur. Gelenek ise, genel kabul gören üretim tarzıdır.<br><br>
Kutadgu Bilig metninin, “gösteren ile gösterge” odaklı incelenmesi (göstergebilimsel analiz): Karakterlerin eylem alanları odaklı epizotlarından faydalanarak ve aynı zamanda bundan bağımsız olarak, Kutadgu Bilig metnindeki en küçük anlamlı yapısal birimlerin yorumlaması yapılacak. Nitekim Saussure ile başlayan yapısalcı dilbilim çalışmalarında gönderim ile mana arasındaki ilişki üzerine çeşitli tartışmalar yürütülmüştür. Bu tartışmalarda gösteren ile gösterge arasındaki ilişkinin manayı ortaya çıkaran temel unsur olduğu genel kabul görmüştür. Mana, her insana göre küçük değişiklikler gösterse de, bizim “gerçek” olarak kabul ettiğimiz şeydir. Dilbilimci Frege, mananın bir nesneyi işaret eden ifadenin (bir kelime veya bir metin) gönderimde bulunduğu nesneyi sunuş biçimi olduğunu iddia eder (Akşehirli, 2004: 162; Barut ve Odacıoğlu, 2018, 932).<br><br>
İnceleme 2. Aşama- Görseller İçin Veri Tespiti: Projenin uygulama aşamasında yer alması planlanan Z kuşağı olarak tanımlanan ortaöğretim öğrencileriyle Kutadgu Bilig’de yer alan kültürel miras birikiminin buluşturulması için bu aşamada görsellerle desteklenecek veriler tespit edilecektir. Söz konusu verilerin tespiti için yapısökümsel analiz yöntemi kullanılacaktır:<br><br>
Kutadgu Bilig metninin, “parçalara ayrılarak yeniden inşası” odaklı incelenmesi (yapısökümsel analiz): Bu aşamada, Kutadgu Bilig’in “Z Kuşağı” olarak adlandırılan internet ve elektronik kültür ortamında yetişen nesil için yeniden sunumu söz konusu olacaktır. Bunun için, yukarıda belirttiğimiz yöntemler dahilinde Kutadgu Bilig’in incelenmesi neticesinde elde edeceğimiz farklı okumalara ihtiyaç duyulmaktadır. Çünkü farklı okumalar neticesinde ortaya çıkan bakış açıları içerisinden genç kuşağın ihtiyaç duyduğu kültürel gönderimler seçilecek ve bunların görsel tasarımları gerçekleştirilecektir. Özgün görsel tasarımlar (çizimler, illüstrasyonlar, “caps” olarak nitelendirilebilecek resim altı yazıları vb.) Kutadgu Bilig ışığında yeniden kurgulanan metinlerle desteklenecektir. Belirli zamanlarda ilgili okullarda gerçekleştirilecek sunumlarla; Kutadgu Bilig’deki kültürel değerler, özgün bakış açıları, insan ilişkileri, insan ve aile-toplum arasındaki ilişki, bireyin ve kendini gerçekleştirmesi hususları aktarılacaktır.<br><br>
Uygulama: Projenin son aşamasında görselleri oluşturulan veri ve metinlerin büyük boy poster baskılar ve sözlü sunumlara eşlik edecek görsellerde kullanılması sağlanacaktır. Hazırlanan görseller, interaktif sunumların yapılacağı okullarda sergi şeklinde de sunulacaktır. Projenin İnceleme kısmında yer alan “Kutadgu Bilig metninin, ‘parçalara ayrılarak yeniden inşası’ odaklı incelenmesi (yapısökümsel analiz)” sürecinde elde edilecek veriler özellikle Z kuşağını hedef alan sunumlarla paylaşılarak Kutadgu Bilig’deki kültürel miras unsurlarının gençlerle buluşması sağlanacaktır. </p>
                                <h5 id="item-4">4)PROJE YÖNETİMİ</h5>
                                <p>
                                    <h5 id="item-4-1">4.1)IYönetim Düzeni: İş Paketleri (İP), Görev Dağılımı ve Süreleri</h5>
                                    <p>İP No

İş Paketlerinin
 Adı ve Hedefleri


Kim(ler) Tarafından Gerçekleştirileceği

Zaman Aralığı
(12 Ay)
Başarı Ölçütü ve Projenin Başarısına Katkısı 
1
Ön Araştırma-Terminoloji Ortaklığı: 
Metin analizleri ve interaktif sunumlarda ortak terminolojinin kullanılması için hazırlık yapılması. Projede yer alan dilbilim, göstergebilim, halk bilimi ve ruh sağlığı disiplinlerinde temel terim ve kavramlarda terminoloji birliği sağlanması gerekmektedir. Örneğin anlatı/anlatma, sözlü kültür/sözel kültür, imge/simge/sembol gibi terimler ile bu projenin üç temel perspektifini oluşturan birey, toplum ve metin kavramları da her alanda farklı kullanımlara sahiptir ancak disiplinlerarası çalışmanın ön koşulu olarak terim ve kavramlarda ortak bir zemini paylaşmak gerekliliği projenin ön araştırma safhasında terim ve kavramlarda uzlaşılmasını gerektirmektedir. 
Dr. Mustafa Duman, Dr. Ebru Özlem Yılmaz, Doç. Dr. Pınar Fedakar, Prof. Dr. Ayşegül Bilge
1-2. aylar
İki araştırmacı vasıtasıyla Kutadgu Bilig’le ilgili çalışmalar taranarak temel terim ve kavramlar tespit edilecek ve proje çalışanlarının ortak görüşlerine sunularak çalışmada terim ve kavram birliği sağlanacaktır.  Farklı disiplinlerin Kutadgu Bilig’i farklı perspektiflerden ele alacağı bu projenin terim ve kavramlarında ortak bir dil kullanılması çalışmanın bütünlüğünü sağlamada önemli ve öncelikli bir aşamadır. 
2
İnceleme 1. Aşama- Metinlerin analizi:  disiplinlerin araştırma ve inceleme yöntemleri uyarınca  Kutadgu Bilig’in incelenerek analiz edilmesi. 
Doç. Dr. Bahar Dervişcemaloğlu, Prof. Dr. Ayşegül Bilge, Doç. Dr. Şerife Çağın, Doç. Dr. Pınar Fedakar, Dr. Öğr. Üyesi Rabia Uçkun, Dr. Ebru Özlem Yılmaz, Dr. Mustafa Duman 
2-9. aylar
Bu projede yer alan araştırmacılar, birey, toplum ve metin eksenindeki ortak bakış açısına bağlı olmak kaydıyla ruh sağlığı, göstergebilim, dilbilim ve halk bilimi disiplinleri çerçevesinde Kutadgu Bilig’deki verileri tespit edip analiz edeceklerdir. Projenin akademik kısmındaki araştırma sonuçları kitap olarak da yayınlanacaktır. 
3
İnceleme 2. Aşama- Görseller İçin Veri Tespiti: 
Görseller ve sunumda kullanılacak metin ve verilerin tespit edilmesi
 Dr. Mustafa Duman,  Dr. Öğr. Üyesi Rabia Uçkun,  Doç. Dr. Şerife Çağın, Doç. Dr. Ekin Boztaş

9-10. aylar
Projenin Uygulama Aşamasında yer alan interaktif sergide kullanılacak metinler ve veriler görseller için sınıflandırılacak ve resimleri çizecek araştırmacıyla paylaşılacaktır. Bu aşamanın gerçekleştirilmesiyle birlikte  resimler ve sunularda yer alacak veriler ve metinlerin uyumlu ve bütüncül olması sağlanacaktır. 
4
Uygulama 1 Aşama – Görsellerin Hazırlanması: 
Sergi ve sunum aşamasında kullanılmak üzere tespit edilen metin ve verilerin görsellerinin hazırlanması
Doç. Dr. Ekin Boztaş

10-11. aylar
Proje araştırmacıları tarafından tespit edilen verilerin görsellerinin oluşturulması ilgili araştırmacı tarafından gerçekleştirilecek ve projenin diğer araştırmacıları tarafından da değerlendirilerek yönlendirilecektir. 
5
Uygulama 2. Aşama-Sunum: 
Serginin ve interaktif sunumların seçilen okullarda gerçekleştirilmesi
Doç. Dr. Bahar Dervişcemaloğlu, Prof. Dr. Ayşegül Bilge, Doç. Dr. Şerife Çağın, Doç. Dr. Pınar Fedakar, Dr. Öğr. Üyesi Rabia Uçkun,  Dr. Ebru Özlem Yılmaz, Dr. Mustafa Duman, Doç. Dr. Ekin Boztaş

11-12. aylar 
Projenin verilerinin genç kuşaklarla buluşmasında, yazılı ve sözlü kültürün birlikteliğinin kullanılması ve görsel ifadenin gücünün sunumlara taşınması hedefi bu aşamada gerçekleştirilecektir.
</p>
                                    <h5 id="item-4-2">4.2)Risk Yönetimi</h5>
                                    <p>
                                        Projenin başarısını olumsuz yönde etkileyebilecek riskler ve bu risklerle karşılaşıldığında projenin başarıyla yürütülmesini sağlamak için alınacak tedbirler (B Planı) ilgili iş paketleri belirtilerek ana hatlarıyla aşağıdaki Risk Yönetimi Tablosu’nda ifade edilir. B planlarının uygulanması projenin temel hedeflerinden sapmaya yol açmamalıdır.

                                                       RİSK YÖNETİMİ TABLOSU (*)
İP No
En Önemli Riskler
Risk Yönetimi (B Planı)

Bu projenin en önemli riski iş takvimine uygun olarak çalışmaların sürdürülmesi noktasında görülmektedir. Her araştırmacının kişisel programının uygunluğu teyit edilerek projede görev almasına rağmen hastalık vb. gibi öngörülemeyecek durumlarda iş takvimi aksayabilir. 
Öngörülemeyecek durumlarda iş takviminin aksatılmaması için iş takviminin üç ana aşamasına da birden fazla ve mümkün olduğunca her disiplinden bir araştırmacı görevlendirilmiştir. Dolayısıyla her aşamayı gerçekleştirecek araştırmacıların ortak çalışması gerekmekte ve bu ortaklık da hastalık vb. nedenlerle oluşabilecek öngöürlemeyen risklerin iş takvimini etkilememesi sonucunu doğuracaktır. 

Projenin uygulama aşaması, interaktif sunumların okullarda gerçekleştirilmesini gerektirmektedir. Bu noktada okulların sunumları kabuluyle ilgili riskler söz konusu olabilir. 
İnteraktif sunumların okullarda gerçekleştirilmesi noktasında İzmir İl Milli Eğitim Müdürlüğü’nün desteği alınmış ve bu destek ek belge olarak sunulmuştur. Söz konusu destekle sunumların gerçekleştirilmesi mümkün olan okulların sayısı ve isimleri net olarak belirtilmemiş, böylece olası risklerde farklı okullarla iletişime geçilmesi mümkün kılınmış,  dolayısıyla bu noktadaki riskler de ortadan kaldırılmıştır.
    (*) Tablodaki satırlar gerektiği kadar genişletilebilir ve çoğaltılabilir.
                                    </p>

<h5 id="item-5">5)YAYGIN ETKİ</h5>
                                    <p>Proje başarıyla gerçekleştirildiği takdirde projeden elde edilmesi öngörülen ve beklenen yaygın etkilerin neler olabileceği, diğer bir ifadeyle projeden ne gibi çıktı, sonuç ve etkilerin elde edileceği aşağıdaki tabloda verilir.

PROJEDEN BEKLENEN YAYGIN ETKİ TABLOSU
Yaygın Etki Türleri
Projede Öngörülen ve Beklenen Çıktı, Sonuç ve Etkiler
Bilimsel/Akademik 
(Makale, Bildiri, Kitap Bölümü, Kitap) 
Projenin çıktılarının kitap olarak yayınlanması planlanmaktadır. Başta kitap yayını olmak üzere proje süresinde ve sonrasında yayınlanacak makale ve bildirilerle de projenin sonuçları akademik alanla paylaşılacaktır. 
Ekonomik/Ticari/Sosyal
(Ürün, Prototip, Patent, Faydalı Model, Üretim İzni, Çeşit Tescili, Spin-off/Start- up Şirket, Görsel/İşitsel Arşiv, Envanter/Veri Tabanı/Belgeleme Üretimi, Telife Konu Olan Eser, Medyada Yer Alma, Fuar, Proje Pazarı, Çalıştay, Eğitim vb. Bilimsel Etkinlik, Proje Sonuçlarını Kullanacak Kurum/Kuruluş, vb. diğer yaygın etkiler)
Projenin Uygulama aşamasındaki sergi ve interaktif sunumlar proje verilerinin kamuoyuyla paylaşılmasını sağlamaya yöneliktir. Projenin etki alanının genişlemesini sağlayacak olan bu uygulamayla Z kuşağı olarak tanımlanan hedef kitleye Kutadgu Bilig aracılığıyla Tük kültürünün yazılı ve sözlü mirasının aktarımı gerçekleştirilecektir. Sergi ve sunum yapılacak okulların daha ziyade İzmir’in dezavantajlı bölgelerindeki okullardan seçilecek olması da önemlidir. 
Araştırmacı Yetiştirilmesi ve Yeni Proje(ler) Oluşturma 
(Yüksek Lisans/Doktora Tezi, Ulusal/Uluslararası Yeni Proje)
İzmir İl Milli Eğitim Müdürlüğü’nün desteğiyle özellikle ortaöğretim düzeyindeki genç kuşağa yönelik interaktif sunumların yaygınlaştırılarak diğer kurum ve kuruluşlarla yapılacak protokoller neticesinde farklı bölgelerdeki okullar gibi daha farklı alanlarda kamuoyuyla paylaşılması hedefini gerçekleştirmek üzere örnek gösterilerek farklı kurum ve kuruluşların ortaklığında benzer uygulamların arttırılması mümkündür. 
</p>

                                </p>
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
                <!-- ============================================================== -->>
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

</body>

</html>