
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Input & List Admin <small>passionate & crazy</small>
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER--> 
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN SAMPLE FORM PORTLET-->   
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-reorder"></i>Input Admin</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo $action; ?>" class="form-horizontal" method="POST">
							<?php
							if(isset($adminDetail)){
								echo '<input type="hidden" name="idAdmin" value="' . $adminDetail[0]->id . '" />';
							}
							?>
                            <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input type="text" name="username" required <?php if (isset($adminDetail)) echo 'value="' . $adminDetail[0]->username . '"'; ?> class="span6 m-wrap popovers" data-trigger="hover" data-content="masukkan username untuk admin yang anda inginkan" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" required class="span6 m-wrap popovers" data-trigger="hover" data-content="masukkan password untuk mengamankan account yang akan anda gunakan" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" name="rpassword" required class="span6 m-wrap popovers" data-trigger="hover" data-content="pastikan password yang anda masukkan sekarang sama dengan diatas" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" name="email" required <?php if (isset($adminDetail)) echo 'value="' . $adminDetail[0]->email . '"'; ?> class="span6 m-wrap popovers" data-trigger="hover" data-content="masukkan email aktif anda untuk memverifikasi data anda" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn">Cancel</button>     
                            </div>
                        </form>
                        <!-- END FORM-->  
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-reorder"></i>List Admin</div>
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
                                    <th>Email</th>
                                    <th class="sorting_disabled"></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								if (isset($admin)){
									foreach($admin as $row){
									?>
										<tr>
											<td><input type="checkbox" class="checkboxes" value="1" /></td>
											<td><?php echo $row->username; ?></td>
											<td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
											<td><a href="<?php echo site_url('user/adminEdit/' . $row->id); ?>" class="btn mini white"><i class="icon-edit"></i> Edit</a><a href="<?php echo site_url('user/adminDelete/' . $row->id); ?>" class="btn mini red"><i class="icon-trash"></i> Delete</a></td>
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

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>