<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::$app->homeUrl;?>assets/images/favicon.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::$app->homeUrl;?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo Yii::$app->homeUrl;?>css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo Yii::$app->homeUrl;?>assets/images/background/cool-background.png);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="index.html" novalidate>
                    <h3 class="box-title m-b-20">Kaydol</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input autofocus class="form-control" name="fullname" value="" type="text" required data-validation-required-message="Girilmesi zorunlu alan" placeholder="İsim">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="useremail" id="useremail" value="" type="email" required data-validation-required-message="Girilmesi zorunlu alan" placeholder="E-posta">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <input type="password" placeholder="Şifre" name="password" value="" class="form-control" required data-validation-required-message="Girilmesi zorunlu alan"> </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="password" name="password2" placeholder="Şifreyi tekrarla" value="" data-validation-match-match="password" class="form-control" required> </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox checkbox-success controls p-t-0">
                            
                                <input name="checkbox-signup" id="checkbox-signup"   type="checkbox" required data-validation-required-message="Please agree to terms" value="single" >
                                <label for="checkbox-signup"> Kabul ediyorum <a href="#">Sözleşme</a></label>
                            </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Kaydol</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Zaten kayıtlıyım <a href="<?php echo Yii::$app->homeUrl;?>site/login" class="text-info m-l-5"><b>Giriş yap</b></a>
                        </div>
                    </div>
                </form>
                
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
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
    <script src="<?php echo Yii::$app->homeUrl;?>js/validation.js"></script>
    <script>
        jQuery( document ).ready(function($) {
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo Yii::$app->homeUrl;?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>