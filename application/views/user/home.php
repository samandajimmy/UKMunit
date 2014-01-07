

<div class="row">
    <div class="span12">

        <div id="featuredItems">

            <div class="titleHeader clearfix">
                <h3>UKM Kami</h3>
                <div class="pagers">
                    <div class="btn-toolbar">
                        <button class="btn btn-mini">View All</button>
                    </div>
                </div>
            </div><!--end titleHeader-->

            <div class="row">
                <ul class="hProductItems clearfix">
                    <?php
                    if (isset($ukm)) {
                        foreach ($ukm as $row) {
                            ?>
                            <li class="span3 clearfix">
                                <div class="thumbnail">
                                    <a href="<?php echo site_url('user/ukmHome/' . $row->idUkm); ?>"><img src="<?php echo base_url('ukm/thumbnail/' . $row->gambarUKM); ?>" alt=""></a>
                                </div>
                                <div class="thumbSetting">
                                    <div class="thumbTitle">
                                        <a href="#" class="invarseColor">
                                            <h4><strong><?php echo $row->namaUKM; ?></strong></h4>
                                        </a>
                                    </div>

<!--                                    <div class="thumbButtons">
                                        <button class="btn btn-primary btn-small" data-title="+To Cart" data-placement="top" rel="tooltip">
                                            <i class="icon-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-small" data-title="+To WishList" data-placement="top" rel="tooltip">
                                            <i class="icon-heart"></i>
                                        </button>

                                        <button class="btn btn-small" data-title="+To Compare" data-placement="top" rel="tooltip">
                                            <i class="icon-refresh"></i>
                                        </button>
                                    </div>-->
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div><!--end row-->
        </div><!--end featuredItems-->
    </div><!--end span12-->
</div><!--end row-->


<div class="row">
    <div class="span12">
        <div id="brands">
            <div class="titleHeader clearfix">
                <h3>Brands</h3>
                <div class="pagers">
                    <div class="btn-toolbar">
                        <button class="btn btn-mini">View All</button>
                    </div>
                </div>
            </div><!--end titleHeader-->
            <ul class="brandList clearfix">
                <li>
                    <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/Layer-4.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/Layer-1.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/Layer-3.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/Layer-2.png" alt="logo"></a>
                </li>
            </ul>
        </div><!--end brands-->
    </div><!--end span12-->
</div><!--end row-->
