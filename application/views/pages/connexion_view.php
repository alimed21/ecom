<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Connexion</h3>
    </div>
</div>
<!--/Typography-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <h3 class="bars">Veuillez-vous connectez!</h3>
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
        <form action="<?php echo base_url();?>Clients/connexion" method="post">
            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Nom d'utilisateur
						</span>
                        <input type="text" name="username" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Mot de passe
						</span>
                        <input type="password" name="password" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Connexion" class="btnLogin">
                </div>
            </div>
        </form>
    </div>
</div>
<!--//Typography-->