<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/logo.png" alt="" style="width: 179px;margin-left: -69px;">
                    </div>
                    <div>Gestion des rôles
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Ajout d'un utilisateur</h5>
                        <form class="" action="<?php echo base_url();?>Admin/Administrateur/modificationUtilisateurValider" method="post">
                            <?php foreach($detailUtilisateur as $detail):?>
                                <div class="position-relative form-group"><label for="exampleEmail" class="">Nom d'utilisateur</label><input name="username" id="username" placeholder="Saisissez un nom d'utilisateur " type="text" class="form-control" value="<?php echo $detail->username;?>"></div>
                                <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name="email" id="email" placeholder="Saisissez un email valide " type="email" class="form-control" value="<?php echo $detail->email;?>"></div>
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Rôle d'utilisateur</label><select name="role" id="role" class="form-control">
                                        <?php foreach($roles as $role):?>
                                            <option value="<?php echo $role->id_role;?>"><?php echo $role->role;?></option>
                                        <?php endforeach;?>
                                    </select></div>
                            <?php endforeach;?>
                            <button class="mt-1 btn btn-primary">Ajouter</button>
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
                                    <th>Nome d'utilisateur</th>
                                    <th>Email</th>
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
