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
                                    <a href="<?php echo site_url('user/produkDetail/' . $row->id); ?>"><img style="width: 72px;" src="<?php echo base_url('produk/thumbnail/' . $row->gambarProduk); ?>" alt=""></a>
                                </div>
                                <div class="thumbSetting">
                                    <div class="thumbTitle">
                                        <a href="<?php echo site_url('user/produkDetail/' . $row->id); ?>" class="invarseColor">
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
        <div class="row">

            <div class="product-details clearfix">
                <div class="span5">
                    <div class="product-title">
                        <h4><?php echo $produk[0]->namaProduk; ?></h4>
                    </div>
                    <div class="product-img">
                        <a class="fancybox" href="img/650x700.jpg"><img src="<?php echo base_url('produk/gambar/' . $produk[0]->gambarProduk); ?>" alt=""></a>
                    </div><!--end product-img-->
                </div><!--end span5-->

                <div class="span4">
                    <div class="product-set">
                        <div class="product-price">
                            <span><?php echo 'Rp. ' . number_format($produk[0]->hargaProduk, 0, ',', '.'); ?></span>
                        </div><!--end product-price-->
                        <div class="product-info">
                            <dl class="dl-horizontal">
                                <dt>Availabilty:</dt>
                                <dd>Available In Stock</dd>

                                <dt>Product Code:</dt>
                                <dd>No. CtAw9458</dd>

                                <dt>Manfactuer:</dt>
                                <dd>Nicka Corparation</dd>

                                <dt>Review Points:</dt>
                                <dd>25 Points</dd>
                            </dl>
                        </div><!--end product-info-->
                    </div><!--end product-set-->



                    <div class="product-tab">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#description" data-toggle="tab">Description</a>
                            </li>
                            <li>
                                <a href="#return-info" data-toggle="tab">Return Info</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <p>
                                    <?php echo $produk[0]->deskripsiProduk; ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="return-info">
                                <h4>Read our Returning info</h4><br>
                                <p>
                                    Suspendisse potenti. In non nisl sem, eu rutrum augue. Donec eu dolor vel massa ornare cursus id eget erat. Mauris in ante magna. Curabitur eget risus mi, non interdum lacus. Duis magna leo, rhoncus eget malesuada quis, semper a quam. Morbi imperdiet imperdiet lectus ac pellentesque. Integer diam sem, vulputate in feugiat ut, porttitor eu libero. Integer non dolor ipsum. Cras condimentum mattis turpis quis vestibulum. Nulla a augue ipsum. Donec aliquam velit vel metus fermentum dictum sodales metus condimentum. Nullam id massa quis nulla molestie ultrices eget sed nulla. Cras feugiat odio at tellus euismod lacinia.

                                </p>
                            </div>
                        </div><!--end tab-content-->
                    </div><!--end product-tab-->
                </div><!--end span4-->

            </div><!--end product-details-->

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

<div class="fb-comments" data-href="http://UKMunity.com/produk/<?php echo $produk[0]->id; ?>" data-width="720" data-numposts="5" data-colorscheme="light"></div>

                <!--<ul class="media-list">
                    <li class="media">
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#" class="invarseColor">John Doe1</a>
                            </h4>
                            <p>
                                consectetur adipiscing eli. Nulla tristique posuere felis vel pretium. Sed sit amet nisi elit. consectetur adipiscing eli. Nulla tristique posuere felis vel pretium. Sed sit amet nisi elit.
                            </p>
                        </div>
                    </li>
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
                        <input type="text" name="" value="" placeholder="Your Name...*" class="span4">
                        <input type="text" name="" value="" placeholder="E-Mail...*" class="span5">
                    </div>
                    <div class="controls">
                        <textarea name="" class="span9" placeholder="Your Message...*"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
                </form><!--end form-->
            <!--</div><!--end make-comment-->

        </div><!--end row-->

    </div><!--end span9-->

</div><!--end row-->