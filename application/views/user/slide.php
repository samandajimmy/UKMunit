
<div class="row">

    <div class="span8">
        <div class="flexslider">
            <ul class="slides">
                <?php
                if (isset($featuredArtikel)) {
                    foreach ($featuredArtikel as $row) {
                        ?>
                        <li><img src="<?php echo base_url('artikel/gambar/' . $row->gambarArtikel); ?>" slt="slide1"></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--end flexslider-->
    </div><!--end span8-->


    <div class="span4">

        <div id="homeSpecial">
            <div class="titleHeader clearfix">
                <h3>Latest Article</h3>
                <div class="pagers">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <button class="btn btn-mini vNext"><i class="icon-caret-down"></i></button>
                            <button class="btn btn-mini vPrev"><i class="icon-caret-up"></i></button>
                        </div>
                    </div>
                </div>
            </div><!--end titleHeader-->


            <ul class="vProductItems cycle-slideshow vertical clearfix"
                data-cycle-fx="carousel"
                data-cycle-timeout=0
                data-cycle-slides="> li"
                data-cycle-next=".vPrev"
                data-cycle-prev=".vNext"
                data-cycle-carousel-visible="2"
                data-cycle-carousel-vertical="true"
                >
                    <?php
                    if (isset($artikel)) {
                        foreach ($artikel as $row) {
                            ?>
                        <li class="span4 clearfix">
                            <div class="thumbImage">
                                <a href="<?php echo site_url('user/artikelDetail/' . $row->id); ?>"><img src="<?php echo base_url('artikel/thumbnail/' . $row->gambarArtikel); ?>" alt=""></a>
                            </div>
                            <div class="thumbSetting">
                                <div class="thumbTitle">
                                    <a href="<?php echo site_url('user/artikelDetail/' . $row->id); ?>" class="invarseColor">
                                        <?php echo $row->namaArtikel; ?>
                                    </a>
                                </div>
                                <p><?php echo $row->deskripsiArtikel; ?></p>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--end special-->
    </div><!--end span4-->

</div><!--end row-->