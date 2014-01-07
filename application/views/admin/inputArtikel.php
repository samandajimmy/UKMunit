
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">   
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Input Artikel <small>passionate & crazy</small>
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
                        <div class="caption"><i class="icon-reorder"></i>Artikel Form</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo $action; ?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                            <?php
                            if (isset($artikelDetail)) {
                                echo '<input type="hidden" name="idArtikel" value="' . $artikelDetail[0]->id . '" />';
                            }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Judul Artikel</label>
                                <div class="controls">
                                    <input type="text" name="namaArtikel" value="<?php if (isset($artikelDetail))
                                echo $artikelDetail[0]->namaArtikel; ?>" required class="span6 m-wrap popovers" data-trigger="hover" data-content="Berikan judul artikel yang sesuai dengan isi artikel" data-original-title="Perhatian!!" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Deskripsi Artikel</label>
                                <div class="controls">
                                    <textarea class="span6 m-wrap popovers" required name="deskripsiArtikel" data-trigger="hover" data-content="Berikan deskripsi singkat tentang artikel yang akan anda isi" data-original-title="Perhatian!!" rows="3"><?php if (isset($artikelDetail))
                                               echo $artikelDetail[0]->deskripsiArtikel; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tag Artikel</label>
                                <div class="controls">
                                    <input type="text" name="tagArtikel" value="<?php if (isset($artikelDetail))
                                echo $artikelDetail[0]->tagArtikel; ?>" required class="span6 m-wrap popovers" data-trigger="hover" data-content="Berikan judul artikel yang sesuai dengan isi artikel" data-original-title="Perhatian!!" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Gambar Artikel</label>
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
                                    if (isset($artikelDetail)) {
                                        ?>
                                        <div>
                                            <img src="<?php echo base_url('artikel/thumbnail/' . $artikelDetail[0]->gambarArtikel); ?>" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Isi Artikel</label>
                                <div class="controls">
                                    <textarea class="span11 wysihtml5 m-wrap" required name="isiArtikel" rows="6">
                                        <?php if (isset($artikelDetail))
                                            echo $artikelDetail[0]->isiArtikel; ?>
                                    </textarea>
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