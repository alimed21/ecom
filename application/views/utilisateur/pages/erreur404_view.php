<div class="row">
    <div class="col-sm-12">
        <div class="container divErreur">
            <img src="<?= base_url();?>assets/images/error/404.png" class="img-fluid mb-4 w-50" alt="">
            <h1><b>OPPS!</b> <?= $titreErreur;?></h1>
            <p><?= $messageErreur;?></p>
            <a href="<?= base_url();?><?= $lienAccueil;?>">
                <button class="btn btn-primary">
                    Retour à l'accueil
                </button>
            </a>
        </div>
    </div>
</div>
</div>

