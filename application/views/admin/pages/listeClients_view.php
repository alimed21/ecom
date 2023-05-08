<style>
    .card-header, .card-title {
        text-transform: none !important;
        color: rgba(13,27,62,0.7);
        font-weight: bold;
        font-size: .88rem;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Listes des clients inscrits
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des clients
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Genre</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Date inscrit</th>
                                    <th>Bloquer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($listeClients != NULL):?>
                                    <?php foreach($listeClients as $cl):?>
                                        <tr>
                                            <td>
                                                <?php echo $cl->nom;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->adresse;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->telephone;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->email;?>
                                            </td>
                                            <td>
                                                <?php if($cl->genre == "H"):?>
                                                    Homme
                                                <?php else:?>
                                                    Femme
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->username;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->password;?>
                                            </td>
                                            <td>
                                                <?php echo $cl->date_inscrit;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/bloquerFournisseur/<?php echo $cl->id_client;?>">
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
<?php
