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
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Boutiques</div>
                            <div class="widget-subheading">Nombre de boutiques</div>
                        </div>
                        <div class="widget-content-right">
                            <?php foreach ($boutiques as $bouti):?>
                                <div class="widget-numbers text-white"><span><?php echo $bouti->boutique;?></span></div>
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
                            <div class="widget-subheading">Nombres des clients inscrits</div>
                        </div>
                        <div class="widget-content-right">
                            <?php foreach ($clients as $client):?>
                                <div class="widget-numbers text-white"><span><?php echo $client->client;?></span></div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Commandes</div>
                            <div class="widget-subheading">Nombres commandes passer</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $commandes->commande;?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Articles</div>
                            <div class="widget-subheading">Articles disponibles</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $listesProduits->prod;?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Quantite</div>
                            <div class="widget-subheading">Quantites des articles disponibles</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $quantiteStock->quantite;?></span></div>
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
                                <th>N°Commande </th>
                                <th>Code commande</th>
                                <th>Client</th>
                                <th>Fournisseur</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix a payer</th>
                                <th>Etat commande</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($listesCommandes != FALSE):?>
                                <?php foreach ($listesCommandes as $cmd):?>
                                    <tr>
                                        <td class="text-muted"><?php echo $cmd->id_cmd;?></td>
                                        <td class="text-muted"><?php echo $cmd->code_cmd;?></td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?php echo $cmd->username;?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $cmd->nom_four;?></td>
                                        <td><?php echo $cmd->prod;?></td>
                                        <td><?php echo $cmd->quantite;?></td>
                                        <td>
                                            <div class="badge badge-warning"><?php echo $cmd->totalPrix;?></div>
                                        </td>
                                        <td>
                                            <?php if ($cmd->date_valid_four != NULL):?>
                                                Commande livrée
                                            <?php else:?>
                                                Commande en cour
                                            <?php endif;?>
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
    </div>