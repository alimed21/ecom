<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Gestion des utilisateurs
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Ajout d'un utilisateur</h5>
                        <form class="" action="<?php echo base_url();?>Admin/Administrateur/VerifyForm" method="post">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Nom d'utilisateur</label>
                                <input name="username" id="username" placeholder="Saisissez un nom d'utilisateur " type="text" class="form-control">
                                <span class="infoMessage"><?php echo form_error('username'); ?></span>

                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Mot de passe</label>
                                <input name="password" id="password" placeholder="Saisissez un mot de passe" type="password" class="form-control">
                                <span class="infoMessage"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="email" placeholder="Saisissez un email valide " type="email" class="form-control">
                                <span class="infoMessage"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleSelect" class="">Fournisseurs</label>
                                <select name="four" id="four" class="form-control">
                                    <?php foreach($fournisseurs as $four):?>
                                        <option value="<?php echo $four->id_four;?>"><?php echo $four->nom_four;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleSelect" class="">Rôle d'utilisateur</label>
                                <select name="role" id="role" class="form-control">
                                    <?php foreach($roles as $role):?>
                                        <option value="<?php echo $role->id_role;?>"><?php echo $role->role;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <button class="mt-1 btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des utilisateurs</h5>
                        <div class="table-responsive">
                            <?php if ( $this->session->flashdata( 'error' ) ) :?>
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                            <?php endif;?>
                            <?php if ( $this->session->flashdata( 'success' ) ) :?>
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                            <?php endif;?>
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Nome d'utilisateur</th>
                                    <th>Email</th>
                                    <th>Fournisseur</th>
                                    <th>Rôle</th>
                                    <th>Ajouter par</th>
                                    <th>Ajouter le</th>
                                    <th>Modifier</th>
                                    <th>Bloquer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($listesUtilisateurs != NULL):?>
                                    <?php foreach($listesUtilisateurs as $user):?>
                                        <tr>
                                            <td>
                                                <?php echo $user->username;?>
                                            </td>
                                            <td>
                                                <?php echo $user->email;?>
                                            </td>
                                            <td>
                                                <?php echo $user->nom_four;?>
                                            </td>
                                            <td>
                                                <?php echo $user->role;?>
                                            </td>
                                            <td>
                                                <?php echo $user->date_add;?>
                                            </td>
                                            <td>
                                                <?php echo $user->login_admin;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/modificationUtilisateur/<?php echo $user->id_user;?>">
                                                    <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/bloquerUtilisateur/<?php echo $user->id_user;?>">
                                                    <i class="fa fa-ban" style="color:red"></i>
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
