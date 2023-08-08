<div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>ShopyGram</h1>
                                <p>Plateforme e-commerce.</p>
                            </div>
                            <div>
                                <a href="<?php echo base_url();?>Utilisateur/ajouter" class="btn btn-link btn-primary">
                                    Nouveau utilisateur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>          <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Liste des comptes</h4>
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
                            <th>Nom d'utilisateur</th>
                            <th>Adresse électronique</th>
                            <th>Boutique</th>
                            <th>Code</th>
                            <th>Inscrit le</th>
                            <th>Etat</th>
                            <!--<th>Supprimer</th>-->
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($listesUtilisateurs != false):?>
                            <?php foreach ($listesUtilisateurs as $liste): ?>
                                <tr>
                                    <td><?= $liste->username;?></td>
                                    <td><?= $liste->email;?></td>
                                    <td><?= $liste->nom_boutique;?></td>
                                    <td><?= $liste->code_boutique;?></td>
                                    <td>
                                        <?= date("d-m-Y", strtotime($liste->date_inscrit));?>
                                    </td>
                                    <td>
                                        <?php if($liste->id_admin_valid == null && $liste->date_valid == null):?>
                                            <span class="badge bg-warning" style="font-size: 15px;">En attente</span>
                                        <?php else:?>
                                           <span class="badge bg-primary" style="font-size: 15px;">Active</span>
                                        <?php endif;?>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        <?php else:?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

