<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/logo.png" alt="" style="width: 179px;margin-left: -69px;">
                    </div>
                    <div>Gestion des utilisateurs
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
           $this->db->where('cmd.id_four', $idFour);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is null');
        $this->db->where('cmd.date_valid_four is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('date_delete_cmd is null');
                                         </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                            File Disabled
                                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des utilisateurs</h5>
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
