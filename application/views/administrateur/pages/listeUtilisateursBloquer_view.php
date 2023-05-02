<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Liste des comptes bloqués</h4>
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
                            <th>Bloquer par</th>
                            <th>Bloquer le</th>
                            <th>Débloquer</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($listesUtilisateursBloquer != false):?>
                            <?php foreach ($listesUtilisateursBloquer as $liste): ?>
                                <tr>
                                    <td><?= $liste->username;?></td>
                                    <td><?= $liste->email;?></td>
                                    <td><?= $liste->nom_boutique;?></td>
                                    <td><?= $liste->code_boutique;?></td>
                                    <td><?= $liste->login_admin;?></td>
                                    <td>
                                        <?= date("d-m-Y", strtotime($liste->date_delete));?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url();?>Admin/Utilisateur/debloquerUtilisateur/<?php echo $liste->id_user;?>" onclick="return confirm('Etes-vous sûr de vouloir de débloquer ce compte?');">
                                            <i class="icon">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #4878dd;">
                                                    <path opacity="0.4" d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z" fill="currentColor"></path>                                <path d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z" fill="currentColor"></path>
                                                </svg>
                                            </i>
                                        </a>
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

