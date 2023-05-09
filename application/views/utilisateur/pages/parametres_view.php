<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column text-center align-items-center justify-content-between ">
                            <div class="fs-italic">
                                <h5>Votre profil M. <?php echo $this->session->userdata('username');?></h5>
                            </div>

                            <div class="card-profile-progress">
                                <div id="circle-progress-1" class="circle-progress  circle-progress-basic circle-progress-primary" data-min-value="0" data-max-value="100" data-value="80" data-type="percent"></div>
                                <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid rounded-circle card-img">
                                <img src="../../assets/images/avatars/avtar_1.png" alt="User-Profile" class="theme-color-purple-img img-fluid rounded-circle card-img">
                                <img src="../../assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid rounded-circle card-img">
                                <img src="../../assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid rounded-circle card-img">
                                <img src="../../assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid rounded-circle card-img">
                                <img src="../../assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid rounded-circle card-img">
                            </div>
                            <div class="mt-3 text-center text-muted-50">
                                <p class="par">Veuillez cliquer sur ses boutons pour l'action souhaiter.</p>
                            </div>
                            <div class="d-flex icon-pill">
                                <a href="<?=base_url();?>Profile" class="btn btn-sm rounded-pill px-2 py-2 ms-2">
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" fill="#130F26" fill-opacity="0.4" stroke="#130F26"></path>                                    <circle cx="12" cy="12" r="5" stroke="#130F26"></circle>                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    </mask>                                    <circle opacity="0.53" cx="13.5" cy="10.5" r="1.5" fill="white"></circle>
                                    </svg>
                                </a>
                                <a href="<?=base_url();?>Profile/modifierProfile" class="btn btn-sm rounded-pill px-2 py-2  ms-2">
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>                                <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>                                <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="fs-italic">
                            <h5 class="">Mot de passe</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="imgDiv">
                        <img src="<?=base_url();?>assets/images/img/mtp.jpg" alt="">
                        <p>
                            Modifier votre ancien mot de passe.
                        </p>
                        <a href="<?=base_url();?>Parametres/changerMotPasse">
                            <button type="button" class="btn btn-primary">Cliquer ici</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="fs-italic">
                            <h5>Information boutique</h5>
                        </div>
                    </div>
                    <div class="bouDev">
                        <img src="<?=base_url();?>assets/images/img/boutique.png" alt="">
                        <p>
                            Modifier les informations de votre boutique.
                        </p>
                        <a href="<?=base_url();?>Parametres/#">
                            <button type="button" class="btn btn-primary">Cliquer ici</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>