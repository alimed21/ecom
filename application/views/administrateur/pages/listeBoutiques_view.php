<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Liste des boutiques non valider</h4>
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
                            <th>Boutique</th>
                            <th>Nom du gérant</th>
                            <th>Téléphone du gérant</th>
                            <th>Adresse électronique</th>
                            <th>Voir plus</th>
                            <th>Valider</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php if($listeBoutiques != false):?>
                                <?php foreach ($listeBoutiques as $liste): ?>
                                    <tr>
                                        <td><?= $liste->nom_boutique;?></td>
                                        <td><?= $liste->nom_gerant_boutique;?></td>
                                        <td><?= $liste->tele_gerant;?></td>
                                        <td><?= $liste->email_gerant;?></td>
                                        <td>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#voirPLus<?php echo $liste->code_boutique;?>" style="background: none;border: none;">
                                                <i class="icon">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #1f9126;">
                                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M17.7366 6.04606C19.4439 7.36388 20.8976 9.29455 21.9415 11.7091C22.0195 11.8924 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8924 2.05854 11.7091C4.14634 6.87903 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12Z" fill="currentColor"></path>                                <path d="M14.4308 11.997C14.4308 13.3255 13.3381 14.4115 12.0015 14.4115C10.6552 14.4115 9.5625 13.3255 9.5625 11.997C9.5625 11.8321 9.58201 11.678 9.61128 11.5228H9.66006C10.743 11.5228 11.621 10.6695 11.6601 9.60184C11.7674 9.58342 11.8845 9.57275 12.0015 9.57275C13.3381 9.57275 14.4308 10.6588 14.4308 11.997Z" fill="currentColor"></path>
                                                    </svg>
                                                </i>
                                            </button>
                                        </td>
                                        <td>
                                            <?php if($liste->id_admin_valid == null && $liste->date_valid == null):?>
                                                <a href="<?php echo base_url();?>Admin/Boutiques/validBoutique/<?php echo $liste->code_boutique;?>">
                                                    <i class="icon">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #4878dd;">
                                                            <path opacity="0.4" d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z" fill="currentColor"></path>                                <path d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z" fill="currentColor"></path>
                                                        </svg>
                                                    </i>
                                                </a>
                                            <?php else:?>
                                                Boutique valider
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url();?>Admin/Boutiques/supprimerBoutique/<?php echo $liste->code_boutique;?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette boutique?');">
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
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if($listeBoutiques != false):?>
    <?php foreach ($listeBoutiques as $liste): ?>
        <div class="modal fade" id="voirPLus<?php echo $liste->code_boutique;?>" tabindex="-1" aria-labelledby="voirPLus<?php echo $liste->code_boutique;?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="voirPLus<?php echo $liste->code_boutique;?>">Détails de <?php echo $liste->nom_boutique?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="right">
                            <h5>Information de la boutique : </h5>
                            <div class="divText">
                                <p>Nom : <?php echo $liste->nom_boutique;?></p>
                                <p>Numéro de téléphone : <?php echo $liste->tele_boutique;?></p>
                                <p>Adresse : <?php echo $liste->adr_boutique;?></p>
                            </div>
                        </div>
                        <div class="right">
                            <h5>Information du gérant : </h5>
                            <div class="divText">
                                <p>Nom : <?php echo $liste->nom_gerant_boutique;?></p>
                                <p>Numéro de téléphone : <?php echo $liste->tele_gerant;?></p>
                                <p>Adresse électronique : <?php echo $liste->email_gerant;?></p>
                            </div>
                        </div>
                        <div class="right">
                            <h5>Information supplémentaire : </h5>
                            <div class="divText">
                                <p>Télécharger la patente :
                                    <a href="<?php echo base_url();?>uploads/patente/<?php echo $liste->patente_boutique;?>" download>
                                        <i class="icon">
                                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4" d="M18.8089 9.021C18.3574 9.021 17.7594 9.011 17.0149 9.011C15.199 9.011 13.7059 7.508 13.7059 5.675V2.459C13.7059 2.206 13.503 2 13.2525 2H7.96436C5.49604 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59109 22 8.1703 22H16.0455C18.5059 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6238 9.016 19.1168 9.021 18.8089 9.021Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1732 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>                                <path d="M15.1052 12.7088C14.8132 12.4198 14.3432 12.4178 14.0512 12.7108L12.4622 14.3078V9.48084C12.4622 9.06984 12.1282 8.73584 11.7172 8.73584C11.3062 8.73584 10.9722 9.06984 10.9722 9.48084V14.3078L9.38224 12.7108C9.09124 12.4178 8.62024 12.4198 8.32924 12.7088C8.03724 12.9988 8.03724 13.4698 8.32624 13.7618L11.1892 16.6378H11.1902C11.2582 16.7058 11.3392 16.7608 11.4302 16.7988C11.5202 16.8358 11.6182 16.8558 11.7172 16.8558C11.8172 16.8558 11.9152 16.8358 12.0052 16.7978C12.0942 16.7608 12.1752 16.7058 12.2432 16.6388L12.2452 16.6378L15.1072 13.7618C15.3972 13.4698 15.3972 12.9988 15.1052 12.7088Z" fill="currentColor"></path>
                                            </svg>
                                        </i>
                                    </a>
                                </p>
                                <p>Nom de la banque : <?php echo $liste->nom_banque;?></p>
                                <p>Numéro du compte bancaire : <?php echo $liste->compte_bancaire;?></p>
                                <p>Page facebook : <?php echo $liste->page_facebook;?></p>
                                <p>Code de la boutique : <?php echo $liste->code_boutique;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
<?php endif;?>
