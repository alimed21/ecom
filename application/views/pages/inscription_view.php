<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Inscription</h3>
    </div>
</div>
<!--/Typography-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <h3 class="bars">Veuillez-vous inscrire!</h3>
        <?php if ( $this->session->flashdata( 'error' ) ) :?>
            <div class="alert alert-danger" role="alert">
                <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
            </div>
        <?php endif;?>
        <form action="<?php echo base_url();?>Clients/verificationInscription" method="post">
            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Votre nom
						</span>
                        <input type="text" name="nom" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('nom'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Votre adresse
						</span>
                        <input type="text" name="adresse" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('adresse'); ?></span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Votre téléphone portable
						</span>
                        <input type="number" name="telephone" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('telephone'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Votre email
						</span>
                        <input type="email" name="email" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('email'); ?></span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Nom d'utilisateur
						</span>
                        <input type="text" name="username" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('username'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Mot de passe
						</span>
                        <input type="password" name="password" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('password'); ?></span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Confirmation du mot de passe
						</span>
                        <input type="password" name="cnfpass" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('cnfpass'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Genre
						</span>
                        <select name="genre" id="genre" class="form-control">
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('genre'); ?></span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Inscription" class="btnLogin">
                </div>
            </div>
        </form>
    </div>
</div>
<!--//Typography-->