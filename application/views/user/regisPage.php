
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Metronic | Form Stuff - Form Wizard</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/select2/select2_metro.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/gritter/css/jquery.gritter.css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid" style="margin-top: 0">
            <!-- BEGIN PAGE -->  
            <div class="page-content" style="margin-left: 0;">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid" style="width: 1000px; margin: 0 auto;">
                    <!-- BEGIN PAGE HEADER-->   
                    <div class="row-fluid">
                        <div class="span12"> 
                            <h3 class="page-title">
                                Daftarkan UKM Anda Sekarang
                                <small>Silahkan isi form di bawah ini</small>
                            </h3>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="portlet box grey" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Langkah Pengisian - <span class="step-title">Step 1 of 4</span>
                                    </div>
                                    <div class="tools hidden-phone">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="<?php echo site_url('user/ukmSave'); ?>" class="form-horizontal" id="submit_form" method="POST" enctype="multipart/form-data">
                                        <div class="form-wizard">
                                            <div class="navbar steps">
                                                <div class="navbar-inner">
                                                    <ul class="row-fluid">
                                                        <li class="span3">
                                                            <a href="#tab1" data-toggle="tab" class="step ">
                                                                <span class="number">1</span>
                                                                <span class="desc"><i class="icon-ok"></i> Account Setup</span>   
                                                            </a>
                                                        </li>
                                                        <li class="span3">
                                                            <a href="#tab2" data-toggle="tab" class="step">
                                                                <span class="number">2</span>
                                                                <span class="desc"><i class="icon-ok"></i> Profile Setup</span>   
                                                            </a>
                                                        </li>
                                                        <li class="span3">
                                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                                <span class="number">3</span>
                                                                <span class="desc"><i class="icon-ok"></i> Profile UKM</span>   
                                                            </a>
                                                        </li>
                                                        <li class="span3">
                                                            <a href="#tab4" data-toggle="tab" class="step">
                                                                <span class="number">4</span>
                                                                <span class="desc"><i class="icon-ok"></i> Confirm</span>   
                                                            </a> 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="bar" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="alert alert-error hide">
                                                    <button class="close" data-dismiss="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>
                                                <div class="alert alert-success hide">
                                                    <button class="close" data-dismiss="alert"></button>
                                                    Your form validation is successful!
                                                </div>
                                                <div class="tab-pane active" id="tab1">
                                                    <h3 class="block">Provide your account details</h3>
                                                    <div class="control-group">
                                                        <label class="control-label">Username<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="username"/>
                                                            <span class="help-inline">Provide your username</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Password<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="password" class="span6 m-wrap" name="password" id="submit_form_password"/>
                                                            <span class="help-inline">Provide your username</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Confirm Password<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="password" class="span6 m-wrap" name="rpassword"/>
                                                            <span class="help-inline">Confirm your password</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Email<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="email"/>
                                                            <span class="help-inline">Provide your email address</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h3 class="block">Provide your profile details</h3>
                                                    <div class="control-group">
                                                        <label class="control-label">Fullname<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="fullname"/>
                                                            <span class="help-inline">Provide your fullname</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Phone Number<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="phone"/>
                                                            <span class="help-inline">Provide your phone number</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Gender<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" name="gender" value="M" data-title="Male" />
                                                                Male
                                                            </label>
                                                            <div class="clearfix"></div>
                                                            <label class="radio">
                                                                <input type="radio" name="gender" value="F" data-title="Female"/>
                                                                Female
                                                            </label>  
                                                            <div id="form_gender_error"></div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Address<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="address" />
                                                            <span class="help-inline">Provide your street address</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">City/Town<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="city"/>
                                                            <span class="help-inline">Provide your city or town</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="block">Profile UKM</h3>
                                                    <div class="control-group">
                                                        <label class="control-label">UKM Category<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <?php echo form_dropdown('idKategoriUkm', $kategoriUkmDrop, 0, 'data-placeholder="Pilih kategori" class="span6 m-wrap" tabindex="1"'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">UKM Name<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="namaUKM" />
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">UKM Address<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="span6 m-wrap" name="alamatUKM"/>
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">UKM Telephone<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" placeholder="" class="span6 m-wrap" name="teleponUKM"/>
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">UKM Phone<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" placeholder="" class="span6 m-wrap" name="hpUKM"/>
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Profile UKM<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <textarea class="span6 m-wrap" rows="3" name="profilUKM"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Gambar UKM<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="file" class="span6 m-wrap" name="content"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <h3 class="block">Are you sure with your account data</h3>
                                                </div>
                                            </div>
                                            <div class="form-actions clearfix">
                                                <a href="javascript:;" class="btn button-previous">
                                                    <i class="m-icon-swapleft"></i> Back 
                                                </a>
                                                <a href="javascript:;" class="btn blue button-next">
                                                    Continue <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                                <!--<a href="javascript:;" class="btn green button-submit">
                                                                                                    Submit <i class="m-icon-swapright m-icon-white"></i>
                                                                                                </a>-->
                                                <button type="submit" class="btn green button-submit">Sign in <i class="m-icon-swapright m-icon-white"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->         
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <!--[if lt IE 9]>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script src="assets/plugins/respond.min.js"></script>  
        <![endif]-->   
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/select2/select2.min.js"></script>     
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/app.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/form-wizard.js"></script>     
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
<?php
if ($notif != '') {
    ?>
                setTimeout(function () {
                    var unique_id = $.gritter.add({
                        // (string | mandatory) the heading of the notification
                        title: 'Perhatian!',
                        // (string | mandatory) the text inside the notification
                        text: '<?php echo $notif; ?>',
                        // (string | optional) the image to display on the left
                        // (bool | optional) if you want it to fade out on its own or just sit there
                        sticky: true,
                        // (int | optional) the time you want it to be alive for before fading out
                        time: '',
                        // (string | optional) the class name you want to apply to that specific message
                        class_name: 'my-sticky-class'
                    });

                    // You can have it return a unique id, this can be used to manually remove it later using
                    setTimeout(function () {
                        $.gritter.remove(unique_id, {
                            fade: true,
                            speed: 'slow'
                        });
                    }, 5000);
                }, 0);   
    <?php
}
?>    
        // initiate layout and plugins
        App.init();
        FormWizard.init();
    });
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>