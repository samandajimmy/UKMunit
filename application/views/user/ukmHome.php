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

        <div class="pro-range-slider">
            <div class="titleHeader clearfix">
                <h3>Shop By Price</h3>
            </div><!--end titleHeader-->
            <div class="price-range">
                <p class="clearfix">
                    <label>Price:</label>
                    <input type="text" id="amount">
                </p>
                <div id="slider-range"></div>
            </div>
        </div><!--end pro-range-slider-->


        <div class="special">
            <div class="titleHeader clearfix">
                <h3>Special</h3>
            </div><!--end titleHeader-->

            <ul class="vProductItemsTiny">
                <li class="span4 clearfix">
                    <div class="thumbImage">
                        <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/92x92.jpg" alt=""></a>
                    </div>
                    <div class="thumbSetting">
                        <div class="thumbTitle">
                            <a href="#" class="invarseColor">
                                Foliomania the title here
                            </a>
                        </div>
                        <div class="thumbPrice">
                            <span>$150.00</span>
                        </div>
                        <ul class="rating">
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                        </ul>
                    </div>
                </li>
                <li class="span4 clearfix">
                    <div class="thumbImage">
                        <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/92x92.jpg" alt=""></a>
                    </div>
                    <div class="thumbSetting">
                        <div class="thumbTitle">
                            <a href="#" class="invarseColor">
                                Foliomania the designer portfolio
                            </a>
                        </div>
                        <div class="thumbPrice">
                            <span>$150.00</span>
                        </div>
                        <ul class="rating">
                            <li><i class="star-on"></i></li>
                            <li><i class="star-on"></i></li>
                            <li><i class="star-on"></i></li>
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                        </ul>
                    </div>
                </li>
                <li class="span4 clearfix">
                    <div class="thumbImage">
                        <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/92x92.jpg" alt=""></a>
                    </div>
                    <div class="thumbSetting">
                        <div class="thumbTitle">
                            <a href="#" class="invarseColor">
                                Foliomania the designer portfolio
                            </a>
                        </div>
                        <div class="thumbPrice">
                            <span>$150.00</span>
                        </div>
                        <ul class="rating">
                            <li><i class="star-on"></i></li>
                            <li><i class="star-on"></i></li>
                            <li><i class="star-on"></i></li>
                            <li><i class="star-off"></i></li>
                            <li><i class="star-off"></i></li>
                        </ul>
                    </div>
                </li>
                <li class="span4 clearfix">
                    <div class="thumbImage">
                        <a href="#"><img src="<?php echo base_url('assets/user'); ?>/img/92x92.jpg" alt=""></a>
                    </div>
                    <div class="thumbSetting">
                        <div class="thumbTitle">
                            <a href="#" class="invarseColor">
                                Foliomania the designer portfolio
                            </a>
                        </div>
                        <div class="thumbPrice">
                            <span>$150.00</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div><!--end special-->

    </aside><!--end aside-->


    <div class="span9">

        <div id="productSlider" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item"><img src="<?php echo base_url('ukm/gambar/' . $ukm[0]->gambarUKM); ?>" alt=""></div>
            </div>

            <!-- Carousel nav -->
            <!--            <a class="carousel-control left" href="#productSlider" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#productSlider" data-slide="next">&rsaquo;</a>-->
        </div><!--end productSlider-->


        <div class="productFilter clearfix">
            <h1>UKM - <?php echo $ukm[0]->namaUKM; ?></h1>

        </div><!--end productFilter-->


        <div class="row">
            <ul class="hProductItems clearfix">
                <?php
                if (isset($produk)) {
                    foreach ($produk as $row) {
                        ?>
                        <li class="span3 clearfix">
                            <div class="thumbnail">
                                <a href="#"><img src="<?php echo base_url('produk/thumbnail/' . $row->gambarProduk); ?>" alt=""></a>
                            </div>
                            <div class="thumbSetting">
                                <div class="thumbTitle">
                                    <a href="#" class="invarseColor">
                                        Foliomania the designer portfolio brochure
                                    </a>
                                </div>
                                <div class="thumbPrice">
                                    <span>$150.00</span>
                                </div>

                                <div class="thumbButtons">
                                    <button class="btn btn-primary btn-small" data-title="+To Cart" data-placement="top" rel="tooltip">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                    <button class="btn btn-small" data-title="+To WishList" data-placement="top" rel="tooltip">
                                        <i class="icon-heart"></i>
                                    </button>

                                    <button class="btn btn-small" data-title="+To Compare" data-placement="top" rel="tooltip">
                                        <i class="icon-refresh"></i>
                                    </button>
                                </div>

                                <ul class="rating">
                                    <li><i class="star-on"></i></li>
                                    <li><i class="star-on"></i></li>
                                    <li><i class="star-on"></i></li>
                                    <li><i class="star-on"></i></li>
                                    <li><i class="star-off"></i></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--end row-->

        <div class="pagination pagination-right">
            <span class="pull-left">Showing 9 of 20 pages:</span>
            <ul>
                <li><a class="invarseColor" href="#">Prev</a></li>
                <li class="active"><a class="invarseColor" href="#">1</a></li>
                <li><a class="invarseColor" href="#">2</a></li>
                <li><a class="invarseColor" href="#">2</a></li>
                <li><a class="invarseColor" href="#">3</a></li>
                <li><a class="invarseColor" href="#">Next</a></li>
            </ul>
        </div><!--end pagination-->

    </div><!--end span9-->

</div><!--end row-->
