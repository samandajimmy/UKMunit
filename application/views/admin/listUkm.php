
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    List <?php echo $headTitle; ?> <small>passionate & crazy</small>
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER--> 
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-reorder"></i>List UKM</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- <div class="table-toolbar">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green">
                                    Add New <i class="icon-plus"></i>
                                </button>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Username</th>
                                    <th>Nama UKM</th>
                                    <th>Email</th>
                                    <th>Kategori UKM</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($allUkm)) {
                                    foreach ($allUkm as $row) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->namaUKM; ?></td>
                                            <td><?php echo $row->namaKategoriUkm; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td>
                                                <a href="#" id="<?php echo $row->id; ?>" class="btn mini blue-stripe detailUkm">View</a>
                                                <a href="#" data-val="<?php echo $row->id; ?>" name="ukm" class="btn mini red-stripe delUkm">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <div class="row-fluid" id="ukmDetail">
<!--            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>Simple Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>-->
        </div>
        

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>