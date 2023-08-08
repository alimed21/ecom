<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <?php if($photos != false):?>
                        <?php $active = 0;?>
                        <?php foreach ($photos as $ph):?>
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel<?= $active;?>" data-slide-to="<?php echo $active;?>>" class="<?php if($active == 0){?>active<?php }?>"></li>
                            </ol>
                            <?php $active++;?>
                        <?php endforeach;?>
                    <?php else:?>
                    <?php endif;?>

                    <?php if($photos != false):?>
                        <div class="carousel-inner">
                            <?php $active = 0;?>
                            <?php foreach ($photos as $ph):?>
                                <div class="item <?php if($active === 0){?>active<?php }?>">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2><?= $ph->titre_slide;?></h2>
                                    <p><?= $ph->text_image;?></p>
                                    <button type="button" class="btn btn-default get">Voir</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo base_url();?>uploads/slider/<?= $ph->image_slide;?>" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                                <?php $active++;?>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <?php  $this->load->view('template/page_droit');?>
            <div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Nouveaux articles</h2>
                    <div class="recommended_items"><!--recommended_items-->
                        <?php if($nouveauArticles != false):?>
                                <?php foreach($nouveauArticles as $art):?>
                					<div class="col-sm-4">
            							<div class="product-image-wrapper">
            								<div class="single-products">
        										<div class="productinfo text-center">
        											<img src="<?php echo base_url();?>uploads/produit/<?= $art->image;?>" alt="" />
        											<h2><?= $art->prix;?>fdj</h2>
        											<p><?= $art->prod;?></p>
        											<a href="<?php echo base_url();?>Produit/detail/<?= $art->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
        										</div>
            								</div>
            							</div>
            						</div>
                                <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    <div class="col-md-12 lienVoirPlus">
                        <a href="<?= base_url();?>Produit/tousLesProduits">
                            Voir plus
                        </a>
                    </div>
                </div><!--features_items-->

                <div class="category-tab"><!--category-tab-->
                    <h2 class="title text-center">Articles par catégories</h2>
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Hommes" data-toggle="tab">Hommes</a></li>
                            <li><a href="#Femmes" data-toggle="tab">Femmes</a></li>
                            <li><a href="#Enfants" data-toggle="tab">Enfants</a></li>
                            <li><a href="#Autres" data-toggle="tab">Autres</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="Hommes">
                            <?php if($produitH != false):?>
                                <?php foreach($produitH as $prodCat):?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url();?>uploads/produit/<?= $prodCat->image;?>" alt="" />
                                                    <?php if($prodCat->promo == "non"):?>
                                                        <h2><?= $prodCat->prix;?>fdj</h2>
                                                    <?php else:?>
                                                        <h2><del><?= $prodCat->prix;?>fdj</del></h2>
                                                        <h2><?= $prodCat->prix_promo;?>fdj</h2>
                                                    <?php endif;?>
                                                        <p><?= $prodCat->prod;?></p>
                                                    <a href="<?php echo base_url();?>Produit/detail/<?= $art->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="col-md-12 lienVoirPlus">
                                    <a href="<?= base_url();?>Produit/produitCategorie/<?= $cateHomme;?>">
                                        Voir plus
                                    </a>
                                </div>
                            <?php else:?>
                                <div class="col-md-12">
                                    <img src="<?php echo base_url();?>assets/images/img/404.png"/>
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="tab-pane fade" id="Femmes">
                            <?php if($produitF != false):?>
                                <?php foreach($produitF as $prodCat):?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url();?>uploads/produit/<?= $prodCat->image;?>" alt="" />
                                                     <?php if($prodCat->promo == "non"):?>
                                                        <h2><?= $prodCat->prix;?>fdj</h2>
                                                    <?php else:?>
                                                        <h2><del><?= $prodCat->prix;?>fdj</del></h2>
                                                        <h2><?= $prodCat->prix_promo;?>fdj</h2>
                                                    <?php endif;?>
                                                        <p><?= $prodCat->prod;?></p>
                                                    <a href="<?php echo base_url();?>Produit/detail/<?= $art->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="col-md-12 lienVoirPlus">
                                    <a href="<?= base_url();?>Produit/produitCategorie/<?= $cateFemme;?>">
                                        Voir plus
                                    </a>
                                </div>
                            <?php else:?>
                                 <div class="col-md-12">
                                    <img src="<?php echo base_url();?>assets/images/img/404.png"/>
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="tab-pane fade" id="Enfants">
                            <?php if($produitE != false):?>
                                <?php foreach($produitE as $prodCat):?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url();?>uploads/produit/<?= $prodCat->image;?>" alt="" />
                                                   <?php if($prodCat->promo == "non"):?>
                                                        <h2><?= $prodCat->prix;?>fdj</h2>
                                                    <?php else:?>
                                                        <h2><del><?= $prodCat->prix;?>fdj</del></h2>
                                                        <h2><?= $prodCat->prix_promo;?>fdj</h2>
                                                    <?php endif;?>
                                                        <p><?= $prodCat->prod;?></p>
                                                    <a href="<?php echo base_url();?>Produit/detail/<?= $art->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="col-md-12 lienVoirPlus">
                                    <a href="<?= base_url();?>Produit/produitCategorie/<?= $cateEnfant;?>">
                                        Voir plus
                                    </a>
                                </div>
                            <?php else:?>
                                 <div class="col-md-12">
                                    <img src="<?php echo base_url();?>assets/images/img/404.png"/>
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="tab-pane fade" id="Autres">
                            <?php if($produitA != false):?>
                                <?php foreach($produitA as $prodCat):?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url();?>uploads/produit/<?= $prodCat->image;?>" alt="" />
                                                    <?php if($prodCat->promo == "non"):?>
                                                        <h2><?= $prodCat->prix;?>fdj</h2>
                                                    <?php else:?>
                                                        <h2><del><?= $prodCat->prix;?>fdj</del></h2>
                                                        <h2><?= $prodCat->prix_promo;?>fdj</h2>
                                                    <?php endif;?>
                                                        <p><?= $prodCat->prod;?></p>
                                                    <a href="<?php echo base_url();?>Produit/detail/<?= $art->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="col-md-12 lienVoirPlus">
                                    <a href="<?= base_url();?>Produit/produitCategorie/<?= $cateAutre;?>">
                                        Voir plus
                                    </a>
                                </div>
                            <?php else:?>
                                 <div class="col-md-12">
                                    <img src="<?php echo base_url();?>assets/images/img/404.png" style="padding-top: 10px;padding-bottom: 10px;"/>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Articles en promotion</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php if($produitPromo != false):?>
                                <div class="item active">
                                    <?php foreach($produitPromo as $promo):?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?php echo base_url();?>uploads/produit/<?= $promo->image;?>" alt="" />
                                                        <h2><?= $promo->prod;?></h2>
                                                        <p><del><?= $promo->prix;?>fdj</del></p>
                                                        <p><?= $promo->prix_promo;?>fdj</p>
                                                        <a href="<?php echo base_url();?>Produit/detail/<?= $promo->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                            <?php if($produitPromo2 != false):?>
                                <div class="item">
                                    <?php foreach($produitPromo2 as $promo):?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?php echo base_url();?>uploads/produit/<?= $promo->image;?>" alt="" />
                                                        <p><del><?= $promo->prix;?>fdj</del></p>
                                                        <p><?= $promo->prix_promo;?>fdj</p>
                                                        <a href="<?php echo base_url();?>Produit/detail/<?= $promo->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="col-md-12 lienVoirPlus">
                        <a href="<?= base_url();?>Produit/tousLesProduitsPromotions">
                            Voir plus
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
