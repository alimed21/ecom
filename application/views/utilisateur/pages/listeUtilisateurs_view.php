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
                            <th>Supprimer</th>
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
                                           En cour de validation
                                        <?php else:?>
                                            Compte valider
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url();?>Admin/Utilisateur/supprimerUtilisateur/<?php echo $liste->id_user;?>" onclick="return confirm('Etes-vous sûr de vouloir bloquer ce compte?');">
                                            <i class="icon">
                                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: red;">
                                                    <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                                                </svg>
                                            </i>
                                        </a>
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

