
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    UKM Mail <small>passionate & crazy</small>
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER--> 
        <!-- BEGIN PAGE CONTENT-->


        <div class="row-fluid inbox">
            <div class="span2">
                <ul class="inbox-nav margin-bottom-10">
                    <li class="compose-btn active">
                        <a href="<?php echo site_url('msg/msgCompose'); ?>" data-title="Compose" class="btn green"> 
                            <i class="icon-edit"></i> Compose
                        </a>
                    </li>

                    <li class="inbox">
                        <a href="<?php echo site_url('user/inbox'); ?>" class="btn" data-title="Inbox">Inbox(<?php echo '1'; ?>)</a>
                        <b></b>
                    </li>
                    <li class="sent"><a class="btn" href="<?php echo site_url('user/readMessage'); ?>"  data-title="Sent">Read Messages(<?php echo '2'; ?>)</a><b></b></li>

                </ul>
            </div>
            <div class="span10">
                <div class="content">
                    <?php $this->load->view($msgView); ?>
                </div>
            </div>
        </div>



        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>