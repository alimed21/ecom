<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                        Gestion des commandes
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des commandes en attendant</h5>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php endif;?>
                        <?php if ( $this->session->flashdata( 'success' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                        <?php endif;?>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>N°Commande</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix</th>
                                    <th>Nom client</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Date</th>
                                    <th>Valider</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($listeCommandes != NULL):?>
                                    <?php foreach($listeCommandes as $cmd):?>
                                        <tr>
                                            <td>
                                                <?php echo $cmd->code_cmd;?>
                                            </td>
                                            <td>
                                                <?php echo $cmd->prod;?>
                                            </td>
                                            <td>
                                                0
                                            </td>
                                            <?php if($cmd->promo == "non"):?>
                                                <td><?php echo $cmd->prix;?>fdj</td>
                                            <?php else:?>
                                                <td><?php echo $cmd->prix_promo;?>fdj</td>
                                            <?php endif;?>
                                            <td>
                                                <?php echo $cmd->nom;?>
                                            </td>
                                            <td>
                                                <?php echo $cmd->telephone;?>
                                            </td>
                                            <td>
                                                <?php echo $cmd->email;?>
                                            </td>
                                            <td>
                                                <?php echo $cmd->adresse;?>
                                            </td>
                                            <td>
                                                <?php echo date("d/m/Y h:ia", strtotime($cmd->date_cmd));?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Commande/validCommande/<?php echo $cmd->code_cmd;?>">
                                                    <i class="fa fa-check" style="color:cornflowerblue"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Commande/rejetCommande/<?php echo $cmd->code_cmd;?>">
                                                    <i class="fa fa-trash" style="color:darkred"></i>
                                                </a>
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
    </div>
