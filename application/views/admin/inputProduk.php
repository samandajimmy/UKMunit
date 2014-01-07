
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Input Produk <small>passionate & crazy</small>
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
                        <div class="caption"><i class="icon-reorder"></i>Produk Form</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo $action; ?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <?php
                            if (isset($produkDetail)) {
                                echo '<input type="hidden" name="idProduk" value="' . $produkDetail[0]->id . '" />';
                            }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Nama Produk</label>
                                <div class="controls">
                                    <input type="text" name="namaProduk" value="<?php if (isset($produkDetail))
                                echo $produkDetail[0]->namaProduk; ?>" required class="span6 m-wrap popovers" data-trigger="hover" data-content="Isikan nama produk yang akan anda pasarkan" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Deskripsi Produk</label>
                                <div class="controls">
                                    <textarea class="span6 m-wrap popovers" required name="deskripsiProduk" data-trigger="hover" data-content="Berikan deskripsi singkat tentang produk yang akan anda isi" data-original-title="Perhatian!!" rows="3"><?php if (isset($produkDetail))
                                               echo $produkDetail[0]->deskripsiProduk; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Harga Produk</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <span class="add-on">Rp</span><input class="m-wrap popovers" name="hargaProduk" value="<?php if (isset($produkDetail))
                                            echo $produkDetail[0]->hargaProduk; ?>" required name="deskripsiProduk" data-trigger="hover" data-content="Berikan harga produk sesuai dengan nama produk" data-original-title="Perhatian!!" type="number" min="1"><span class="add-on">.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Gambar Produk</label>
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="icon-file fileupload-exists"></i> 
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-file">
                                                <span class="fileupload-new">Select file</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="content" class="default" />
                                            </span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($produkDetail)) {
                                        ?>
                                        <div>
                                            <img src="<?php echo base_url('produk/thumbnail/' . $produkDetail[0]->gambarProduk); ?>" />
                                        </div>
                                        <?php
                                    }
                                    ?>
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

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>