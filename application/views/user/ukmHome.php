<div class="row">

    <aside class="span3">

        <div class="categories">
            <div class="titleHeader clearfix">
                <h3>UKM Categories</h3>
            </div><!--end titleHeader-->
            <ul class="unstyled">
                <?php
                if (isset($kategori)) {
                    foreach ($kategori as $row) {
                        ?>                        
                        <li><a class="invarseColor" href="#"><?php echo $row->namaKategoriUkm; ?></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--end categories-->
    </aside><!--end aside-->


    <div class="span9">

        <div id="productSlider" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item"><img src="<?php echo base_url('ukm/gambar/' . $ukm[0]->gambarUKM); ?>" alt=""></div>
            </div>
        </div><!--end productSlider-->


        <div class="productFilter clearfix">
            <h1>UKM - <?php echo $ukm[0]->namaUKM; ?></h1>

        </div><!--end productFilter-->


        <div class="row">
            <ul class="hProductItems clearfix">
                <?php
                if (isset($result)) {
                    foreach ($result as $row) {
                        ?>
                        <li class="span3 clearfix">
                            <div class="thumbnail">
                                <a href="<?php echo site_url('user/produkDetail/' . $row->id); ?>"><img src="<?php echo base_url('produk/thumbnail/' . $row->gambarProduk); ?>" alt=""></a>
                            </div>
                            <div class="thumbSetting">
                                <div class="thumbTitle">
                                    <a href="#" class="invarseColor">
                                        <?php echo $row->deskripsiProduk; ?>
                                    </a>
                                </div>
                                <div class="thumbPrice">
                                    <span><?php echo 'Rp. ' . number_format($row->hargaProduk, 0, ',', '.'); ?></span>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--end row-->

        <div class="pagination pagination-right">
            <?php echo $links; ?>
        </div><!--end pagination-->

    </div><!--end span9-->

</div><!--end row-->
