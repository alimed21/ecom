<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Liste des commandes</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                        <tr>
                            <th>N°Commande</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Prix total</th>
                            <th>Nom client</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Date</th>
                            <th>Etat</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($commandeListe != false):?>
                            <?php foreach ($commandeListe as $liste): ?>
                                <tr>
                                    <td><?= $liste->code_cmd;?></td>
                                    <td><?= $liste->prod;?></td>
                                    <td><?= $liste->quantite;?></td>
                                    <?php if($liste->promo == "non"):?>
                                        <td><?php echo $liste->prix;?>fdj</td>
                                    <?php else:?>
                                        <td><?php echo $liste->prix_promo;?>fdj</td>
                                    <?php endif;?>
                                    <td><?= $liste->totalPrix;?>fdj</td>
                                    <td><?= $liste->nom;?></td>
                                    <td><?= $liste->telephone;?></td>
                                    <td>
                                        <?php echo $liste->email;?>
                                    </td>
                                    <td>
                                        <?php echo $liste->adresse;?>
                                    </td>
                                    <td>
                                        <?php echo date("d/m/Y h:ia", strtotime($liste->date_cmd));?>
                                    </td>
                                    <td>
                                        <?php if($liste->valid_four_cmd == NULL && $liste->date_valid_four == NULL):?>
                                            <p class="h5"><span class="badge bg-primary">En cour</span></p>
                                        <?php endif;?>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        <?php else:?>
                        <?php endif;?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


