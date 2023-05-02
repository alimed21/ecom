<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Tableau de bord</div>
                </div>
                <div class="page-title-actions">
                </div>
            </div>
        </div>            <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Stock</div>
                            <div class="widget-subheading">Article disponible</div>
                        </div>
                        <div class="widget-content-right">
                            <?php foreach ($stock as $s):?>
                                <div class="widget-numbers text-white"><span><?php echo $s->prod;?></span></div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Clients</div>
                            <div class="widget-subheading">Nombre de vos clients</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $countClient->nbreClient;?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Commande</div>
                            <div class="widget-subheading">en attendant</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $countCommandes->totalCmd;?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Articles récents
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">N°Produit </th>
                                <th>Produit</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Prix </th>
                                <th class="text-center">Ajouter le</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if($lastProduits != FALSE):?>
                                    <?php foreach ($lastProduits as $prod):?>
                                        <tr>
                                    <td class="text-center text-muted"><?php echo $prod->token;?></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><?php echo $prod->prod;?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo $prod->quantite;?></td>
                                    <td class="text-center">
                                        <div class="badge badge-warning"><?php echo $prod->prix;?></div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning"><?php echo date("d-m-Y", strtotime($prod->date_prod));?></div>
                                    </td>
                                </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Dépenses total</div>
                                <div class="widget-subheading"></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-success">
                                   <?php echo $totalPrix->prix * $totalQuantite->quantite * $totalProduit->prod;?>fdj
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Dépense promo</div>
                                <div class="widget-subheading"></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning"> <?php echo $totalPrix->prix;?>fdj</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Recettes</div>
                                <div class="widget-subheading"></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-danger">0fdj</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Income</div>
                                <div class="widget-subheading">Expected totals</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-focus">$147</div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">Expenses</div>
                                <div class="sub-label-right">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>