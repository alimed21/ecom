<section id="advertisement">
    <div class="container">
        <img src="<?php echo base_url();?>assets/front/images/banniere.png" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php  $this->load->view('template/page_droit');?>

            <div class="col-sm-9 padding-right">
                <div class="features_items" id="features_items"><!--features_items-->
                    <h2 class="title text-center">Tous les produits</h2>
                    <?php if($allProduit != false):?>
                        <?php foreach($allProduit as $all):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo base_url();?>uploads/produit/<?= $all->image;?>" alt="" />
                                            <?php if($all->promo == 'non'):?>
                                                <h2><?= $all->prix;?>fdj</h2>
                                            <?php else:?>
                                                <h2><del><?= $all->prix;?>fdj</del></h2>
                                                <h2><?= $all->prix_promo;?>fdj</h2>
                                            <?php endif;?>
                                            <p><?= $all->prod;?></p>
                                            <a href="<?= base_url();?>Produit/detail/<?= $all->token;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Voir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div class="col-md-12">
                            <ul class="pagination">
                                <!-- Show pagination links -->
                                <?php foreach ($links as $link) {
                                    echo "<li style='margin:10px; display:block;'>". $link."</li>";
                                } ?>
                            </ul>
                        </div>
                    <?php else:?>
                    <?php endif;?>
                </div><!--features_items-->
                <div class="search_item" id="search_item">

                </div>
            </div>
        </div>
    </div>
</section>