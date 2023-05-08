<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Catégories</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#Homme">
                            <?php if($ssCatH!= false):?><span class="badge pull-right"><i class="fa fa-plus"></i></span> <?php endif;?>
                            Hommes
                        </a>
                    </h4>
                </div>
                <div id="Homme" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php if($ssCatH!= false):?>
                                <?php foreach($ssCatH as $cat):?>
                                    <li><a href="<?php echo base_url();?>Produit/SousCategorie/<?php echo $cat->titre_ss_cate;?>"><?= $cat->titre_ss_cate;?></a></li>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#Femme">
                            <?php if($ssCatF!= false):?><span class="badge pull-right"><i class="fa fa-plus"></i></span><?php endif;?>
                            Femmes
                        </a>
                    </h4>
                </div>
                <div id="Femme" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php if($ssCatF!= false):?>
                                <?php foreach($ssCatF as $cat):?>
                                    <li><a href="<?php echo base_url();?>Produit/SousCategorie/<?php echo $cat->titre_ss_cate;?>"><?= $cat->titre_ss_cate;?></a></li>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#Enfant">
                            <?php if($ssCatE!= false):?> <span class="badge pull-right"><i class="fa fa-plus"></i></span> <?php endif;?>
                            Enfants
                        </a>
                    </h4>
                </div>
                <div id="Enfant" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php if($ssCatE!= false):?>
                                <?php foreach($ssCatE as $cat):?>
                                    <li><a href="<?php echo base_url();?>Produit/SousCategorie/<?php echo $cat->titre_ss_cate;?>"><?= $cat->titre_ss_cate;?></a></li>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#Autre">
                            <?php if($ssCatA!= false):?>
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <?php endif;?>
                            Autres
                        </a>
                    </h4>
                </div>
                <div id="Autre" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php if($ssCatA!= false):?>
                                <?php foreach($ssCatA as $cat):?>
                                    <li><a href="<?php echo base_url();?>Produit/SousCategorie/<?php echo $cat->titre_ss_cate;?>"><?= $cat->titre_ss_cate;?></a></li>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/category-products-->
        <div class="brands_products"><!--brands_products-->
            <h2>Les meilleures ventes</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php if($meilleursProduits != false):?>
                        <?php foreach($meilleursProduits as $pro):?>
                            <li><a href="<?= base_url();?>Produit/detail/<?= $pro->token;?>"> <span class="pull-right">(<?= $pro->cmd;?>)</span><?= $pro->prod;?></a></li>
                        <?php endforeach;?>
                    <?php else:?>
                        <li>Aucun produit trouvé</li>
                    <?php endif;?>
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Top boutiques</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php if($topBoutiques != false):?>
                        <?php foreach($topBoutiques as $bou):?>
                            <li><a href="#"> <span class="pull-right">(<?= $bou->cmd;?>)</span><?= $bou->nom_boutique;?></a></li>
                        <?php endforeach;?>
                    <?php else:?>
                        <li>Aucune boutique trouvée</li>
                    <?php endif;?>
                </ul>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="<?php echo base_url();?>assets/front/images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>