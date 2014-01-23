<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>UKMunity | <?php echo $title; ?></title>
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
        <link href="<?php echo base_url('assets/admin'); ?>/assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/select2/select2_metro.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/assets/plugins/data-tables/DT_bootstrap.css" />		     
		<link href="<?php echo base_url('assets/admin'); ?>/assets/css/pages/inbox.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/admin'); ?>/favicon.ico" />
    </head>
    <!-- END HEAD -->

    <?php
    $this->db->select('ukm.*');
    $this->db->select('user.isActive');
    $this->db->from('user');
    $this->db->join('ukm', 'user.id = ukm.idUser', 'inner');
    $this->db->where('user.isActive', 0);
    $query = $this->db->get();
    $counterNotActive = $query->num_rows();
    ?>

    <!-- BEGIN BODY -->
    <body class="page-boxed page-header-fixed page-footer-fixed" style>

        <!-- BEGIN HEADER -->   
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <img src="<?php echo base_url('assets/admin'); ?>/assets/img/logo.png" alt="logo" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?php echo base_url('assets/admin'); ?>/assets/img/menu-toggler.png" alt="" />
                    </a>          
                    <!-- END RESPONSIVE MENU TOGGLER -->            
                    <!-- BEGIN TOP NAVIGATION MENU -->              
                    <ul class="nav pull-right">
                        <?php
                        if ($this->session->userdata('tipeUser') == 1) {
                            $this->db->select('*');
							$this->db->from('message');
							$this->db->where('status', 0);
							$query = $this->db->get();
							$result = $query->result();
							$counter = count($result);
                            ?>

                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                                <a href="<?php echo site_url('user/inbox'); ?>">
                                    <i class="icon-envelope"></i>
                                    <span class="badge"><?php echo $counter; ?></span>
                                </a>
<!--                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <p>You have 12 new messages</p>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height:250px">
                                            <li>
                                                <a href="inbox.html?a=view">
                                                    <span class="photo"><img src="<?php //echo base_url('assets/admin'); ?>/assets/img/avatar2.jpg" alt="" /></span>
                                                    <span class="subject">
                                                        <span class="from">Lisa Wong</span>
                                                        <span class="time">Just Now</span>
                                                    </span>
                                                    <span class="message">
                                                        Vivamus sed auctor nibh congue nibh. auctor nibh
                                                        auctor nibh...
                                                    </span>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox.html?a=view">
                                                    <span class="photo"><img src="<?php //echo base_url('assets/admin'); ?>/assets/img/avatar3.jpg" alt="" /></span>
                                                    <span class="subject">
                                                        <span class="from">Richard Doe</span>
                                                        <span class="time">16 mins</span>
                                                    </span>
                                                    <span class="message">
                                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                                                        auctor nibh...
                                                    </span>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox.html?a=view">
                                                    <span class="photo"><img src="<?php //echo base_url('assets/admin'); ?>/assets/img/avatar1.jpg" alt="" /></span>
                                                    <span class="subject">
                                                        <span class="from">Bob Nilson</span>
                                                        <span class="time">2 hrs</span>
                                                    </span>
                                                    <span class="message">
                                                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                                                        auctor nibh...
                                                    </span>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox.html?a=view">
                                                    <span class="photo"><img src="<?php //echo base_url('assets/admin'); ?>/assets/img/avatar2.jpg" alt="" /></span>
                                                    <span class="subject">
                                                        <span class="from">Lisa Wong</span>
                                                        <span class="time">40 mins</span>
                                                    </span>
                                                    <span class="message">
                                                        Vivamus sed auctor 40% nibh congue nibh...
                                                    </span>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox.html?a=view">
                                                    <span class="photo"><img src="<?php //echo base_url('assets/admin'); ?>/assets/img/avatar3.jpg" alt="" /></span>
                                                    <span class="subject">
                                                        <span class="from">Richard Doe</span>
                                                        <span class="time">46 mins</span>
                                                    </span>
                                                    <span class="message">
                                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                                                        auctor nibh...
                                                    </span>  
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="external">
                                        <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
                                    </li>
                                </ul>-->
                            </li>
                            <!-- END INBOX DROPDOWN -->    
                            <?php
                        }
                        ?>          
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('user/userLogout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU --> 
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="container">
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar nav-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->        
                    <ul class="page-sidebar-menu">
                        <li>
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler hidden-phone"></div>
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="start">
                            <a href="<?php echo site_url('user/adminDashboard'); ?>">
                                <i class="icon-home"></i> 
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li >
                            <a href="javascript:;">
                                <i class="icon-file"></i> 
                                <span class="title">Manage Artikel</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li >
                                    <a href="<?php echo site_url('artikel/artikelInput'); ?>">
                                        Input Artikel</a>
                                </li>
                                <li >
                                    <a href="<?php echo site_url('artikel/artikelList'); ?>">
                                        List Artikel</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        if ($this->session->userdata('tipeUser') == 1) {
                            ?>
                            <li >
                                <a href="javascript:;">
                                    <i class="icon-cogs"></i> 
                                    <span class="title">Manage Admin</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li >
                                        <a href="<?php echo site_url('user/adminManage'); ?>">
                                            Input & List Admin</a>
                                    </li>
                                </ul>
                            </li>
                            <li >
                                <a href="javascript:;">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Manage UKM</span>
                                    <span class="arrow "></span>
                                    <?php
                                    if ($counterNotActive) {
                                        ?>
                                        <span class="badge badge-roundless badge-important"><?php echo $counterNotActive; ?></span>
                                        <?php
                                    }
                                    ?> 
                                </a>
                                <ul class="sub-menu">
                                    <li >
                                        <a href="<?php echo site_url('ukm/ukmList'); ?>">
                                            List UKM</a>
                                    </li>
                                    <li >
                                        <a href="<?php echo site_url('ukm/ukmRequest'); ?>">
                                            Request for UKM</a>
                                    </li>
                                    <li >
                                        <a href="<?php echo site_url('ukm/ukmTambahKategori'); ?>">
                                            Tambah Kategori UKM</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->userdata('tipeUser') == 2) {
                            ?>
                            <li >
                                <a href="javascript:;">
                                    <i class="icon-barcode"></i> 
                                    <span class="title">Manage Produk</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li >
                                        <a href="<?php echo site_url('produk/produkInput'); ?>">
                                            Input Produk</a>
                                    </li>
                                    <li >
                                        <a href="<?php echo site_url('produk/produkList'); ?>">
                                            List Produk</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="last ">
                            <a href="<?php echo site_url('msg/msgMail'); ?>">
                                <i class="icon-bar-chart"></i> 
                                <span class="title">UKM Mail</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN PAGE -->
                <?php $this->load->view($view); ?>
                <!-- END PAGE -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2013 &copy; UKMunity.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="icon-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->

        <script type="text/javascript">        
            var baseURL = "<?php echo base_url(); ?>";
            var siteURL = "<?php echo site_url(); ?>";
        </script>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->   
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
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
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/ckeditor/ckeditor.js"></script>  
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>   
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>     
        <script src="<?php echo base_url('assets/admin'); ?>/assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/plugins/data-tables/DT_bootstrap.js"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/app.js"></script>      
		<script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/inbox.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/form-components.js"></script>  
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/table-managed.js"></script>  
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/table-advanced.js"></script>  
        <script src="<?php echo base_url('assets/admin'); ?>/assets/scripts/custom.js"></script>
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
        Inbox.init();
        FormComponents.init();
        TableManaged.init();

    });
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>