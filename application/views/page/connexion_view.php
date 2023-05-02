<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 divForm">
                <div class="signup-form"><!--sign up form-->
                    <h2>Veuillez-vous connecter!</h2>
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
                    <form action="<?= base_url();?>Connexion/verificationConnexion" method="post">
                        <input type="hidden" name="ref" id="ref" value="<?= $back;?>">
                        <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur"/>
                        <span class="infoMessage"><?php echo form_error('username'); ?></span>

                        <input type="password" name="pass" id="pass" placeholder="Votre mot de passe"/>
                        <span class="infoMessage"><?php echo form_error('pass'); ?></span>

                        <button type="submit" class="btn btn-default">Connexion</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->