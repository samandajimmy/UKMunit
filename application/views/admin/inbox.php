
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

        <?php
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('status', 0);
        $query = $this->db->get();
        $result = $query->result();
        $counter = count($result);

        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        $counterR = count($result);
        ?>


        <div class="row-fluid inbox">
            <div class="span2">
                <ul class="inbox-nav margin-bottom-10">
                    <li class="inbox active">
                        <a href="<?php echo site_url('user/inbox'); ?>" class="btn" data-title="Inbox">Inbox(<?php echo $counter; ?>)</a>
                        <b></b>
                    </li>
                    <li class="sent"><a class="btn" href="<?php echo site_url('user/readMessage'); ?>"  data-title="Sent">Read Messages(<?php echo $counterR; ?>)</a><b></b></li>

                </ul>
            </div>
            <div class="span10">
                <div class="content">

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
                        <form action="<?php //echo $action;  ?>" method="POST">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Pengirim</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Tanggal Kirim</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($msg)) {
                                        foreach ($msg as $row) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" class="checkboxes" name="check[]" value="<?php echo $row->id; ?>" data-set="#sample_1 .checkboxes" /></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->pesan; ?></td>
                                                <td><?php echo $row->tglKirim; ?></td>
                                                <td>
                                                    <a href="#" data='<?php echo $row->pesan; ?>' name="<?php echo $row->subjek; ?>" class="btn mini blue-stripe detailPesan" id="<?php echo $row->id; ?>">Isi</a>
                                                    <a href="<?php echo site_url('artikel/artikelEdit/' . $row->id); ?>" title="Edit"><i class="icon-edit"></i></a>
                                                    <a href="#" title="Delete"><i class="icon-trash" data-val="<?php echo $row->id ?>" name="artikel"></i></a>
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
                    <div class="row-fluid" id="isiPesan">
                    </div>
                </div>
            </div>
        </div>



        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->    
</div>