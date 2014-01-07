
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    List Produk <small>passionate & crazy</small>
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
                        <div class="caption"><i class="icon-reorder"></i>List Produk</div>
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
						<form action="<?php echo $action; ?>" method="POST">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Gambar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($produk)) {
                                    foreach ($produk as $row) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="check[]" value="<?php echo $row->id;  ?>" data-set="#sample_1 .checkboxes" /></td>
                                            <td><?php echo $row->namaProduk; ?></td>
                                            <td><?php echo $row->deskripsiProduk; ?></td>
                                            <td><?php echo 'Rp. ' . number_format($row->hargaProduk, 0, ',', '.'); ?></td>
                                            <td><img src="<?php echo base_url('produk/thumbnail/' . $row->gambarProduk); ?>" /></td>
                                            <td>
                                                <a href="<?php echo site_url('produk/produkEdit/' . $row->id); ?>" title="Edit"><i class="icon-edit"></i></a>
                                                <a href="#" title="Delete"><i class="icon-trash" data-val="<?php echo $row->id ?>" name="produk"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
						<p id="btn-field" style="text-align: center;"></p>
						</form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <div class="row-fluid" id="isiArtikel">
        </div>


        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>