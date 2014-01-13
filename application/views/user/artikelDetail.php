<div class="row">

    <aside class="span3">
        <div class="aside-inner">
            <div class="special">
                <div class="titleHeader clearfix">
                    <h3>Related Product</h3>
                </div><!--end titleHeader-->

                <ul class="vProductItemsTiny">
                    <?php
                    if (isset($relProduk)) {
                        foreach ($relProduk as $row) {
                            ?>
                            <li class="span4 clearfix">
                                <div class="thumbImage">
                                    <a href="#"><img style="width: 96px;" src="<?php echo base_url('produk/thumbnail/' . $row->gambarProduk); ?>" alt=""></a>
                                </div>
                                <div class="thumbSetting">
                                    <div class="thumbTitle">
                                        <a href="#" class="invarseColor">
                                            <?php echo $row->namaProduk; ?>
                                        </a>
                                    </div>
                                    <div class="thumbPrice">
                                        <span><?php echo 'Rp. ' . number_format($produk[0]->hargaProduk, 0, ',', '.'); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div><!--end special-->

        </div><!--end aside-inner-->
    </aside><!--end span3-->


    <div class="span9">
	<article class="blog-article">
						<div class="blog-img">
							<img src="<?php echo base_url('artikel/gambar/' . $artikel[0]->gambarArtikel); ?>" alt="Blog image">
						</div><!--end blog-img-->

						<div class="blog-content">
							<div class="blog-content-title">
								<h2><a href="#" class="invarseColor"><?php echo $artikel[0]->namaArtikel; ?></a></h2>
							</div>
							<div class="clearfix">
								<ul class="unstyled blog-content-date">
									<li class="pull-right"><i class="icon-comments"></i> 15</li>
									<li class="pull-left"><i class="icon-calendar"></i> <?php echo date("Y-M-d", strtotime($artikel[0]->tglInput)); ?></li>
									<li class="pull-left"><i class="icon-pencil"></i> <a href="#">Huseyin</a></li>
								</ul>
							</div>
							<div class="blog-content-entry">
								<p>
									<?php echo $artikel[0]->isiArtikel; ?>
								</p>
							</div>
						</div><!--end blog-content-->
					</article><!--end article-->

					<div class="user-comments">
						<div class="titleHeader clearfix">
							<h3>Users Comments</h3>
						</div><!--end titleHeader-->
						
				<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=636889163009701";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="http://UKMunity.com/artikel/<?php echo $artikel[0]->id; ?>" data-width="720" data-numposts="5" data-colorscheme="light"></div>
						<!--
						<ul class="media-list">
							<li class="media">
								<a class="pull-left" href="#">
							      <img class="media-object" src="img/64x64.jpg" alt="user-avatar">
							    </a>
							    <div class="media-body">
							    	<div class="pull-right">
							    		<button class="btn btn-mini" rel="tooltip" data-title="Reply" data-placment="top"><i class="icon-refresh"></i></button>
							    		<button class="btn btn-mini"  rel="tooltip" data-title="Remove" data-placment="top"><i class="icon-trash"></i></button>
							    	</div>
							        <h4 class="media-heading">
							      	   <a href="#" class="invarseColor">John Doe1</a>
							        </h4>
							        <p>
							      	  consectetur adipiscing eli. Nulla tristique posuere felis vel pretium. Sed sit amet nisi elit. consectetur adipiscing eli. Nulla tristique posuere felis vel pretium. Sed sit amet nisi elit.
							        </p>
							    </div>
							</li>
						</ul><!--end media-list-->
					</div><!--end user-comments-->
					<!--
					<div class="make-comment">
						<div class="titleHeader clearfix">
							<h3>Leave Comment</h3>
						</div><!--end titleHeader-->
						<!--
						<form method="#" action="#">
							<div class="controls controls-row">
							<input type="text" name="" value="" placeholder="Your Name...*" class="span3">
							<input type="text" name="" value="" placeholder="E-Mail...*" class="span3">
							<input type="text" name="" value="" placeholder="URL..." class="span3">
							</div>
							<div class="controls">
							<textarea name="" class="span9" placeholder="Your Message...*"></textarea>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Add Comment</button>
						</form><!--end form-->
					<!--
					</div><!--end make-comment-->

    </div><!--end span9-->

</div><!--end row-->