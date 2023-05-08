        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon" style="background: #495057;">
                                <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                            </div>
                            <div>
                                Gestion des rôles
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Ajout d'un rôle</h5>
                                <?php if ( $this->session->flashdata( 'error' ) ) :?>
                                    <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                                <?php endif;?>
                                <?php if ( $this->session->flashdata( 'success' ) ) :?>
                                    <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                                <?php endif;?>
                                <form action="<?php echo base_url();?>Admin/Administrateur/ajoutRole" method="post">
                                    <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Rôle</label>
                                        <div class="col-sm-10"><input name="role" id="role" placeholder="Saisi d'un rôle" type="text" class="form-control"></div>
                                        <span class="infoMessage"><?php echo form_error('role'); ?></span>
                                    </div>

                                    <div class="position-relative row form-check">
                                        <div class="col-sm-10 offset-sm-2">
                                            <button class="btn btn-secondary">Ajouter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Liste des rôles</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table">
                                        <thead>
                                        <tr>
                                            <th>Rôle</th>
                                            <th>Ajouter par</th>
                                            <th>Ajouter le</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($listesRoles != NULL):?>
                                            <?php foreach($listesRoles as $role):?>
                                                <tr>
                                                    <td>
                                                        <?php echo $role->role;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $role->date_add;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $role->login_admin;?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url();?>Admin/Administrateur/modificationRole/<?php echo $role->id_role;?>">
                                                            <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                        </a>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url();?>Admin/Administrateur/suppressionRole/<?php echo $role->id_role;?>">
                                                            <i class="fa fa-trash" style="color:red"></i>
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
