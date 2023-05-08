<style>
    <?php foreach($sliders as $slid):?>
    .carousel .item.item<?= $slid->id_slide;?>{
        background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url('uploads/slider/') . $slid->image_slide;?>) no-repeat;
        background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url('uploads/slider/') . $slid->image_slide;?>) no-repeat;
        background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url('uploads/slider/') . $slid->image_slide;?>) no-repeat;
        background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url('uploads/slider/') . $slid->image_slide;?>) no-repeat;
        background-size:cover;
    }
    <?php endforeach;?>
</style>
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner" role="listbox">
        <?php if($sliders != NULL):?>
            <?php for($i = 0; $i < count($sliders); $i++):?>

                <ol class="carousel-indicators">

                    <?php foreach($sliders as $slid):?>
                        <li data-target="#myCarousel" data-slide-to="<?= $sliders[$i]->id_slide;?>" class="<?php if($i === 0){?>active<?php }?>"></li>
                    <?php endforeach;?>
                </ol>
                    <div class="item item<?= $sliders[$i]->id_slide;?> <?php if($i === 0){?>active<?php }?>">

                <div class="container">
                            <div class="carousel-caption">
                                <h3><?php echo $sliders[$i]->titre_slide;?></h3>
                                <!--<p>Special for today</p> -->
                               <!-- <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>-->
                            </div>
                        </div>
                    </div>
            <?php endfor;?>
        <?php endif;?>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div>
<!-- //banner -->
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
            <?php foreach ($photosPub as $pub):?>
                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="<?php echo base_url();?>uploads/slider/<?php echo $pub->image_slide;?>" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>M</span>yExpress</h3>
                        <p><?php echo $pub->titre_slide;?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach;?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <h3 class="wthree_text_info">Articles <span>Promotions</span></h3>
        <div id="horizontalTabPromo">
            <ul class="resp-tabs-list">
                <?php if($allCategorie != NULL):?>
                    <?php foreach ($allCategorie as $cate):?>
                        <li><?php echo $cate->cate;?></li>
                    <?Php endforeach;?>
                <?php endif;?>
            </ul>
            <div class="resp-tabs-container">
                <!--/tab_one-->
                <div class="tab1">
                    <?php if ($categorieHommePromo != NULL):?>
                        <?php foreach($categorieHommePromo as $cateh):?>
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                    <div class="men-thumb-item">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateh->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateh->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                        <span class="product-new-top">New</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="#"><?php echo $cateh->prod;?></a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price"><?php echo $cateh->prix_promo;?>fdj</span>
                                            <del><?php echo $cateh->prix;?>fdj</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <a href="<?php echo base_url();?>Produit/PromoDetail/<?php echo $cateh->token;?>">
                                                <input type="submit" name="submit" value="Voir détail" class="button" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="tab2">
                    <?php if ($categorieFemmePromo != NULL):?>
                        <?php foreach($categorieFemmePromo as $catef):?>
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                    <div class="men-thumb-item">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catef->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catef->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                        <span class="product-new-top">New</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="#"><?php echo $catef->prod;?></a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price"><?php echo $catef->prix_promo;?>fdj</span>
                                            <del><?php echo $catef->prix;?>fdj</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <a href="<?php echo base_url();?>Produit/PromoDetail/<?php echo $catef->token;?>">
                                                <input type="submit" name="submit" value="Voir détail" class="button" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="tab3">
                    <?php if ($categorieEnfantPromo != NULL):?>
                        <?php foreach($categorieEnfantPromo as $catee):?>
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                    <div class="men-thumb-item">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catee->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catee->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                        <span class="product-new-top">New</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="#"><?php echo $catee->prod;?></a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price"><?php echo $catee->prix_promo;?>fdj</span>
                                            <del><?php echo $catee->prix;?>fdj</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <a href="<?php echo base_url();?>Produit/PromoDetail/<?php echo $catee->token;?>">
                                                <input type="submit" name="submit" value="Voir détail" class="button" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="tab4">
                    <?php if ($categorieAutrePromo != NULL):?>
                        <?php foreach($categorieAutrePromo as $catea):?>
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                    <div class="men-thumb-item">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catea->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                        <img src="<?php echo base_url();?>uploads/produit/<?php echo $catea->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                        <span class="product-new-top">New</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="#"><?php echo $catea->prod;?></a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price"><?php echo $catea->prix_promo;?>fdj</span>
                                            <del><?php echo $catea->prix;?>fdj</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <a href="<?php echo base_url();?>Produit/PromoDetail/<?php echo $catea->token;?>">
                                                <input type="submit" name="submit" value="Voir détail" class="button" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!--/grids-->
<!--/grids-->
<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">Nouveaux <span>Articles</span></h3>
				<div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <?php if($allCategorie != NULL):?>
                            <?php foreach ($allCategorie as $cate):?>
                                <li><?php echo $cate->cate;?></li>
                            <?Php endforeach;?>
                        <?php endif;?>
                    </ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
						<div class="tab1">
                            <?php if ($categorieHomme != NULL):?>
                                <?php foreach($categorieHomme as $cateh):?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                            <div class="men-thumb-item">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateh->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateh->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                                <span class="product-new-top">New</span>
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="#"><?php echo $cateh->prod;?></a></h4>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $cateh->token;?>">
                                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab2">
                            <?php if ($categorieFemme != NULL):?>
                                <?php foreach($categorieFemme as $catef):?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                            <div class="men-thumb-item">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $catef->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $catef->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                                <span class="product-new-top">New</span>
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="#"><?php echo $catef->prod;?></a></h4>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $catef->token;?>">
                                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab3">
                            <?php if ($categorieEnfant != NULL):?>
                                <?php foreach($categorieEnfant as $cateE):?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                            <div class="men-thumb-item">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateE->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $cateE->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                                <span class="product-new-top">New</span>
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="#"><?php echo $cateE->prod;?></a></h4>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $cateE->token;?>">
                                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab4">
                            <?php if ($categorieAutre != NULL):?>
                                <?php foreach($categorieAutre as $catea):?>
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem" style="height: 356px;">
                                            <div class="men-thumb-item">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $catea->image;?>" alt="" class="pro-image-front" style="height: 200px;">
                                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $catea->image;?>" alt="" class="pro-image-back" style="height: 200px;">
                                                <span class="product-new-top">New</span>
                                            </div>
                                            <div class="item-info-product ">
                                                <h4><a href="#"><?php echo $catea->prod;?></a></h4>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $catea->token;?>">
                                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                            <div class="clearfix"></div>
                        </div>
					</div>
				</div>	
			</div>
		</div>
	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
				<h6>Devenez une boutique dans MyExpress</h6>
				<a class="hvr-outline-out button2" href="<?php echo base_url();?>Fournisseur/devenirFournisseur">S'enregistrer</a>
			</div>
		</div>
	<!-- //we-offer -->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>LIVRAISON A DOMICILE</h3>
						<p>On se charge de la livraison à domicile.</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>DISPONIBILITE 24H/7JRS</h3>
						<p>L'équipe suppport sont disponible.</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>PAIMENT A LA LIVRAION</h3>
						<p>Le paiement se déroule à la livraison.</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>PAIEMENT EN LIGNE</h3>
						<p>Paiement en ligne avec D-Money.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->