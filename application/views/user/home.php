

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

            <div class="titleHeader clearfix">
                <h3>News</h3>
                <div class="pagers">
                    <div class="btn-toolbar">
                        <button class="btn btn-mini">View All</button>
                    </div>
                </div>
            </div><!--end titleHeader-->
			
			
                    <?php
                    if (isset($artikel)) {
                        foreach ($artikel as $row) {
						$isiArtikel = $row->isiArtikel;
						if (strlen($isiArtikel) > 200) {

							// truncate string
							$stringCut = substr($isiArtikel, 0, 200);

							// make sure it ends in a word so assassinate doesn't become ass...
							$isiArtikel = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						}
						$query = $this->db->get_where('user', array('id' => $row->inputBy));
						$user = $query->result();
                            ?>

					<article class="blog-article float-left">
					<div class="row">
						<div class="span3">
							<div class="blog-img">
								<a href="#"><img class="float-left" src="<?php echo base_url('artikel/thumbnail/' . $row->gambarArtikel); ?>" alt="Blog image"></a>
								<div class="blog-content-title">
									<h4><a href="#" class="invarseColor"><?php echo $row->namaArtikel; ?></a></h4>
								</div>
							</div><!--end blog-img-->
							<div class="blog-content">
								<div class="clearfix">
									<ul class="unstyled blog-content-date">
										<li class="pull-left"><i class="icon-calendar"></i> <?php echo date("Y-M-d", strtotime($row->tglInput)); ?></li>
										<li class="pull-left"><i class="icon-pencil"></i> <a href="#"><?php echo $user[0]->username; ?></a></li>
									</ul>
								</div>
								<div class="blog-content-entry">
									<p>
										<?php echo $isiArtikel; ?>
									</p>
									<a href="#">Contunie &rarr;</a>
								</div>
							</div><!--end blog-content-->
						</div><!--end span5-->
					</div><!--end row-->
					</article><!--end article-->

                            <?php
                        }
                    }
                    ?>
				</div><!--end span9-->

			</div><!--end row-->