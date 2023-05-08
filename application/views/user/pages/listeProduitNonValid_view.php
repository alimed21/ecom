<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/logo.png" alt="" style="width: 179px;margin-left: -69px;">
                    </div>
                    <div>Gestion des produits
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
                    <div class="card-body"><h5 class="card-title">Liste des produits non valides</h5>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>N°Produit</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <th>Prix</th>
                                    <th>Téléphone</th>
                                    <th>Ajouter par</th>
                                    <th>Ajouter le</th>
                                    <th>Valider</th>
                                    <th>Refu</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if($listeProduits != NULL):?>
                                        <?php foreach($listeProduits as $pro):?>
                                            <tr>
                                                <td>
                                                    <?php echo $pro->token;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->prod;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->cate;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->prix;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->telephone;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->username;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->date_prod;?>
                                                </td>

                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/validProduit/<?php echo $pro->token;?>">
                                                        <i class="fa fa-check" style="color:cornflowerblue"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/refuProduit/<?php echo $pro->token;?>">
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
