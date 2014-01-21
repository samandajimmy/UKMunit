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
                        <li><a class="invarseColor" href="<?php echo site_url('user/ukmKategori/' . $row->id); ?>"><?php echo $row->namaKategoriUkm; ?></a></li>
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
						$profilUKM = $row->profilUKM;
						if (strlen($profilUKM) > 200) {

							// truncate string
							$stringCut = substr($profilUKM, 0, 200);

							// make sure it ends in a word so assassinate doesn't become ass...
							$profilUKM = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						}
                            ?>

					<article class="blog-article float-left" style="margin-left: 0;">
						<div class="span3">
							<div class="blog-img">
								<a href="<?php echo site_url('user/ukmHome/' . $row->idUkm); ?>"><img class="float-left" src="<?php echo base_url('ukm/thumbnail/' . $row->gambarUKM); ?>" alt="Blog image"></a>
								<div class="">
									<h4><a href="<?php echo site_url('user/ukmHome/' . $row->idUkm); ?>" class="invarseColor"><?php echo $row->namaUKM; ?></a></h4>
								</div>
							</div><!--end blog-img-->
							<div class="blog-content">
								<div class="blog-content-entry">
									<p>
										<?php echo $profilUKM; ?>
									</p>
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
