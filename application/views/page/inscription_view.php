<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 divForm">
                <div class="signup-form"><!--sign up form-->
                    <h2>Veuillez-vous inscrire!</h2>
                    <?php if ( $this->session->flashdata( 'error' ) ) :?>
                        <div class="alert alert-danger" role="alert">
                            <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                        </div>
                    <?php endif;?>
                    <form action="<?= base_url();?>Inscription/verificationInscription" method="post">
                        <input type="text" name="nom" id="nom" placeholder="Votre nom"/>
                        <span class="infoMessage"><?php echo form_error('nom'); ?></span>
                        <input type="text" name="adr" id="adr" placeholder="Votre adresse"/>
                        <span class="infoMessage"><?php echo form_error('adr'); ?></span>
                        <input type="number" name="tele" id="tele" placeholder="Votre numéro de téléphone"/>
                        <span class="infoMessage"><?php echo form_error('tele'); ?></span>
                        <input type="email" name="adrEmail" id="adrEmail" placeholder="Votre adresse électronique"/>
                        <span class="infoMessage"><?php echo form_error('adrEmail'); ?></span>
                        <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur"/>
                        <span class="infoMessage"><?php echo form_error('username'); ?></span>
                        <input type="password" name="pass" id="pass" placeholder="Votre mot de passe"/>
                        <span class="infoMessage"><?php echo form_error('pass'); ?></span>
                        <input type="password" name="cnfpass" id="cnfpass" placeholder="Confirmation du mot de passe"/>
                        <span class="infoMessage"><?php echo form_error('cnfpass'); ?></span>
                        <select name="genre" id="genre">
                            <option value="" selected disabled>Votre sexe</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                        <span class="infoMessage"><?php echo form_error('genre'); ?></span>
                        <button type="submit" class="btn btn-default">S'inscrire</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->