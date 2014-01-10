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


        <div class="productFilter clearfix" style="margin: 0;">
            <h1>Daftar UKM Kami</h1>

        </div><!--end productFilter-->


        <div class="row">
			
                    <?php
                    if (isset($result)) {
                        foreach ($result as $row) {
						$isiArtikel = $row->isiArtikel;
						if (strlen($isiArtikel) > 100) {

							// truncate string
							$stringCut = substr($isiArtikel, 0, 100);

							// make sure it ends in a word so assassinate doesn't become ass...
							$isiArtikel = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						}
						$query = $this->db->get_where('user', array('id' => $row->inputBy));
						$user = $query->result();
                            ?>

					<article class="blog-article float-left" style="margin-left: 0;">
						<div class="span3">
							<div class="blog-img">
								<a href="<?php echo site_url('user/artikelDetail/' . $row->id); ?>"><img class="float-left" src="<?php echo base_url('artikel/thumbnail/' . $row->gambarArtikel); ?>" alt="Blog image"></a>
								<div class="blog-content-title">
									<h4><a href="<?php echo site_url('user/artikelDetail/' . $row->id); ?>" class="invarseColor"><?php echo $row->namaArtikel; ?></a></h4>
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
					</article><!--end article-->

                            <?php
                        }
                    }
                    ?>
        </div><!--end row-->

        <div class="pagination pagination-right">
            <?php echo $links ?>
        </div><!--end pagination-->

    </div><!--end span9-->

</div><!--end row-->
