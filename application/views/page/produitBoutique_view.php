<section id="advertisement">
    <div class="container">
        <form action="<?php echo base_url();?>Produit/produitSousCategorie" method="post">
            <div class="col-md-4">
                <label for="categorie">Catégorie :</label>
                <select class="form-select" data-trigger name="cate" id="cate">
                    <option disabled selected>Choisissez une catégorie</option>
                    <?php if($categories != FALSE):?>
                        <?php foreach($categories as $cate):?>
                            <option value="<?php echo $cate->id_cate;?>"><?php echo $cate->cate;?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
                <span class="infoMessage"><?php echo form_error('cate'); ?></span>
            </div>
            <div class="col-md-4">
                <label for="categorie">Sous-catégorie :</label>
                <select class="form-select" data-trigger name="subcate" id="subcate">
                </select>
                <span class="infoMessage"><?php echo form_error('subcate'); ?></span>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary btnSearch" type="submit" id="searchButton">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php  $this->load->view('template/page_droit');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items" id="features_items"><!--features_items-->
                    <h2 class="title text-center">Tous les produits</h2>
                    <?php if($produitByBoutique != false):?>
                        <?php foreach($produitByBoutique as $all):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo base_url();?>uploads/produit/<?= $all->image;?>" alt="" />
                                            <h2><?= $all->prix;?>fdj</h2>
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