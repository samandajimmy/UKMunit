
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Input & List Kategori UKM <small>passionate & crazy</small>
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
                        <div class="caption"><i class="icon-reorder"></i>Input Kategori UKM</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo $action; ?>" class="form-horizontal" method="POST">
                            <?php
                            if (isset($kategoriDetail)) {
                                echo '<input type="hidden" name="idKategori" value="' . $kategoriDetail[0]->id . '" />';
                            }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Nama Kategori</label>
                                <div class="controls">
                                    <input type="text" name="namaKategoriUkm" required <?php if (isset($kategoriDetail))
                                echo 'value="' . $kategoriDetail[0]->namaKategoriUkm . '"'; ?> class="span6 m-wrap popovers" data-trigger="hover" data-content="masukkan nama kategori UKM" data-original-title="Perhatian!!" />
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
                        <div class="caption"><i class="icon-reorder"></i>List Kategori UKM</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Kategori UKM</th>
                                    <th class="sorting_disabled"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($kategori)) {
                                    foreach ($kategori as $row) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                            <td><?php echo $row->namaKategoriUkm; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('ukm/ukmEditKategori/' . $row->id); ?>" class="btn mini white"><i class="icon-edit"></i> Edit</a>
                                                <a href="<?php echo site_url('ukm/ukmDeleteKategori/' . $row->id); ?>" class="btn mini red"><i class="icon-trash"></i> Delete</a>
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

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>