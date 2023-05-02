<section>
    <div class="container">
        <div class="row">
            <?php  $this->load->view('template/page_droit');?>
            <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <?php if($photosProduit != false):?>
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <?php $count = 1;?>
                                    <?php $slide = 1;?>
                                    <?php foreach($photosProduit as $pho):?>
                                        <img class="mySlides" src="<?= base_url();?>uploads/images/<?= $pho->photo_name;?>" <?php if($slide == 1){?> style="width:100%;" <?php } else{ ;?> style="width:100%;display:none" <?php } ;?> alt="" />
                                        <?php $slide++; ?>
                                    <?php endforeach;?>
                                </div>

                                <?php foreach($photosProduit as $pho):?>
                                    <div class="col-md-4 slidImg">
                                        <img  class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url();?>uploads/images/<?= $pho->photo_name;?>" style="width:100%;cursor:pointer" onclick="currentDiv(<?= $count;?>)" alt="">
                                        <?php $count++; ?>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php else:?>
                        <?php endif;?>
                        <?php if($produitDetail != false):?>
                            <div class="col-sm-7">
                                <?php foreach($produitDetail as $prod):?>
                                    <div class="product-information"><!--/product-information-->
                                    <img src="<?php echo base_url();?>assets/front/images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2><?= $prod->prod;?></h2>
                                    <p>Numéro: <?= $prod->token;?></p>
                                    <img src="<?php echo base_url();?>assets/front/images/product-details/rating.png" alt="" />
                                    <span>
									<span><?= $prod->prix;?>fdj</span>
                                        <?php if(!$this->session->userdata('id_client')):?>
                                            <a href="<?php echo base_url();?>Connexion">
                                                <button type="button" class="btn btn-fefault cart">
                                                  <i class="fa fa-lock"></i> Connexion
                                                </button>
                                            </a>
                                        <?php else:?>
                                            <form action="<?php echo base_url();?>Produit/commanderProduit" method="post">
                                                <input type="hidden" name="token" value="<?php echo $prod->token;?>">
                                                 <label>Quantité:</label>
                                                <input type="number" name="quantite" id="quantite" class="control-form" min="1" value="1" />
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Commander
                                                </button>
                                            </form>
                                        <?php endif;?>

								    </span>
                                    <?php if($prod->quantite != 0):?>
                                        <p><b>Quantité en stock:</b> <?= $prod->quantite;?></p>
                                    <?php else:?>
                                        <p><b>Quantité en stock:</b> 0</p>
                                    <?php endif;?>
                                    <p><b>Boutique:</b> <?= $prod->nom_boutique;?></p>
                                    <a href=""><img src="<?php echo base_url();?>assets/front/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                                </div><!--/product-information-->
                                <?php endforeach;?>
                                <?php if ( $this->session->flashdata( 'success' ) ) :?>
                                    <div class="alert alert-success" role="alert">
                                        <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('success'); ?></h2>
                                    </div>
                                <?php endif;?>
                                <?php if ( $this->session->flashdata( 'error' ) ) :?>
                                    <div class="alert alert-danger" role="alert">
                                        <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php else:?>
                        <?php endif;?>
                    </div><!--/product-details-->


                <?php if($plusProduit != false):?>
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center"><?= $nomBoutique;?></h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php foreach($plusProduit as $plus):?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?php echo base_url();?>uploads/produit/<?= $plus->image;?>" alt="" />
                                                        <h2><?= $plus->prix;?>fdj</h2>
                                                        <p><?= $plus->prod;?></p>
                                                        <a href="<?= base_url();?>Produit/detail/<?= $plus->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else:?>
                <?php endif;?>
               <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>