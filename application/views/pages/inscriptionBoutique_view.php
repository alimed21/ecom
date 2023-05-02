<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Devenez une boutique en ligne</h3>
    </div>
</div>
<!--/Typography-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <h3 class="bars">Veuillez-vous inscrire!</h3>
        <?php if ( $this->session->flashdata( 'sucess' ) ) :?>
            <div class="alert alert-success" role="alert">
                <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('sucess'); ?></h2>
            </div>
        <?php endif;?>
        <?php if ( $this->session->flashdata( 'error' ) ) :?>
            <div class="alert alert-danger" role="alert">
                <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
            </div>
        <?php endif;?>
        <form action="<?php echo base_url();?>Fournisseur/verificationFournisseur" method="post">
            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Nom de l'entreprise
						</span>
                        <input type="text" name="nom" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('nom'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Adresse complet
						</span>
                        <input type="text" name="adr" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('adr'); ?></span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-6 in-gp-tl">
                    <div class="input-group">
						<span class="input-group-addon">
							Numéro téléphone
						</span>
                        <input type="number" name="tele" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('tele'); ?></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 in-gp-tb">
                    <div class="input-group">
						<span class="input-group-addon">
							Adresse électronique
						</span>
                        <input type="email" name="email" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                    <span class="infoMessage"><?php echo form_error('email'); ?></span>
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