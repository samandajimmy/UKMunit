

<!-- BEGIN SAMPLE FORM PORTLET-->   
<div class="portlet box grey">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i>Compose Mail</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="<?php echo $action; ?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >

            <div class="control-group">
                <label class="control-label">To</label>
                <div class="controls">
                    <select class="span12 chosen" data-placeholder="Pilih User" tabindex="4">
                        <option value="0"></option>
                        <?php
                        foreach ($user as $row) {
                            ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->username; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Subject</label>
                <div class="controls">
                    <input type="text" name="subject" required class="span12 m-wrap" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Pesan</label>
                <div class="controls">
                    <textarea class="span12 m-wrap" required name="body" rows="10"></textarea>
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
