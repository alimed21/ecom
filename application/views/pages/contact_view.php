<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>C<span>ontactez-nous</span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="index.html">Home</a><i>|</i></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<!--/contact-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="contact-grid-agile-w3s">
            <div class="col-md-4 contact-grid-agile-w3">
                <div class="contact-grid-agile-w31">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h4>Adresse</h4>
                    <p>Djibouti-ville, <span>Djibouti.</span></p>
                </div>
            </div>
            <div class="col-md-4 contact-grid-agile-w3">
                <div class="contact-grid-agile-w32">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h4>Appelez-nous</h4>
                    <p>+253 77 58 06 22<span>+253 77 18 73 79</span></p>
                </div>
            </div>
            <div class="col-md-4 contact-grid-agile-w3">
                <div class="contact-grid-agile-w33">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <h4>Email</h4>
                    <p><a href="mailto:contact@riyadexpress.com">contact@riyadexpress.com</a><span><a href="mailto:support@riyadexpress.com">support@riyadexpress.com</a></span></p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="contact-w3-agile1 map" data-aos="flip-right">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999536.3981205819!2d41.50601378838492!3d11.811126241053287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1622d46734f9f601%3A0x1472bba7ef0f5b88!2sDjibouti!5e0!3m2!1sfr!2sdj!4v1620118683909!5m2!1sfr!2sdj" class="map" style="border:0" allowfullscreen=""></iframe>
</div>
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="agile-contact-grids">
            <div class="agile-contact-left">
                <div class="col-md-6 address-grid">
                    <h4>PLus d'<span>information</span></h4>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Telephone </p><span>+253 77 58 06 22</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Email </p><a href="mailto:contact@riyadexpress.com">contact@riyadexpress.com</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Location</p><span>Djibouti-ville, Djibouti</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
                        <li class="share">Suivez-nous sur: </li>
                        <li><a href="https://www.facebook.com/RiyadExpressOfficial/" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="https://www.instagram.com/riyadexpress/" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                    </ul>
                </div>
                <div class="col-md-6 contact-form">
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
                    <h4 class="white-w3ls">Formulaire <span>de contact</span></h4>
                    <form action="<?php echo base_url();?>Contact/sendmail" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="nom" required="">
                            <label>Votre nom</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="email" required="">
                            <label>Votre email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="text" name="sujet" required="">
                            <label>Votre sujet</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <textarea name="message" required=""></textarea>
                            <label>Votre meessage</label>
                            <span></span>
                        </div>
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//contact-->